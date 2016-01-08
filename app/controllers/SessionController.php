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
	public static function admission($input)
	{
		if($input['adult'] > 0)
		{
			$products = Session::pull('items');
			if(Session::get('date_info')['timeofday'] == '06')
			{
				array_push($products, array(
							'productid' => 20,
							'product' => 'Adult Admission Ticket' , 
							'quantity' => $input['adult'],
							'description' => '',
							'totalquantity' => 'unlimited',
							'type' => 'Admission',
							'price' => '130.00',
							'image' => URL::asset('default/img-uploads').'/adult.jpg',
							'removable' => false
							));
			}else{
				array_push($products, array(
							'productid' => 22,
							'product' => 'Night rate Adult Admission Ticket' , 
							'quantity' => $input['adult'],
							'description' => '',
							'totalquantity' => 'unlimited',
							'type' => 'Admission',
							'price' => '150.00',
							'image' => URL::asset('default/img-uploads').'/adult.jpg',
							'removable' => false
							));
			}
			Session::put('items' , $products);
		}
		if($input['children'] > 0)
		{
			$products = Session::pull('items');
						
			if(Session::get('date_info')['timeofday'] == '06'){
				array_push($products, array(
							'productid' => 19,
							'product' => 'Children Admission Ticket' , 
							'quantity' => $input['children'],
							'description' => '',
							'totalquantity' => 'unlimited',
							'type' => 'Admission',
							'price' => '100.00',
							'image' => URL::asset('default/img-uploads').'/child.jpg',
							'removable' => false
							));
			}
			else{
					array_push($products, array(
							'productid' => 21,
							'product' => 'Night rate Children Admission Ticket' , 
							'quantity' => $input['children'],
							'description' => '',
							'totalquantity' => 'unlimited',
							'type' => 'Admission',
							'price' => '120.00',
							'image' => URL::asset('default/img-uploads').'/child.jpg',
							'removable' => false
							));
			}
						
						Session::put('items' , $products);
		}
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
						'image' => $input['image']
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
							'image' => $input['image']
							));
						Session::put('items' , $products);
						
				}
			break;
			case 'setinfo':
				$date = array(
							'adult' => $input['adult'],
							'children' => $input['children'],
							'start' => $input['start'],
							'end' =>  $input['end'],
							'timeofday' => $input['timeofday'],
							'lenofstay' => $input['lenofstay'],
							'datetime_start' => Helpers::ConvertToDateTime($input['start'] , $input['timeofday']),
							'datetime_end' => Helpers::DateTimeAddDays(Helpers::ConvertToDateTime($input['start'] , $input['timeofday']), $input['lenofstay'])
							);
				Session::put('date_info' ,$date);
				Session::put('items' , []);
				SessionController::admission($input);
				$account = Account::where('email' , '=' , $input['email'])->first();
				if($account)
					Session::put('account_info' , $account);
				else
					Session::put('email' , $input['email']);
			break;
		}
	}
}
