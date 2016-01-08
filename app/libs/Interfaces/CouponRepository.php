<?php
namespace Sunrock\Interfaces;
interface CouponRepository
{
	public function all();
	public function create($couponname ,$discountbypercentage ,$discountbyvalue, $feerequirement, $active, $type);
	public function find($id);
	public function findbycode($code);
	public function changeStatus($id, $status);
	public function generateId();
	public function generateCode();
	public function edit($id,$couponname ,$discountbypercentage ,$discountbyvalue, $feerequirement, $active, $type);
	public function search($keyword);	
}
