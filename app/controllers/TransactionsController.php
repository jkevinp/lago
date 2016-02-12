<?php
use Sunrock\Interfaces\TransactionRepository;
use Sunrock\Interfaces\BookingRepository;
use Sunrock\Interfaces\CouponRepository;
use Sunrock\Interfaces\SaleRepository;
use Sunrock\Interfaces\BookingDetailsRepository;
use Sunrock\Interfaces\ProductRepository as p;
use Sunrock\Interfaces\AccountRepository as arepo;
class TransactionsController extends \BaseController
 {

	public function __construct(arepo $arepo,p $p,BookingDetailsRepository $bdrepo,SaleRepository $s,CouponRepository $c,TransactionRepository $trepo ,BookingRepository $b)
	{
		$this->sale = $s;
		$this->coupon =  $c;
		$this->transaction = $trepo;
		$this->product = $p;
		$this->booking = $b;
		$this->bookingdetails = $bdrepo;
		$this->account =$arepo;
	}
	//function to reject
	public function reject($transactionid, $status , $bookingid , $notes = false){
		$check = $this->transaction->changeStatus($transactionid, $status);
		$this->booking->changeStatus($bookingid, 6);
		$find = $this->booking->find($bookingid)->first();
		if($notes)$find->notes = $notes;
		
		$bd = $find->bookingdetails()->get();
					$bd->each(function($bookingdetails){
						$bookingdetails->delete();
					});
		$find->save();
		SessionController::flash('Transaction and Reservation has been rejected');
		return Redirect::back();
	}
	//function to confirm transaction
	public function verifytransaction($transactionid, $status , $bookingid)
	{
		$id = $this->sale->generateId();
		$bookingdetails = $this->bookingdetails->getByRefId($bookingid)->get();
		$transaction = Transactions::find($transactionid);
		$account = $this->account->find($transaction->account_id);
		$reservation = $this->booking->find($bookingid)->first();
		switch($transaction->paymenttype)
		{
			case 'half':
				$coeff = 0.5;
			break;
			case 'full':
				$coeff = 1;
				$status = 'fullypaid';
			break;
		}

		$bookingdetails->each(function($detail) use ($id,$coeff, $transaction, $reservation ){

			switch ($reservation->bookingmode) {
				case 'day':
					$detail->productprice  =$this->product->find($detail->productid)->productprice;
				break;
				case 'night':
					$detail->productprice  =$this->product->find($detail->productid)->nightproductprice;
				break;
				default:
					$detail->productprice  =$this->product->find($detail->productid)->overnightproductprice;
				break;

			}
			$p = $detail->productprice * $coeff;

			$this->sale->create($id,$detail->productid,$detail->quantity, $p, $transaction->id, 'reservation-'.$transaction->paymenttype);
		
		});

		$check = $this->transaction->changeStatus($transactionid, $status);
		
		if($check){
				$this->booking->changeStatus($bookingid, 2);
				$url = URL::action('pdf.invoice', ['cartid' => $id]);
				$url ="<a href='".$url."' target='_blank' class='btn btn-primary'>Print</a>";
				$msg ='You have Confirmed transaction:<hr>'.$url;
				Event::fire('book.confirm' , array($account ,$id));
				SessionController::flash($msg);
				return Redirect::route('cpanel.dashboard');
		}
		return Redirect::back()->withErrors('Cannot Edit transaction status.');
	}

	public function pay()
	{
		$input = Input::all();
		$validator = Validator::make($input , [
				'bookingId' => 'required',
				'token' => 'required',
				'code' => 'required|min:6'
			]);
		$coupon = null;
		if(!empty($input['coupon'])){
			$c = $this->coupon->findByCode($input['coupon'])->first();
			if($c) $coupon = $c;
			else return Redirect::back()->withErrors('An error has occured. Invalid Coupon Code');
		}
		if($validator->fails())return Redirect::back()->withInput($input)->withErrors($validator->messages());
		
		$booking = $this->booking->find($input['bookingId'])->first();
		if($this->transaction->findByBookingId($input['bookingId'])->first())
			return Redirect::back()->withErrors('Cannot proceed with the transaction. Duplicate record found!');
		if($this->transaction->findByCode($input['code'])->first())
			return Redirect::back()->withErrors('Cannot proceed with the transaction. Deposit Code Already used in other transaction!');
		

		$result = $this->transaction->create(Auth::user(), $booking, $input['token'], $input['paymentmode'] ,$input['notes'], $input['code'], $coupon);
		
		$find = $this->transaction->find($result->id);
		if($find->id === $result->id){
			$id = $find->bookingid;
			$affectedrows = $this->booking->changeStatus( $id, 1);
			if($affectedrows)
			{
				SessionController::flash('The payment has been saved. An email will be sent after we verify your payment.<br/> Transaction Code: '.str_pad($result->id,4,"0",STR_PAD_LEFT));
				return Redirect::route('account.dashboard');
			}else{
					$this->transaction->delete($result->id);
				return Redirect::back()->withErrors('An error has occured. Please call us to verify your reservation. Failed to change booking status');
			}
		}

		return Redirect::back()->withErrors('An error has occured. Please call us to verify your reservation.');
	}
	
	

}
