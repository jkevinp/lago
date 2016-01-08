<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Sunrock\Interfaces\AccountRepository;
class Account extends Eloquent implements UserInterface, RemindableInterface
{
	use UserTrait, RemindableTrait;
	public $timestamps = true;
	public $fillable = ['id' ,'gender', 'confirmationcode' ,'title', 'firstname', 'middleName' , 'lastName' , 'email' , 'contactnumber' , 'username' , 'password' , 'usergroupid' , 'active'];
	protected $table = 'account';
	protected $hidden = array('password', 'remember_token');
	public function getRememberToken()
	{
	    return $this->remember_token;
	}
	public function scopeCreatedAscending($query)
    {
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	public function getBookingListAttribute($id)
	{
		return Booking::where('account_id' ,'=', $id);
	}
	 public function usergroup()
    {
        return $this->belongsToMany('usergroup');
    }

	/*
	public function booking()
	{
		return $this->hasMany('booking');
	}*/
	public function booking()
	{
		return $this->hasMany('Booking');
	}
	public function mails()
	{
		return $this->hasMany('Mails', 'receiveremail', 'email');	
	}
	public function transaction()
	{
		return $this->hasMany('Transactions');
	}
}
