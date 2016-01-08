<?php
namespace Sunrock\Repositories;
use Sales;
use Sunrock\Interfaces\SaleRepository as srepo;
use Hash;

class EloquentSaleRepository implements srepo
{
	private $page = 6;
	private $vat = 0.12;
	public function all(){
		return Sales::all();
	}

	public function find($id){
		return Sales::find($id);
	}
	public function create($id,$productid,$qty,$price, $transactionid ,$type){
		$s = new Sales();
		$saleid = $this->generateId();
		$s->id = $saleid;
		$s->cartid = $id;
		$s->transactionid = $transactionid;
		$s->type = $type;
		$s->productid = $productid;
		$s->productquantity = $qty;
		$s->productprice = $price;
		$s->totalprice = $qty * $price;
		$temp = $s;
		if($s->save()){
			$temp->id = $id;
			return $temp;
		}else{
			return false;
		}
	}
	public function compute($id)
	{
		$total = $vat;
		return $total;
	}
	public function findByCartId($id)
	{
		return Sales::where('cartid' , '=' , $id);
	}
	public function findByTransactionId(){

	}
	public function generateId(){
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("Ym",$date_array[1]);
		$date = $date.rand(0, 1000000).str_random(6);
		return $date;
	}
}