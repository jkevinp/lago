<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BookingDetails extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = true;
	public $fillable = array('temporary','productid' , 'bookingreferenceid' ,'productname' , 'quantity', 'active', 'time' ,'bookingstart' , 'bookingend');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'booking_details';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	public function scopeCreatedAscending($query)
    {
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 
	public function booking()
	{
		return $this->belongsTo('Booking' , 'bookingreferenceid' , 'bookingid');
	}
	public function getDates()
	{
	    return array('bookingstart', 'bookingend');
	}
	public function products()
	{
		return $this->hasMany('Products');
	}
	public static function  getReserved($date_info)
	{
		return BookingDetails::whereRaw
								(
								"
								`bookingstart` >= ".Helpers::ConvertToSimpleDate($date_info['start'])." AND 
								`bookingend` <= ".Helpers::ConvertToSimpleDate($date_info['end'])."
								"
								);
	}
	public static function getAvailability($date_info , $timeofday)
	{
		//if time of day is not same then allow
	}

}
