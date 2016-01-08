<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/
Route::filter('account_role', function()
{ 
	if(Auth::user()->usergroupid !== 2)
	 {
	    if (Request::ajax())
		{
				return Response::make('Unauthorized', 401);
		}
		else
		{
				return Redirect::guest('account/login')->withErrors('You are trying to go to a protected page. Please login to continue.');
		}
	}
});

Route::filter('auth.user', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())return Response::make('Unauthorized', 401);
		else return Redirect::guest('account/login')->withErrors('You are trying to go to a protected page. Please login to continue.');
	}
	else
	{
		if(Auth::user()->usergroupid !== 2)
		{
			Auth::logout();
			return Redirect::to('/')->withErrors('You are trying to enter a page that is not suited for your account');
		}
	}
});
Route::filter('auth.admin', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())return Response::make('Unauthorized', 401);
		else return Redirect::guest('access/admin')->withErrors('You are trying to go to a protected page. Please login to continue.');
	}
	else
	{
		if(Auth::user()->usergroupid == 2)
		{
			Auth::logout();
			return Redirect::to('/')->withErrors('You are trying to enter a page that is not suited for your account');
		}
	}
});
Route::filter('auth.basic', function()
{
	return Auth::basic();
});
Route::filter('guest', function()
{
	if (Auth::check()) {
		if(Auth::user()->usergroupid == 2) return Redirect::route('account.dashboard')->with('flash_message', 'You are already logged in!');
		return Redirect::route('cpanel.dashboard')->with('flash_message', 'You are already logged in!');
	}
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});
