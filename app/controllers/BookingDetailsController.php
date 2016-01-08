<?php
class BookingDetailsController extends \BaseController 
{
	public static function createTemporary($items , $date ,$token)
	{
		$booking_details =   new BookingDetails();
		foreach ($items as $key => $value)
		{
			$booking_details = BookingDetails::create(array(
					'productid'   => $value['productid'] ,
					'productname' =>  $value['product'],
					'quantity'    => $value['quantity'],
					'bookingreferenceid' => $token,
					'time' => $date['timeofday'],
					'bookingstart' =>  $date['datetime_start'],
					'bookingend' => $date['datetime_end'],
					'temporary' => 1
				));
		}
	}
	public static function deleteTemporary($token)
	{
		BookingDetails::where('bookingreferenceid' ,'=' ,$token)->delete();
	}
	public static function expireTemporary($token)
	{
	
	}
}
