<?php

class Helpers extends \BaseController {

	public static function Assets($filename){
		if($_SERVER['SERVER_NAME'] == 'localhost'){
			return asset('default/img-uploads/'.$filename);
		}else{
			return get_env('OPENSHIFT_DATA_DIR')."/".$filename;
		}
	}

	public static function SendMail($v,$arr , $sendDetails ,$file = false)
	{
		if($file)
		{
				Mail::send($v, $arr, function($message) use ($sendDetails , $file){
	        		$message->to($sendDetails['email'], $sendDetails['Firstname'].' '.$sendDetails['Lastname'])
	        		->subject($sendDetails['title']);
	        		$message->attachData($file,  $sendDetails['fileas']);
    			});
		}else{
			Mail::send($v, $arr, function($message) use ($sendDetails){
        		$message->to($sendDetails['email'], $sendDetails['Firstname'].' '.$sendDetails['Lastname'])
        		->subject($sendDetails['title']);
    		});
		}
	}
	public static function ToNumber($string)
	{
		return number_format($string,2);
	}
	public static function ConvertToSimpleDate($source)
	{
			$date = new DateTime($source);
			return $date->format('Y-m-d'); // 31-07-2012
	}
	public static function ConvertToDateTime($source,$addHours = false,$end = false)
	{
			
			if($addHours)
			{
				$source = $source." ".$addHours.":00:00";
			}
			$date = new DateTime($source);
			return $date->format('Y-m-d H:i:s'); // 31-07-2012
	}
	public static function DateTimeAddDays($source,$days)
	{
		$days = $days * 24;
		$date = new DateTime(Helpers::ConvertToDateTime($source, 0, false));
		$result = $date->format('Y-m-d H:i:s');
		$date = new DateTime($result);
		$date->modify("+{$days} hour");
		return $date->format('Y-m-d H:i:s');
	}
	public static function flash($str)
	{
		Session::put('flash_message',$str);
	}

}
