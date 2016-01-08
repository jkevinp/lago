<?php

class AppConfig extends \BaseController {

	public static function getPaypalEmail(){
		return 'manualburce@yahoo.com';
	}
	public static function getCurrencyCode(){
		return 'PHP';
	}
	public static function getAppName(){
		return 'Sunrock Resort';
	}
	public static function getTax(){
		return 0.12;
	}
}
