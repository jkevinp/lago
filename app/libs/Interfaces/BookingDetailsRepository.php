<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface BookingDetailsRepository
{
	public function all();
	public function find($id);
	public function paginate();
	public static function create($items , $date ,$token,$temporary);
	public function findByBookingRefid($code);
	public function changeTemporaryStatus($arows, $isTemp);
	public function updateBookingReference($code ,$newid);
	public static function deleteTemporary($token);	
	public function getByRefId($id);
	public function getProduct($id);
	public function getMedia($id);
	public function changeRoom($bid, $product, $di);
}