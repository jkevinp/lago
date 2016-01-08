<?php
namespace Sunrock\Interfaces;
interface TransactionRepository
{
	public function find($id);
	public function all();
	public function create($account, $booking, $token, $mode ,$notes , $code,$coupon);
	public function generateTransactionId($token);
	public function findByBookingId($bookingid);
	public function findByCode($code);
	public function delete($id);
	public function computeDownpayment($fee);
	public function findByStatus($status);
	public function changeStatus($id,$status);
		
}