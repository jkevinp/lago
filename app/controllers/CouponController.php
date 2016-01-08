<?php

use Sunrock\Interfaces\CouponRepository;
class CouponController extends \BaseController {

	public function __construct(CouponRepository $c)
	{
		$this->coupon =$c;
	}
	public function computeBill($coupon, $fee)
	{
		switch($coupon->type)
		{
			case 'percent':
				$discount = ($coupon->discountbypercentage / 100);
				$newBill = $fee * $discount;
				return $this->checkReturn($newBill);
			break;
			case 'absolute':
				$fee = $coupon->discountbyvalue;
				$newBill = $fee - $coupon->discountbyvalue;
				return $this->checkReturn($newBill);
			break;
			
		}
	}
	public function checkReturn($fee)
	{
		if($fee <= 0)return 0;
		else return $fee;
	}
	public function create()
	{
		$input = Input::all();
		echo $input['type'];
		if($input['type'] === 'percent')
		{
			
			$rules =  
				[
					'name' => 'required | min:6',
					'discount' =>'numeric|between:1,100'
				];
		}
		else{
			$rules =  
				[
					'name' => 'required|min:6',
					'discount' =>'numeric|between:1,9999999'
				];

		}
		

		if(isset($input['active']))
		$active = 1;
	else $active =0;
		
		$validator = Validator::make($input, $rules);
		if($validator->fails())return Redirect::back()->withInput($input)->withErrors($validator->messages());
		if($input['type'] === 'percent')
		{
			//($couponname, $couponcode ,$discountbypercentage ,$discountbyvalue, $feerequirement, $active, $type)
			$result = $this->coupon->create($input['name'],$input['discount'],0,0, $active, $input['type']);
		}else{
			$result = $this->coupon->create($input['name'],0,$input['discount'],0, $active, $input['type']);
	
		}
		if($result)
		{
			SessionController::flash('Coupon Successfully created! <br/> Code: '.$result);
			return Redirect::back();
		}else
		{
			return Redirect::back()->withErrors('Coupon cannot be created');
		}
	}
	public function edit()
	{
		$input = Input::all();
		if($input['type'] === 'percent')$rules =  ['name' => 'required | min:6','discount' =>'numeric|between:1,100'];
		else $rules = ['name' => 'required|min:6','discount' =>'numeric|between:1,9999999'];
		if(isset($input['active']))$active = 1;
		else $active =0;
		
		$validator = Validator::make($input, $rules);
		if($validator->fails())return Redirect::back()->withInput($input)->withErrors($validator->messages());
		$coupon =$this->coupon->find($input['id']);
		if($coupon)
		{
			if($input['type'] == 'percent')
			$result = $this->coupon->edit($coupon->id ,$input['name'],$input['discount'],0,0, $active, $input['type']);
			else
				$result = $this->coupon->edit($coupon->id ,$input['name'],0,$input['discount'],0, $active, $input['type']);
			if($result)
			{
				SessionController::flash('Coupon Successfully saved! <br/> Code: '.$result);
				return Redirect::back();
			}
			else
			{
				return Redirect::back()->withErrors('Coupon cannot be edited');
			}
		}
		else
			{
				return Redirect::back()->withErrors('Coupon cannot be found');
			}
		
	}
	public function changeStatus($id, $status)
	{
		$result = $this->coupon->changeStatus($id, $status);
		if($result)
		{
			SessionController::flash('Coupon Successfully Saved!');
			return Redirect::back();
		}else
		{
			return Redirect::back()->withErrors('Coupon status not changed!');
		}
	}
	

}
