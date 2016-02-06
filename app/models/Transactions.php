<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Transactions extends Eloquent implements UserInterface, RemindableInterface{
	use UserTrait, RemindableTrait;
	protected $fillable = ['paymenttype', 'downpayment','totalbill', 'discountedbill','couponcode', 'id' , 'account_id' ,'bookingid' ,'modeofpayment' ,'codeprovided' ,'bankname' ,'payeremail', 'status','notes'];
	protected $table = 'transactions';
	public $incrementing = true;
	public function account()
	{
		return $this->belongsTo('Account' , 'account_id');
	}
public function scopeCreatedAscending($query)
    {
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 
}