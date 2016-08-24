<?php
class SessionController extends \BaseController 
{
	public static function put($key, $value)
	{
		Session::put($key,$value);
	}
	public static function flash($message)
	{
		Session::put('flash_message' , $message);
	}
	public static function BookingSession($action, $input)
	{
		switch($action)
		{
			case 'additem':
				if(Session::has('items'))
				{
						$products = Session::pull('items');
						array_push($products, array(
						'productid' => $input['productid'],
						'product' => $input['productname'] , 
						'quantity' => $input['quantity'],
						'description' => $input['productdescription'],
						'totalquantity' => $input ['producttotalqty'],
						'type' => $input['producttype'],
						'price' => $input['price'],
						'image' => $input['image'],
						'paxmax' => $input['paxmax']
						));
						Session::put('items' , $products);	
						
				}
				else
				{
						Session::put('items' , []);
						$products = Session::pull('items');
						array_push($products, array(
							'productid' => $input['productid'],
							'product' => $input['productname'] , 
							'quantity' => $input['quantity'],
							'description' => $input['productdescription'],
							'totalquantity' => $input ['producttotalqty'],
							'type' => $input['producttype'],
							'price' => $input['price'],
							'image' => $input['image'],
							'paxmax' => $input['paxmax']
							));
						Session::put('items' , $products);
						
				}

           



			break;
			case 'setinfo':
				$date = array(
							'start' => $input['start'],
							'end' =>  $input['end'],
							'timeofday' => $input['timeofday'],
							'lenofstay' => $input['lenofstay'],
							'datetime_start' => Helpers::ConvertToDateTime($input['start'] , $input['timeofday']),
							'datetime_end' => Helpers::DateTimeAddDays(Helpers::ConvertToDateTime($input['start'] , $input['timeofday']), $input['lenofstay']),
							'modeofstay' => $input['modeofstay']
							);
				Session::put('date_info' ,$date);
				Session::put('items' , []);
				$account = Account::where('email' , '=' , $input['email'])->first();
				if($account) Session::put('account_info' , $account);
				else Session::put('email' , $input['email']);
			break;
		}
	}
}
