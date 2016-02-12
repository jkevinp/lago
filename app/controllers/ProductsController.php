<?php

use Sunrock\Interfaces\ProductRepository as prepo;
class ProductsController extends \BaseController 
{
	public function __construct(prepo $prepo)
	{
		$this->product = $prepo;
	}
	public static function getProducts()
	{
		Product::all();
	}
	public static function getAvailabeProductsByDate($date , $perPage)
	{
		return Product::whereNotExists(function($q) use ($date)
		{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
								
 									Product.id = booking_details.productid AND
									booking_details.bookingstart >= "'.$date['start'].'" AND
									booking_details.bookingend <= "'.$date['end'].'"
								  ');}
					)->paginate($perPage);
	}
	public function create(){
		$input = Input::all();
		//validation for product creation
		$rules = Product::rules();
		$val = Validator::make($input, $rules);
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);
		//create a file entry for the image
		$file = Input::file('image');
		$destinationPath = public_path('/default/img-uploads/');
		$filename = str_random(8).$file->getClientOriginalName();
		Input::file('image')->move($destinationPath, $filename);//move the file to folder
		$HrefdestinationPath = URL::asset('public/default').'/img-uploads/';
		$classFile = new Files();
		$classFile->imagename = $filename;
		$classFile->directory = $HrefdestinationPath;
		$classFile->description = $input['productdesc'];
		$classFile->save();
		$input['fileid'] = $classFile->id;
		$result = $this->product->create($input);
		if($result){
			SessionController::flash('Created New product. <br/> Product id:'.$result);
			return Redirect::back();
		}
		return Redirect::back()->withErrors('Could not create new product!')->withInput($input);
	}
	public function edit()
	{
		$input = Input::all();
		$rules = Product::rules();
		$val = Validator::make($input, $rules);
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);
		$result = $this->product->find($input['id']);
		if($result){
			$result = $this->product->edit($result->id , $input);
			if($result)
			{
				SessionController::flash('Product found! Product changes saved!');
				return Redirect::back();
			}
			else return Redirect::back()->withErrors('Could not edit product!')->withInput($input);
		}return Redirect::back()->withErrors('Could not find product!')->withInput($input);
	}
	public function changeStatus($id, $status)
	{
		$result = $this->product->find($id);
		if($result)
		{
			$result = $this->product->changeStatus($result);
			SessionController::flash('Product status has been updated!');
			return Redirect::back();
		}
		return Redirect::back()->withErrors('Could not find product!');
	}
	
}
