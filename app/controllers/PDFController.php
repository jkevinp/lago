<?php
use  Sunrock\Interfaces\BookingRepository as b;
use  Sunrock\Interfaces\AccountRepository as AccountRepository;
use Sunrock\Interfaces\SaleRepository as s;
use Sunrock\Interfaces\ProductRepository as p;
use Carbon\Carbon;
class PDFController extends \BaseController 
{
	public function __construct(s $s,b $b , AccountRepository $arepo, p $p){
		$this->booking = $b;
		$this->account = $arepo;
		$this->sale = $s;
		$this->product = $p;
	}
	public function reservationSlip($accountid , $bookingid)
	{
		if(isset($accountid) && isset($bookingid))
		{
			$account = $this->account->find($accountid)->first();
			if($account)
			{
				$booking = $account->booking;
				if($booking)
				{
					$r = $booking->find($bookingid);
					if($r){
						$param['booking'] = $r;
						$param['account'] = $account;
						$pdf = PDF::loadView('pdf.email.reservation.reservation-slip' , $param );
						return $pdf->output();
					}
				}
			}
		}
	}
	/*  '_token' => string 'rJxqgm7DvshKKhKoVTZC95NL2VqYA0ZkG5fzARNR' (length=40)
  'model' => string 'sale' (length=4)
  'datestart' => string '2016-02-01' (length=10)
  'dateend' => string '2016-02-19' (length=10)
  'producttype' => string '1' (length=1)
  'modeofpayment' => string 'full' (length=4)
  'paymenttype' => string 'online' (length=6)
  'sort' => string 'ascending' (length=9)
  'action' => string 'stream' (length=6)*/

	public function generateReport()
	{

		$input = Input::all();
		$rules = ['datestart' => 'date|required', 'dateend' => 'date|required'];
		$val = Validator::make($input, $rules);

		if($val->fails())return Redirect::back()->withErrors($val->messages()->first());
		if($input['datestart'] == $input['dateend'])return Redirect::back()->withErrors('Date must not be the same');
		 $pdf = null;
		 switch($input['model']){
		 	case 'sale':

		 			if(!$this->sale->all()->first())die("Cannot generate report. No records found.");
					
					// $s = Sales::whereExists(function($q){
					// 	$q->select(DB::raw(1))
					// 	->from('transactions')
					// 	->whereRaw('transactions.status = "confirmed" ');
					// }
					// )

		 			$s = Sales::with(['transactions' => function($query)
						{
						    $query->where('transactions.id', '=', 'sales.transactionid');

						}])
					->where('type' , '=','reservation-'.$input['modeofpayment'])
					->whereBetween('sales.created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
			

				if(isset($input['modeofpayment']))
					$s = $s->where('type' , '=','reservation-'.$input['modeofpayment']);
			

				$param['saleshalf'] = $s;
				$param['salesfull'] = [];
				if(count($param['saleshalf']) + count($param['salesfull']) == 0)die("No entries found.");

		 		if(count($param['saleshalf'])){
			 		if($input['sort'] == 'ascending'){
			 			$param['saleshalf'] = $param['saleshalf']->CreatedAscending()->get();

			 		}else{
			 			$param['saleshalf'] = $param['saleshalf']->CreatedDescending()->get();
			 		}
			 		foreach ($param['saleshalf'] as $index => $sale) {
			 			if($sale->product->producttypeid != $input['producttype']){
			 				unset($param['saleshalf'][$index]);
			 			}
			 		}

			 		foreach ($param['saleshalf'] as $index => $sale) {
			 			if($sale->transaction){
			 				if($sale->transaction->booking){
			 				if($sale->transaction->booking->bookingtype != $input['paymenttype'])
			 				unset($param['saleshalf'][$index]);
			 			
			 				}
			 			}
			 		}


		 		}

		 		//dd($param['saleshalf']);
		 		$param['additional'] = $input;
		 		
		 		$pdf = PDF::loadView('pdf.sales.sales-list' , $param)->setPaper('letter' ,'landscape');
		 	break;

		 	case 'booking':

			
				$param['booking'] = Booking::whereBetween('created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
				if(count($param['booking']) == 0)die("No entries found.");
				$param['groups'] = [];
				
				if(isset($input['paymenttype']))$param['booking'] = $param['booking']->where('bookingtype' , '=' , $input['paymenttype']);
				if(isset($input['modeofpayment']))$param['booking'] = $param['booking']->where('paymenttype' , '=' , $input['modeofpayment']);
				$param['additional'] = $input;
		 		if($input['sort'] == 'ascending'){
					$param['booking'] = $param['booking']->CreatedAscending()->get();
		 		}else{
		 			$param['booking'] = $param['booking']->CreatedDescending()->get();
		 		}

		 		//create the view
		 		$pdf = PDF::loadView('pdf.booking.booking-list' , $param)->setPaper('letter' ,'landscape');


		 	break;
		 	default:
		 		return Redirect::back()->withErrors('Model does not exists!');
		 	break;
		 }
		 if($input['action'] =='stream' && $pdf){
		 	return $pdf->stream();
		 }else{
		 	return $pdf->download($input['model'].date('Y-m-d').'.pdf');
		 }

	}
	public function invoice($cartid){
		if(isset($cartid)){
			$sale = $this->sale->findByCartId($cartid)->get();
			$sale->each(function($s){
				$s->productname = $this->product->find($s->productid)->productname;
			});

			if($sale){
				$param['transactionid'] = $transactionid = $sale->first()->transactionid;
				$transaction = Transactions::find($sale->first()->transactionid);
				if(Transactions::find($sale->first()->transactionid)->account)
 				$param['account'] = Transactions::find($sale->first()->transactionid)->account->fullname();
				$param['sales'] = $sale;
				$pdf = PDF::loadView('pdf.email.invoice.receipt' , $param )->setPaper([0,0,396,612] , 'portrait');
				return $pdf->stream();
			}
			else{
				die('Could not find sales record');
			}
		}
	}
	public function receipt($cartid){
		if(isset($cartid)){
			$sale = $this->sale->findByCartId($cartid)->get();
			$sale->each(function($s){
				$s->productname = $this->product->find($s->productid)->productname;
			});

			if($sale){
				$param['transactionid'] = $transactionid = $sale->first()->transactionid;
				$transaction = Transactions::find($sale->first()->transactionid);
				if(Transactions::find($sale->first()->transactionid)->account)
 				$param['account'] = Transactions::find($sale->first()->transactionid)->account->fullname();
				$param['sales'] = $sale;
				$pdf = PDF::loadView('pdf.email.invoice.receipt' , $param)->setPaper([0,0,396,612] , 'portrait');

				return $pdf->stream();
			}
			else{
				die('Could not find sales record');
			}
		}
	}

	//$dompdf->set_paper($paper_size);
	public function invoiceSlip($cartid)
	{
	if(isset($cartid)){
			$sale = $this->sale->findByCartId($cartid)->get();
			$sale->each(function($s){
				$s->productname = $this->product->find($s->productid)->productname;
			});

			if($sale){
				$param['transactionid'] = $transactionid = $sale->first()->transactionid;
				$transaction = Transactions::find($sale->first()->transactionid);
				if(Transactions::find($sale->first()->transactionid)->account)
 				$param['account'] = Transactions::find($sale->first()->transactionid)->account->fullname();
				$param['sales'] = $sale;
				$pdf = PDF::loadView('pdf.email.invoice.receipt' , $param );
				return $pdf->output();
			}
			else{
				die('Could not find sales record');
			}
		}
	}
	public function receiptCustomerOnly($cartid)
	{
	if(isset($cartid)){
			$sale = $this->sale->findByCartId($cartid)->get();
			$sale->each(function($s){
				$s->productname = $this->product->find($s->productid)->productname;
			});

			if($sale){
				$param['transactionid'] = $transactionid = $sale->first()->transactionid;
				$transaction = Transactions::find($sale->first()->transactionid);
				if(Transactions::find($sale->first()->transactionid)->account)
 				$param['account'] = Transactions::find($sale->first()->transactionid)->account->fullname();
				$param['sales'] = $sale;
				$pdf = PDF::loadView('pdf.email.invoice.receipt-customerOnly' , $param );
				return $pdf->output();
			}
			else{
				die('Could not find sales record');
			}
		}
	}
	public function streamPDF($action , $param)
	{
		$actions = ['account' ,'sales','booking'];
		if(in_array($action, $actions))
		{
			$pdf = null;
			switch ($action)
			{
				case 'sales':
				if(!$this->sale->all()->first())die("Cannot generate report. No records found.");
					
					$data['saleshalf'] = Sales::whereExists(function($q){
						$q->select(DB::raw(1))
						->from('transactions')
						->whereRaw('transactions.status = "confirmed" ');}
					)->where('type' , '=','reservation-half')->get();


					$data['salesfull'] = Sales::whereExists(function($q){
						$q->select(DB::raw(1))
						->from('transactions')
						->whereRaw('transactions.status <>  "confirmed"');}
					)->get();

					$pdf = PDF::loadView('pdf.sales.sales-list' , $data)->setPaper('letter' , 'landscape');
				break;

				case 'booking':
					if(!$this->booking->all()->first())die("Cannot generate report. No records found.");
					$b =  $this->booking->all()->first()->CreatedDescending()->get();
					$data['groups'] = Booking::all()->groupBy('active');
			 		$data['booking'] =$b;
			 		$pdf = PDF::loadView('pdf.booking.booking-list' , $data)->setPaper('letter' , 'landscape');
		 		break;
			}
		}
		if($pdf)return $pdf->stream();
		else die('Error occured @ pdf controller');
	}
}	
