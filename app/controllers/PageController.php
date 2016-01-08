<?php

class PageController extends \BaseController 
{
	public function index(){
		return View::make('default.static.main');
	}
	public function about(){
		return View::make('default.static.about');
	}
	public function explore(){	
		$rooms = Product::join('files', function($j){
			$j->on('product.fileid', '=' , 'files.id');
		})->where('producttypeid' , 2)->get();
		$cottages = Product::join('files', function($j){
			$j->on('product.fileid', '=' , 'files.id');
		})->where('producttypeid' , 1)->get();
		$pools = Product::join('files', function($j){
			$j->on('product.fileid', '=' , 'files.id');
		})->where('producttypeid' , 3)->get();
		return View::make('default.static.explore')->withRooms($rooms)
		->with('cottages' , $cottages)
		->with('pools' , $pools);
	}

}
