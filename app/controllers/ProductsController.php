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
		$rules = ['productname' => 'required','fileid' => 'required','producttypeid' => 'required','productprice' => 'required|min:1|numeric|between:1,9999999',
		'paxmin' => 'required|min:1|numeric|between:1,9999999',
		'paxmax' => 'required|min:1|numeric|between:1,9999999'
		];
		$val = Validator::make($input, $rules);
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);
		$result = $this->product->create($input);
		if($result){
			SessionController::flash('Created New product. <br/> Product id:'.$result);
			return Redirect::back();
		}return Redirect::back()->withErrors('Could not create new product!')->withInput($input);
	}
	public function edit()
	{
		$input = Input::all();
		$rules = ['productname' => 'required','fileid' => 'required','producttypeid' => 'required',
		'paxmin' => 'required|min:1|numeric|between:1,9999999',
		'paxmax' => 'required|min:1|numeric|between:1,9999999',
		'productprice' => 'required|min:1|numeric|between:1,9999999'];
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
			if($result)
			{
				SessionController::flash('Product status has been updated!');
				return Redirect::back();
			}else return Redirect::back()->withErrors('Could not find product!');
		}
		return Redirect::back()->withErrors('Could not find product!');
	}
	
}
