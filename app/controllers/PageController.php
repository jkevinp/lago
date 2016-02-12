<?php

class PageController extends \BaseController 
{
	public function reservenow(){
		if(Auth::user())return View::make('default.static.reserve');
		else return Redirect::route('cpanel.account.login');
	}
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

		// $carousel = SiteContents::join('contenttype', function($j){
		// 	$j->on('contenttype.id', '=' , 'sitecontents.contenttype');
		// })->where('contentvalue' , 'carousel')->get();

	

		$content = SiteContents::join('contenttype', function($j){
			$j->on('contenttype.id', '=' , 'sitecontents.contenttype');
		})->where('contentvalue' , 'gallery')->get();


		$carousel = $content;

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
		})->where('producttypeid' , 5)->get();

		$carousel = Product::join('files', function($j){
			$j->on('product.fileid', '=' , 'files.id');
		})
		->whereNotBetween('producttypeid' , [3,4])
		->orderBy(DB::raw('RAND()'))->take(5)->get();
		return View::make('default.static.explore')->withRooms($rooms)
		->with('cottages' , $cottages)
		->with('pools' , $pools)->with('carousel' , $carousel);
	}
	public function rates(){
		$products = ProductType::all();
	
		return View::make('default.static.rates')->with(compact('products'));
	}

}
