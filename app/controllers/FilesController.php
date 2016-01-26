<?php

class FilesController extends \BaseController {

	public function create()
	{
		$input = Input::all();
		$rules = array('image' => 'mimes:jpeg,bmp,png|required');
    	$validator = Validator::make($input, $rules);
		if($validator->fails())
		{
			return Redirect::Back()->withErrors($validator->messages());
		}
		else
		{
			$file = Input::file('image');
			//$destinationPath =  URL::asset('public\default').'\img-uploads\\';
			$destinationPath = public_path('/default/img-uploads/');
			$filename = str_random(8).$file->getClientOriginalName();
			Input::file('image')->move($destinationPath, $filename);
			$HrefdestinationPath = URL::asset('public/default').'/img-uploads/';
			$classFile = new Files();
			$classFile->imagename = $filename;
			$classFile->directory = $HrefdestinationPath;
			$classFile->description = $input['description'];
			if($classFile->save())
			{
				if(file_exists($destinationPath.$filename))
				{
					$lastInsertId = $classFile->id;
					echo $destinationPath.$filename;
					SessionController::flash('The image has been successfully uploaded<br/>'."<a href='".URL::action('cpanel.show' ,['action' => 'file' , 'param' => $lastInsertId])."'>Click Here to View File</a>");
					return Redirect::back();
				}
			}
			else
			{
				return Redirect::Back()->withErrors("Something Went Wrong.");
			}

		}	
	}


}
