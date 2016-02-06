<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Schema::create('contenttype' , function($table)
		// {
		// 	$table->integer('id')->primary();
		// 	$table->string('contentkey');
		// 	$table->string('contentvalue');
		// 	$table->timestamps();
		// 	$table->softDeletes();
		// });
		// Schema::create('sitecontents' , function($table)
		// {
		// 	$table->integer('id')->primary();
		// 	$table->string('contenttype');
			
		// 	$table->string('title' , 100000);
		// 	$table->string('value' , 100000);
		// 	$table->integer('orderposition');
		// 	$table->string('media');
		// 	$table->timestamps();
		// 	$table->softDeletes();
		// });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
