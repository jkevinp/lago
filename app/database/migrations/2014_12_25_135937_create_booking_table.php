<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('coupons', function($table){
		// 	$table->string('id')->primary();
		// 	$table->string('couponname');
		// 	$table->string('couponcode');
		// 	$table->decimal('discountbypercentage',10,2)->default(0);
		// 	$table->decimal('discountbyvalue',10,2)->default(0);
		// 	$table->decimal('feerequirement',10,2)->default(0);
		// 	$table->integer('active')->default(0);
		// 	$table->string('type');
		// 	$table->timestamps();
		// });

		// #roomType Table
		// Schema::create('product_type', function($table){
		// 	$table->increments('id');
		// 	$table->string('producttypename');
		// 	$table->timestamps();
		// });

		// #Photo Table
		// Schema::create('files', function($table){
		// 	$table->increments('id');
		// 	$table->string('imagename');
		// 	$table->string('directory');
		// 	$table->string('description');
		// 	$table->timestamps();
		// });

		// #Rooms Table
		// Schema::create('product',function($table){
		// 	$table->increments('id');
		// 	$table->string('productname');
		// 	$table->text('productdesc');
		// 	$table->decimal('productprice', 10, 2);
		// 	$table->integer('productquantity');
		// 	$table->integer('fileid');
		// 	$table->integer('producttypeid');
		// 	$table->integer('paxmin');
		// 	$table->integer('paxmax');
		// 	$table->integer('active')->default(1);
		// 	$table->timestamps();
		// });

		// #Booking Table
		// Schema::create('booking', function($table)
		// {
		// 	$table->string('bookingid')->primary();
		// 	$table->string('bookingreferenceid')->unique();
		// 	$table->date('bookingstart');
		// 	$table->date('bookingend');
		// 	$table->integer('totalduration');
			
		// 	$table->decimal('fee', 10, 2);
		// 	$table->string('paymenttype');
		// 	$table->string('account_id');
		// 	$table->integer('active')->default(0);
		// 	$table->string('confirmationcode');
		// 	$table->string('notes');
		// 	$table->timestamps();
		// });

		// #Booking Details table
		// Schema::create('booking_details' , function($table){
		// 	$table->increments('id');
		// 	$table->string('time');

		// 	$table->dateTime('bookingstart');
		// 	$table->dateTime('bookingend');
		// 	$table->integer('productid');
		// 	$table->string('productname');
		// 	$table->integer('quantity');
		// 	$table->string('bookingreferenceid');
		// 	$table->integer('temporary')->default(1);
		// 	$table->timestamps();
		// });
	
		// #Account Table
		// Schema::create('account',function($table){
		// 	$table->string('id')->primary();
		// 	$table->string('title');
		// 	$table->string('firstname');
		// 	$table->string('middleName');
		// 	$table->string('lastName');
		// 	$table->string('email')->unique();
		// 	$table->string('contactnumber');
		// 	$table->string('username')->unique();
		// 	$table->string('password');
		// 	$table->integer('usergroupid');
		// 	$table->integer('active')->default(0);
		// 	$table->string('confirmationcode');
		// 	$table->string('gender');
		// 	$table->rememberToken();
		// 	$table->timestamps();
		// });
		// #User Group Table
		// Schema::create('usergroup', function($table)
		// {
		// 	$table->increments('id');
		// 	$table->text('usergroupname');
		// 	$table->integer('usergroupauth');
		// });

		// Schema::create('mails', function($table)
		// {
		// 	$table->string('id')->primary();
		// 	$table->string('sendername');
		// 	$table->string('senderemail');
		// 	$table->string('receiveremail');
		// 	$table->string('receivername');
		// 	$table->string('subject');
		// 	$table->string('message');
		// 	$table->integer('status')->default(1);
		// 	$table->timestamps();
		// });
		// Schema::create('transactions', function($table)
		// {
		// 	$table->string('id')->primary();
		// 	$table->string('account_id');
		// 	$table->string('bookingid');
		// 	$table->string('modeofpayment');
		// 	$table->string('codeprovided')->unique();
		// 	$table->string('bankname');
		// 	$table->decimal('downpayment' ,10 ,2);
		// 	$table->string('payeremail');
		// 	$table->string('status')->default('created');
		// 	$table->string('notes');
		// 	$table->decimal('totalbill', 10, 2);
		// 	$table->decimal('discountedbill', 10, 2)->nullable();
		// 	$table->string('couponcode')->nullable();
		// 	$table->string('paymenttype');
		// 	$table->timestamps();
		// });
		// Schema::create('sales' , function($table)
		// {
		// 	$table->string('id')->primary();
		// 	$table->string('transactionid');
		// 	$table->integer('productid');
		// 	$table->integer('productquantity');
		// 	$table->decimal('productprice' ,10,2);
		// 	$table->decimal('totalprice' ,10,2);
		// 	$table->timestamps();
		// });
	}

	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('coupons');
		Schema::drop('product_type');
		Schema::drop('files');
		Schema::drop('product');
		Schema::drop('booking');
		Schema::drop('booking_details');
		Schema::drop('account');
		Schema::drop('usergroup');
		Schema::drop('mails');
		Schema::drop('transactions');
	}

}
