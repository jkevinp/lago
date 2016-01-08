<?php
namespace Sunrock\Repositories;

use Sunrock\Interfaces\CouponRepository;
use Coupon;
class EloquentCouponRepository implements CouponRepository
{
	private $page = 6;
	public function all(){
		return Coupon::all();
	}
	public function find($id){
		return Coupon::find($id);
	}

	public function create($couponname ,$discountbypercentage ,$discountbyvalue, $feerequirement, $active, $type)
	{
		$coupon = new Coupon();
		$coupon->id = $this->generateId();
		$coupon->couponname = $couponname;
		$coupon->couponcode = $this->generateCode();
		$coupon->discountbypercentage = $discountbypercentage;
		$coupon->discountbyvalue = $discountbyvalue;
		$coupon->feerequirement = $feerequirement;
		$coupon->active = $active;
		$coupon->type = $type;
		if($coupon->save())
			return $coupon->couponcode;
		else return false;
		
	}
	public function findByCode($code)
	{
		return Coupon::where('couponcode' ,'=' , $code);
	}
	public function changeStatus($id, $status)
	{
		$coupon = $this->find($id);
		$coupon->active= $status;
		return $coupon->save();
	}
	public function generateId()
	{
		return date('Y').str_random(5).rand(0,9999);
	}
	public function generateCode()
	{
		return 'Sun'.date('Y').str_random(5).rand(0,9999);
	}
	public function edit($id, $couponname ,$discountbypercentage ,$discountbyvalue, $feerequirement, $active, $type)
	{
		$coupon = $this->find($id);
		if($coupon)
		{
			$coupon->couponname = $couponname;
			$coupon->discountbypercentage = $discountbypercentage;
			$coupon->discountbyvalue = $discountbyvalue;
			$coupon->feerequirement = $feerequirement;
			$coupon->active = $active;
			$coupon->type = $type;
			if($coupon->save())
				return $coupon->couponcode;
			else return false;
		}
		else
		{
			return false;
		}
	}
	public function search($keyword)
	{
		$matches = ['id','couponname', 'couponcode'  ,'active' ,'type' ];
		$ctr =0;
		foreach ($matches as $match)
		{
			if($ctr == 0 ) $coupons = Coupon::where($match , 'LIKE' , "%$keyword%");
			else $coupons = Coupon::orWhere($match , 'LIKE' , "%$keyword%");
			$ctr ++;
		}
		return $coupons;
	}
	
}