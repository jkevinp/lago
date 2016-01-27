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
		 		$param['sales'] =  Sales::whereBetween('created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
		 		$param['sum'] = $param['sales']->get()->sum('totalprice');
		 		$param['date'] = $input['datestart'].' ~ '.$input['dateend'];
		 		if($input['sort'] == 'ascending'){
		 			$param['sales'] = $param['sales']->CreatedAscending()->get()->toArray();
		 		}else{
		 			$param['sales'] = $param['sales']->CreatedDescending()->get()->toArray();
		 		}
		 		
		 		$pdf = PDF::loadView('pdf.sales.sales-list' , $param);
		 	break;
		 	case 'account':
		 		$param['accounts'] =  Account::whereBetween('created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
		 		$param['date'] = $input['datestart'].' ~ '.$input['dateend'];
		 		if($input['sort'] == 'ascending'){
		 			$param['accounts'] = $param['accounts']->CreatedAscending()->get()->toArray();
		 		}else{
		 			$param['accounts'] = $param['accounts']->CreatedDescending()->get()->toArray();
		 		}
		 		
		 		$pdf = PDF::loadView('pdf.account.account-list' , $param);
		 	break;

		 	case 'booking':
		 		$param['booking'] =  Booking::join('account', function($j){
			$j->on('booking.account_id', '=' , 'account.id');
		})->whereBetween('created_at' , [new Carbon($input['datestart']) , new Carbon($input['dateend'])]);
		 		$param['date'] = $input['datestart'].' ~ '.$input['dateend'];
		 		if($input['sort'] == 'ascending'){
		 			$param['booking'] = $param['booking']->CreatedAscending()->get()->toArray();
		 		}else{
		 			$param['booking'] = $param['booking']->CreatedDescending()->get()->toArray();
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
		if(isset($cartid))
		{
			$sale = $this->sale->findByCartId($cartid)->get();
			if($sale)
			{
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
				case 'account':
					switch ($param) {
						case 'all':
							$data['accounts'] = $this->account->all()->toArray();
							$pdf = PDF::loadView('pdf.account.account-list' , $data);
						break;
					}
				break;
				case 'sales':
					$data['sales'] = $this->sale->all()->first()->CreatedDescending()->get()->toArray();
					$data['sum'] =$this->sale->all()->first()->CreatedDescending()->get()->sum('totalprice');
					$pdf = PDF::loadView('pdf.sales.sales-list' , $data);
				break;

				case 'booking':
				$b =  $this->booking->all()->first()->CreatedDescending()->get();
			
			 		$data['booking'] =$b;
			 		$pdf = PDF::loadView('pdf.booking.booking-list' , $data);
		 		break;
			}
		}
		if($pdf)return $pdf->stream();
		else die('Error occured @ pdf controller');
	}
}	
