<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class BookingMode extends Eloquent {
	public $timestamps = true;
	public $fillable = ['label', 'hours' ,'status'	'pricename','created_at' , 'updated_at'];
	protected $table = 'booking_mode';
}
