<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Mails extends Eloquent implements UserInterface, RemindableInterface 
{
	use UserTrait, RemindableTrait;
	public $fillable = ['id' , 'sendername' ,'senderemail', 'receiveremail', 'receivername', 'message', 'status' ,'subject'];
	protected $table = 'mails';

	public function account()
	{ 
		return $this->belongsTo('Account');
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
