<?php

$subscriber = new Sunrock\Events\BookingEventSubscriber;
Event::subscribe($subscriber);
//Event::subscribe(new Sunrock\Events\BookingDetailsEventSubscriber);
Route::get('/' , 'PageController@index');
Route::get('/home' , ['uses'=> 'PageController@index']);
Route::get('/index' ,  ['uses'=>'PageController@index' , 'as' => 'static.home']);
Route::get('/about' ,  ['uses' => 'PageController@about' , 'as' => 'static.about']);
Route::get('/gallery' ,['uses'=>'PageController@explore' ,'as' => 'static.explore' ]);
Route::get('/rates' ,['uses'=>'PageController@rates' ,'as' => 'static.rates' ]);
Route::get('/roomsAndCottages' ,['uses'=>'PageController@roomsAndCottages' ,'as' => 'static.roomscottages' ]);
Route::get('t', function(){
    var_dump(DB::getQueryLog());
    dd(Session::all());
});
Route::get('flush', function(){
    Cache::flush() ;
    Session::flush();
});
Route::group(['prefix' => 'pdf'] , function(){
    Route::get('/print/{action}/{param}' , ['uses' => 'PDFController@streamPDF' , 'as' => 'pdf.stream']);
});
Route::get('pdf' , 'PDFController@reservationSlip');
Route::post('pdf/generate' , ['uses' => 'PDFController@generateReport' , 'as' => 'report.generate']);
Route::get('invoice/{cartid}' ,['uses' => 'PDFController@invoice', 'as' => 'pdf.invoice']);

Route::group(['prefix' => 'ajax'], function(){
    Route::get('/charts' , ['uses' => 'ReportsController@charts' , 'as' => 'ajax.charts.chart']);
    Route::get('/reservations/{days}' , ['uses' => 'ReportsController@reservations' , 'as' => 'ajax.chart.reservations']);
    Route::get('/reservationss/{days}' , ['uses' => 'ReportsController@reservations' , 'as' => 'ajax.chart.reservations']);
});
Route::group(['prefix' => 'transaction' , 'before' => 'account_role'], function(){
    Route::post('/pay' ,['uses'=>'TransactionsController@pay', 'as' => 'transaction.pay' ]);
});
Route::group(['prefix' => 'account'], function(){
    Route::group(['prefix' => 'show' ,'before' => 'auth.user'], function(){
        Route::get('{action}/{param}/' , array('as' => 'account.show', 'uses' => 'AccountController@show'));
    });
    //Route::get('show/{action}/{param}/' ,array('as' => 'account.show', 'uses' => 'AccountController@show'));
    Route::get('/settings/', array('uses' => 'AccountController@settings', 'as' => 'account.settings'));
    Route::get('/profile/', array('uses' => 'AccountController@getProfile' ,'as' => 'account.getProfile'));
    Route::get('/profile/update', array('uses' => 'AccountController@updateProfile' ,'as' => 'account.updateProfile'));
    Route::get('/logout', array('as' => 'account.logout','uses' => 'AccountController@logout'))->before('auth.user');
    Route::get('/dashboard',array('uses' => 'AccountController@dashboard' , 'as' => 'account.dashboard'))->before('auth.user');
    Route::get('/manualactivation/{email}/{code}' , ['uses' => 'AccountController@manualactivation' , 'as' => 'account.manualactivation']);
    //Guest
    Route::get('/', 'AccountController@login')->before('guest');
    Route::get('/login',array('uses' => 'AccountController@login' , 'as' => 'account.login'))->before('guest');
    Route::post('/signin',array('uses' => 'AccountController@signin' , 'as' => 'account.signin'))->before('guest');
   
    Route::get('/verify/{code}' , array('uses' => 'AccountController@verify', 'as' => 'account.verify'))->before('guest');
    Route::post('/verify' , array('uses' => 'AccountController@activate' , 'as' => 'account.activate'))->before('guest');
   
    Route::get('manualauth/{id}/{token}', array('uses' => 'AccountController@manualauth', 'as' => 'account.manualauth'))->before('guest');
    Route::get('/register', ['uses'=> 'AccountController@registrationForm' ,'as' => 'account.register'])->before('guest');
    
    Route::get('/forgot', ['uses'=> 'AccountController@forgot' ,'as' => 'account.forgot'])->before('guest');
    Route::post('/sendForgot', ['uses'=> 'AccountController@sendForgot' ,'as' => 'account.sendForgot'])->before('guest');
  
    Route::get('/reset/{code}' ,['uses' => 'AccountController@passwordResetForm', 'as' => 'account.reset']);
    Route::post('/changePassword' , ['uses' => 'AccountController@changePassword' , 'as' => 'account.changePassword']);

    Route::get('/' ,array('as' => 'account.index', 'uses' => 'AccountController@index'))->before('guest');
    //Post functions
    Route::post('/create' , ['as' => 'account.create' , 'uses' => 'AccountController@create']);
    Route::post('/search', ['as' => 'account.search' , 'uses' =>'AccountController@search']);
    
});

Route::group(['prefix' => 'file'], function(){
    Route::post('/create' , [ 'uses' => 'FilesController@create' , 'as' => 'cpanel.file.create']);
});

Route::post('account/register', 'UsersController@store');
//Route::get('cpanel', 'AdminController@index');
Route::group(['prefix' => 'book'], function()
{
    Route::resource('AddReservation', 'BookingController', [
        'names' => [
            '/' =>      'book.index',
            'create'  => 'book.create',
            'store'   => 'book.store',
            'show'    => 'book.show',
            'edit'    => 'book.edit',
            'update'  => 'book.update',
        ]
    ]);
    Route::get('/AddReservation' , ['uses' => 'BookingController@index' , 'as' => 'book.index']);
    Route::get('/rebook/{id}', ['uses' => 'BookingController@rebook' , 'as' => 'book.rebook']);
    Route::post('/rebook/step2', ['uses' => 'BookingController@rebook2' , 'as' => 'book.rebook2']);
    Route::post('/rebook/step3', ['uses' => 'BookingController@rebook3' , 'as' => 'book.rebook3']);
    
    Route::get('/',function(){return Redirect::route('book.index');});
    Route::get('resetSession', ['uses' => 'BookingController@RemoveAllItems' ,'as' => 'book.removeAllItems']);
    Route::get('AddReservation/deleteItem/{key}', ['uses' => 'BookingController@DeleteItems' ,'as' => 'book.deleteItem']);
    Route::post('AddReservation/AddItem' ,['uses' => 'BookingController@AddItem' , 'as' => 'book.addItem']);
    Route::post('AddReservation/SetInfo' ,['uses' => 'BookingController@SetInfo' , 'as' => 'book.SetInfo']);
    //cpanel
    Route::get('/changeStatus/{id}/{status}/{fullypaid?}/{isCheckout?}' , ['uses' => 'BookingController@changeStatus' , 'as' => 'book.changeStatus']);
    Route::get('/extend/{id}/{hours}' , ['uses' => 'BookingController@extend' , 'as' =>'book.extend']);
});


Route::group(['prefix' => 'access' ], function()
{
    Route::get('/admin' , ['uses' => 'AdminController@login' , 'as' => 'cpanel.account.login'])->before('guest');
    Route::post('/login' ,['uses' => 'AdminController@signin' ,'as' => 'cpanel.account.auth'])->before('guest');
    Route::get('/logout' ,['uses' => 'AdminController@logout' ,'as' => 'cpanel.account.logout']);
});
Route::group(['prefix' => 'coupon'], function()
{
    Route::get('/changeStatus/{id}/{status}' , ['uses' => 'CouponController@changeStatus' ,'as' => 'coupon.changeStatus']);
});
Route::group(['prefix' => 'product'] , function(){
    Route::get('/changeStatus/{id}/{status}' , ['uses' => 'ProductsController@changeStatus' , 'as' => 'product.changeStatus']);
});
Route::group(['prefix' => 'mail'] , function(){
    Route::get('/delete/{id}' , ['uses' => 'MailsController@delete' , 'as' => 'mail.delete']);  
    Route::post('/create' , ['uses' => 'MailsController@create' , 'as' =>'guest.mail.create']);
});
Route::group(['prefix' => 'cpanel' ,'before' => 'auth.admin'], function()
{  
    //store methods
    Route::post('/coupon/create' ,   ['uses' => 'CouponController@create' , 'as' => 'cpanel.coupon.create']);
    Route::post('/product/create' ,  ['uses' => 'ProductsController@create' , 'as' => 'cpanel.product.create']);
    Route::post('/mail/create' , ['uses' => 'MailsController@create' , 'as' => 'cpanel.mail.create']);

    //update
    Route::post('edit/coupon/' , ['uses' => 'CouponController@edit' ,'as' => 'cpanel.coupon.edit']);
    Route::post('edit/account/' ,['uses' => 'AccountController@edit' ,'as' => 'cpanel.account.edit']);
    Route::post('edit/product/' ,['uses' => 'ProductsController@edit' , 'as' => 'cpanel.product.edit']);
    //delete
    //gets
    Route::get('transaction/edit/{id}/{status}/{bookingid}' , ['uses' => 'TransactionsController@verifytransaction' , 'as' => 'cpanel.transaction.confirm']);
    Route::get('transaction/reject/{id}/{status}/{bookingid}/{notes?}' , ['uses' => 'TransactionsController@reject' , 'as' => 'cpanel.transaction.reject']);
  
    Route::get('dashboard' , ['uses' => 'AdminController@dashboard' , 'as' => 'cpanel.dashboard']);
    Route::get('show/{action}/{param}/{field?}/{order?}', ['uses' => 'AdminController@show' , 'as' => 'cpanel.show']);
    Route::get('edit/{action}/{param}', ['uses' => 'AdminController@edit' , 'as' => 'cpanel.edit']);
    Route::get('create/{action}/', ['uses' => 'AdminController@create' , 'as' => 'cpanel.create']);
    Route::get('/search/{action}/{param}' ,['uses' => 'AdminController@search' , 'as' => 'cpanel.search']);
    //search method post
    Route::post('/results' ,['uses' => 'AdminController@showResults' , 'as' => 'cpanel.showResults']);
    //cashier
    Route::get('resetSession', ['uses' => 'AdminController@RemoveAllItems' ,'as' => 'cpanel.cashier.removeAllItems']);
    Route::get('deleteItem/{key}', ['uses' => 'AdminController@DeleteItems' ,'as' => 'cpanel.cashier.deleteItem']);
    Route::post('addItem' ,['uses' => 'AdminController@AddItem' , 'as' => 'cpanel.cashier.addItem']);
    Route::get('checkout' ,['uses' => 'AdminController@checkout' , 'as' => 'cpanel.cashier.checkout']);
    Route::post('AddReservation/SetInfo' ,['uses' => 'AdminController@SetInfo' , 'as' => 'cpanel.cashier.SetInfo']);

    Route::group(['prefix' => 'cms' ,'before' => 'auth.admin'], function()
    {  
        Route::get('/' , ['uses' => 'CmsController@index' , 'as' => 'cms.index']);
        Route::get('/create' , ['uses' => 'CmsController@create' , 'as' => 'cms.create']);
        Route::get('/edit/{id}' , ['uses' => 'CmsController@edit' , 'as' => 'cms.edit']);
        Route::get('/delete/{id}' , ['uses' => 'CmsController@destroy' , 'as' => 'cms.delete']);
        Route::post('/store' , [ 'uses' => 'CmsController@store' , 'as' => 'cms.store']);
        Route::get('/getContentValue' , ['uses' => 'CmsController@ajaxGetContentValue' , 'as' => 'cms.ajax.contentvalue']);

   
    });
});
    Route::get('/showProducts' , ['uses' => 'AdminController@showProducts' , 'as' => 'cpanel.show.product']);


