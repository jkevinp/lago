<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	//{{Form::open()}}
	//{{Form::text('name here')}}
	//{{Form::label('label here')}}
	//{{Form::submit('text')}}
	//Redirect::to('/users')
	public function create_user($arr)
	{
		$account = new account();
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("YmdHis",$date_array[1]);
		$account->accountid = $date_array[1];
		if(is_array($arr))dd($arr);
		return Input::all();
	}

}
