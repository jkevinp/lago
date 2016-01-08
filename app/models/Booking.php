<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Booking extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = true;
	public $fillable = array('notes', 'paymenttype','fee','bookingid' , 'confirmationcode','bookingreferenceid' ,'bookingstart' , 'bookingend', 'totalduration', 'account_id' , 'active');
	protected $primaryKey = 'bookingid';
	protected $table = 'booking';
	public function account(){
	     return $this->belongsTo('account' ,'account_id');
	}
	public function getReservationsByStatus($s){
		return Booking::where(['active' => $s])->get();
	}
	public function getActionAttribute($query){
		return Booking::where($query)->get();
	}
	
	/*
	public function account()
	{
		return $this->belongsToMany('Account','id');
	}*/
	public function getAccountAttribute(){
	    return $this->account;
	}
	public function bookingdetails(){
		return $this->hasMany('BookingDetails', 'bookingreferenceid' ,'bookingid');
	}
	//Scopes
	public function scopeCreatedAscending($query){
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query){
        return $query->orderBy('created_at','DESC');
    } 
    public function scopeStatusIsConfirmed($query){
        return $query->where('active' ,'=' ,2);
    } 
    public function scopeStatusIsOnSession($query){
        return $query->where('active' ,'=' ,3);
    }

}