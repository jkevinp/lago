<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('account_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$account = new account();
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("YmdHis",$date_array[1]);
		$account->id = $date_array[1];
		$account->username = Input::get('username');
		$account->password = Hash::make(Input::get('password'));		
		$account->usergroupid = 1;
		$account->save();
		Redirect::to('account');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$accounts = account::all();
		return $accounts;
	}
	public function showOne($id)
	{
		$accounts = account::find($id);
		return $accounts;
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$account = account::find($id);
		$account->username = 'kevin';
		$account->save();
		Redirect::to('account/');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
