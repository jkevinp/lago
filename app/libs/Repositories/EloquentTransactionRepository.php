<?php
namespace Sunrock\Repositories;
use Sunrock\Interfaces\TransactionRepository;
use Transactions;
use CouponController;
use App;
class EloquentTransactionsRepository implements TransactionRepository
{
	public function __construct(CouponController $c){
		$this->coupon = $c;
	}
	public function all(){
		return Transactions::all();
	}
	public function findByStatus($status){
		return Transactions::where('status' ,'=' , $status);
	}
	public function find($id){
		return Transactions::find($id);
	}
	public function findByBookingId($bookingid){
		return Transactions::where('bookingid', '=' ,$bookingid);
	}
	public function findByCode($code){
		return Transactions::where('codeprovided' ,'=', $code);
	}
	public function delete($id){
		$this->find($id)->first()->delete();
	}	
	public function create($account, $booking, $token, $mode ,$notes , $code ,$coupon){
		$discount = false;
		/*if($coupon)
		{
			$newBill = $this->coupon->computeBill($coupon, $booking->fee);
			$discount = true;
		}*/
		$t = new Transactions();
		// $id = $this->generateTransactionId($token);
		// $t->id = $id;
		$t->account_id = $account->id;
		$t->bookingid = $booking->bookingid;
		$t->modeofpayment = $mode ;
		$t->codeprovided = $code;
		$t->bankname = 'BPI';
		$t->payeremail = $account->email;
		$t->status = 'created';
		$t->notes = $notes;
		$t->totalbill = $booking->fee;
		$t->paymenttype = $booking->paymenttype;

		if($discount){
			$t->discountedbill = $newBill;
			if($booking->paymenttype == 'half')
			$t->downpayment = $this->computeDownpayment($newBill);
			else $t->downpayment = $booking->fee;
			$t->couponcode = $coupon->couponcode;
		}
		else{
			if($booking->paymenttype == 'half')
			$t->downpayment = $this->computeDownpayment($booking->fee);
			else $t->downpayment = $booking->fee;
		}
		$temp = $t;
		$t->save();
		// $temp->id = $id;
		return $temp;
	}
	public function generateTransactionId($token){
		return date('Ymd').str_random(5).$token;
	}
	public function computeDownpayment($fee){
		return $fee * 0.5;
	}
	public function changeStatus($id,$status){
		$transaction = Transactions::find($id);
		$transaction->status = $status;
		return $transaction->save();
	}
}