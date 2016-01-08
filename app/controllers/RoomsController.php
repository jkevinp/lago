<?php

class RoomsController extends \BaseController {

	
	public function store()
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
			$destinationPath = 'public\default\img-uploads\\';
			$filename = str_random(8).$file->getClientOriginalName();
			Input::file('image')->move($destinationPath, $filename);
			$HrefdestinationPath = URL::asset('public/default').'/img-uploads/';
			
			$classFile = new Files();
			$classFile->imagename = $filename;
			$classFile->directory = $HrefdestinationPath;
			if($classFile->save())
			{
				if(file_exists($destinationPath.$filename))
				{
					$lastInsertId = $classFile->id;
					echo $destinationPath.$filename;
					echo 'The image has been successfully uploaded';
					echo "<a href='cpanel/rooms/".$lastInsertId."'>Click Here to View File</a>";
				}

			}
			else
			{
				return Redirect::Back()->withErrors("Something Went Wrong.");
			}

		}	
	}

	public function show($id)
	{
		$file = Files::find($id);
		return View::make('admin.rooms.show')->withFile($file);
	}


	


}
