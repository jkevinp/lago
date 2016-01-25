<?php

class PageController extends \BaseController 
{
	public function index(){
		//return View::make('hello');
		$news = SiteContents::join('contenttype', function($j){
			$j->on('contenttype.id', '=' , 'sitecontents.contenttype');
		})->where('contentvalue' , 'news')->get();

		return View::make('default.static.main')->with(compact('news'));
	}
	public function about(){

		$content = SiteContents::where('contenttype' , 2)->get();
		return View::make('default.static.about')->with(compact('content'));
	}
	public function explore(){	

		$carousel = SiteContents::join('contenttype', function($j){
			$j->on('contenttype.id', '=' , 'sitecontents.contenttype');
		})->where('contentvalue' , 'carousel')->get();

	

		$content = SiteContents::join('contenttype', function($j){
			$j->on('contenttype.id', '=' , 'sitecontents.contenttype');
		})->where('contentvalue' , 'gallery')->get();
		return View::make('default.static.gallery')
					->with(compact('carousel' , 'content'));
	}
	public function roomsAndCottages(){	
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
	public function rates(){

	}

}
