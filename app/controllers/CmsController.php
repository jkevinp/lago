<?php

class CmsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$contenttype = ContentType::all();
		return View::make('admin.cms.index')->with(compact('contents' , 'contenttype'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$contenttype = ContentType::whereNull('deleted_at')->groupBy('contentkey')->lists('contentkey','contentkey');
		return View::make('admin.cms.create')->with(compact('contenttype'));
	}


	


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if($content = SiteContents::find($id)){
		$contenttype = ContentType::whereNull('deleted_at')->groupBy('contentkey')->lists('contentkey','contentkey');
			return View::make('admin.cms.edit')->with(compact('contenttype' , 'content'));
		}
		else SessionController::flash("Content not found.");
		return Redirect::to(route('cms.index'));
	}




	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$input = Input::all();
		$rules = [	'image' => 'mimes:jpeg,bmp,png' , 
					'id' => 'required' , 
					'content-category' => 'required' , 
					'contenttype' => 'required'];
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


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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
