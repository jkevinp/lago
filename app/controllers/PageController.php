<?php
use Facebook\Facebook;
use Facebook\FacebookRequest;
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

		$url = "https://graph.facebook.com/v2.6/239858609498045?fields=posts&access_token=EAACEdEose0cBAPw8FfEjXWdMGH8ndo96wobk7KZApQk8F9CgLltKGCmPLdLQOgQC3f8GtZBXRqhJ9cD6h4QRM53ACgQN9lq2fkT76yftXybKeETebg17idYUk9eRLEz5hAwJ1oU5J7V9MPjDK6KvfQeRHGknoCfGEMWFqNlQZDZD";
		$fbposts= $this->Curl($url);
		$fbposts = json_decode($fbposts);
		$fbposts = $fbposts->posts->data;
		return View::make('default.static.main')->with(compact('news' , 'fbposts'));
	}

	function Curl($url){
			$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_PROXY, PROXY_ADDR);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/xml']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
		$result = curl_exec($ch);
		$code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		
		
		curl_close($ch);
		if($code !== 200){
			if($code == 400){

			}
		}
		return $result;
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
