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
	public function generateReport()
	{

		$input = Input::all();
		$rules = ['datestart' => 'date|required', 'dateend' => 'date|required'];
		$val = Validator::make($input, $rules);

		if($val->fails())return Redirect::back()->withErrors($val->messages()->first());
		if($input['datestart'] == $input['dateend'])return Redirect::back()->withErrors('Date must not be the same');
		/*'model' => string 'account' (length=7)
		  'datestart' => string '2015-02-11' (length=10)
		  'dateend' => string '2015-02-11' (length=10)
		  'sort' => string 'ascending' (length=9)*/
		  $pdf = null;
		 switch($input['model']){
		 	case 'sale':

		 			if(!$this->sale->all()->first())die("Cannot generate report. No records found.");
					
					$param['saleshalf'] = Sales::whereExists(function($q){
						$q->select(DB::raw(1))
						->from('transactions')
						->whereRaw('transactions.status = "confirmed" ');}
					)
					->where('type' , '=','reservation-half')
					->whereBetween('sales.created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])])
					;



					$param['salesfull'] = Sales::whereExists(function($q){
						$q->select(DB::raw(1))
						->from('transactions')
						->whereRaw('transactions.status <> "confirmed"');}
					)
					->whereBetween('sales.created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])])
					;


				if(count($param['saleshalf']) + count($param['salesfull']) == 0)die("No entries found.");

		 		if(count($param['saleshalf'])){
			 		if($input['sort'] == 'ascending'){
			 			$param['saleshalf'] = $param['saleshalf']->CreatedAscending()->get();
			 		}else{
			 			$param['saleshalf'] = $param['saleshalf']->CreatedDescending()->get();
			 		}
		 		}
		 		if(count($param['salesfull'])){
			 		if($input['sort'] == 'ascending'){
			 			$param['salesfull'] = $param['salesfull']->CreatedAscending()->get();
			 		}else{
			 			$param['salesfull'] = $param['salesfull']->CreatedDescending()->get();
			 		}
		 		}
		 		 
		 		
		 		$pdf = PDF::loadView('pdf.sales.sales-list' , $param);
		 	break;

		 	case 'booking':

			
				$param['booking'] = Booking::whereBetween('created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
				if(count($param['booking']) == 0)die("No entries found.");
		 		
		 		if($input['sort'] == 'ascending'){
		 			$param['groups'] =  Booking::whereBetween('created_at' , [ new Carbon($input['datestart']) , new Carbon($input['dateend'])])->CreatedAscending()->get()->groupBy('active');

					$param['booking'] = $param['booking']->CreatedAscending()->get();
		 		}else{
		 			$param['groups'] =  Booking::whereBetween('created_at' , [ new Carbon($input['datestart']) , new Carbon($input['dateend'])])->CreatedDescending()->get()->groupBy('active');

		 			$param['booking'] = $param['booking']->CreatedDescending()->get();
		 		}
		 		$pdf = PDF::loadView('pdf.booking.booking-list' , $param);
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
				$pdf = PDF::loadView('pdf.email.invoice.invoice-slip' , $param );
				return $pdf->stream();
			}
			else{
				die('Could not find sales record');
			}
		}
	}
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
				$pdf = PDF::loadView('pdf.email.invoice.invoice-slip' , $param );
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

					$pdf = PDF::loadView('pdf.sales.sales-list' , $data);
				break;

				case 'booking':
					if(!$this->booking->all()->first())die("Cannot generate report. No records found.");
					$b =  $this->booking->all()->first()->CreatedDescending()->get();
					$data['groups'] = Booking::all()->groupBy('active');

			
			 		$data['booking'] =$b;
			 		$pdf = PDF::loadView('pdf.booking.booking-list' , $data);
		 		break;
			}
		}
		if($pdf)return $pdf->stream();
		else die('Error occured @ pdf controller');
	}
}	
