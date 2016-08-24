<?php

class CmsController extends \BaseController {

	public function index()
	{
		$contenttype = ContentType::all();
		return View::make('admin.cms.index')->with(compact('contents' , 'contenttype'));
	}
	public function create()
	{
		$contenttype = ContentType::whereNull('deleted_at')->groupBy('contentkey')->lists('contentkey','contentkey');
		return View::make('admin.cms.create')->with(compact('contenttype'));
	}
	public function show($id)
	{
		
	}
	public function edit($id)
	{
		if($content = SiteContents::find($id)){
		$contenttype = ContentType::whereNull('deleted_at')->groupBy('contentkey')->lists('contentkey','contentkey');
			return View::make('admin.cms.edit')->with(compact('contenttype' , 'content'));
		}
		else SessionController::flash("Content not found.");
		return Redirect::to(route('cms.index'));
	}
	public function update()
	{
		$input = Input::all();
		$rules = [	
					'image' => 'mimes:jpeg,bmp,png' , 
					'id' => 'required' , 
					'content-category' => 'required' , 
					'contenttype' => 'required'
					];
    	$validator = Validator::make($input, $rules);
		if($validator->fails())
		{
			return Redirect::Back()->withErrors($validator->messages());
		}
		else
		{
			$content = SiteContents::find($input['id']);
			if(!$content)return Redirect::back()->withErrors("Could not find content.");
			$file = Input::file('image');

			if($file){
				$destinationPath = public_path('/default/img-uploads/');
				$filename = str_random(8).$file->getClientOriginalName();
				Input::file('image')->move($destinationPath, $filename);
				$HrefdestinationPath = URL::asset('public/default').'/img-uploads/';
				$content->media = $filename;
			}
			
			$content->title = $input['title'];
			$content->value = $input['textcontent'];
			$content->orderposition = 0;
			$content->contenttype=  ContentType::where('contentkey', $input['contenttype'])->where('contentvalue', $input['content-category'])->pluck('id');
			// $content->updated_at = Carbon::now();

			if($content->save())
			{
				$content->touch();
				
				if($file){
					if(file_exists($destinationPath.$filename))
					{
						$lastInsertId = $content->id;
						SessionController::flash("Content saved.");
						return Redirect::back();
					}
				}else{
						$lastInsertId = $content->id;
						SessionController::flash("Content saved.");
						return Redirect::back();
				}
			}
			else
			{
				return Redirect::Back()->withErrors("Something Went Wrong.");
			}

		}	
	}
	public function destroy($id)
	{
		$c = SiteContents::find($id);
		if($c){
		$c->delete();
		SessionController::flash("Content deleted.");
	}else SessionController::flash("Content not found.");
		return Redirect::back();
	}

	public function ajaxGetContentValue()
	{
		return ContentType::where('contentkey', Input::get('key'))->get();
	}
	public function store()
	{
		$input = Input::all();
		$rules = ['image' => 'mimes:jpeg,bmp,png'];
    	$validator = Validator::make($input, $rules);
		if($validator->fails())
		{
			return Redirect::Back()->withErrors($validator->messages());
		}
		else
		{

			if($file = Input::file('image')){
			//$destinationPath =  URL::asset('public\default').'\img-uploads\\';
			$destinationPath = public_path('/default/img-uploads/');
			//$destinationPath =  Helpers::AssetsDir();
			$filename = str_random(8).$file->getClientOriginalName();
			Input::file('image')->move($destinationPath, $filename);
			$HrefdestinationPath = URL::asset('public/default').'/img-uploads/';
			}
			$content = new SiteContents();
			if($file)$content->media = $filename;
			$content->title = Input::get('title');
			$content->value = Input::get('textcontent');
			$content->orderposition = 0;
			$content->contenttype=  ContentType::where('contentkey', $input['contenttype'])->where('contentvalue', $input['content-category'])->pluck('id');
			if($content->save())
			{ 
				
					$lastInsertId = $content->id;
						SessionController::flash("Content saved.");
					return Redirect::back();
				
				

			}
			else
			{
				return Redirect::Back()->withErrors("Something Went Wrong.");
			}

		}	
	}


}
