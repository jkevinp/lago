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
		try{
			$input = Input::all();

		//validation for product creation
			$rules = Product::rules();
			$val = Validator::make($input, $rules);
			if($val->fails())throw new Exception($val->messages()->first(), 1);
			
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

			return Response::json([
					'status' => $result ? true : false,
					'message'=> $result ? 'Created New product. <br/> Product id:'.$result : 'Could not create new product!'
				]);

		
		}catch(Exception $e){
			return Response::json([
				'status' => false,
				'message' => $e->getMessage()
				]);
		}

	}
	public function edit()
	{
		try{

			$input = Input::all();
			$rules = Product::rules();
			$val = Validator::make($input, $rules);
			if($val->fails())throw new Exception($val->messages()->first(), 1);
			$result = $this->product->find($input['id']);
			if(!$result)throw new Exception("Could not find product.", 1);
			$result = $this->product->edit($result->id , $input);
			return Response::json([
					'status' => $result ? true : false,
					'message'=> $result ? 'Update Complete!' : 'Update Failed!'
				]);


		}catch(Exception $e){
			return Response::json([
				'status' => false,
				'message' => $e->getMessage()
				]);
		}
		
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
