<?php
namespace Sunrock\Repositories;
use Product;
use Sunrock\Interfaces\ProductRepository;
use DB;
use BookingDetails;
class EloquentProductRepository implements ProductRepository
{
	public  $perPage = 6;
	public function all(){
		return Product::all();
	}
	public function find($id){
		return Product::find($id);
	}
	public function paginate(){

	}
	public function create($input)
	{
		$p = new Product();
		$p->productname = $input['productname'];
		$p->productdesc = $input['productdesc'];
		$p->productprice= $input['productprice'];
		$p->nightproductprice= $input['nightproductprice'];
		$p->overnightproductprice= $input['overnightproductprice'];
		$p->extensionproductprice= $input['extensionproductprice'];
		$p->paxmin = $input['paxmin'];
		$p->paxmax = $input['paxmax'];
		$p->productquantity = 1;
		$p->fileid = $input['fileid'];
		$p->producttypeid = $input['producttypeid'];

		if($p->save()){
			$lastInsertId = $p->id;
			return $lastInsertId;
		}
		return false;
			
	}
	public function getReserved($date)
	{
		return Product::whereNotExists(function($q) use ($date)
		{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
									product.id = booking_details.productid AND
									booking_details.bookingstart <= "'.$date['start'].'" AND
									booking_details.bookingend >= "'.$date['end'].'"
								  ');}
					);
	}
	public function getAvailable($date , $paxmin = false , $paxmax = false)
	{
		if($paxmin && !$paxmax){
			$t = Product::whereNotExists(function($q) use ($date)
			{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
									product.id = booking_details.productid AND
									booking_details.bookingstart >= "'.$date['start'].'" AND
									booking_details.bookingend <= "'.$date['end'].'"
								  ');}
					)
			->where('active', '=' , '1')
			->whereNotBetween('producttypeid', [3, 4])
			->where('paxmin' , '>=' , $paxmin)
			->where('paxmax' , '<=' , $paxmin)
			->paginate(6);

		}else if($paxmin && $paxmax){
			$t = Product::whereNotExists(function($q) use ($date)
			{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
									product.id = booking_details.productid AND
									booking_details.bookingstart >= "'.$date['start'].'" AND
									booking_details.bookingend <= "'.$date['end'].'"
								  ');}
					)
			->where('active', '=' , '1')
			->whereNotBetween('producttypeid', [3, 4])
			->where('paxmax' , '>=' , $paxmax)
			->paginate(6);
		}
		else{
		$t = Product::whereNotExists(function($q) use ($date)
		{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
									product.id = booking_details.productid AND
									booking_details.bookingstart >= "'.$date['start'].'" AND
									booking_details.bookingend <= "'.$date['end'].'"
								  ');}
					)
		->where('active', '=' , '1')
		->whereNotBetween('producttypeid', [3, 4])->paginate(6);
			
		}
		

		return $t;
	}
	/*join('sales' , function($j)
					{
							$j->on('booking_details.productid' , '=' , 'sales.productid');

					})->get();*/
	public function getAvailableAddOns($date)
	{
		return Product::whereNotExists(function($q) use ($date)
		{
				$q->select(DB::raw(1))
						->from('booking_details')
						->whereRaw('
									product.id = booking_details.productid
								  ');}
					)
		->where('active', '=' , '1')
		->paginate(6);
	}

	public function check($date ,$id)
	{
		return BookingDetails::where('productid' , $id)
			->whereRaw("'".$date['start']."' >= bookingstart and '".$date['start']."' <= bookingend")
			->orWhereRaw("'".$date['end']."' >= bookingstart and '".$date['end']."' <= bookingend");
		/*->where(function($query) use ($date , $id)
            {
                $query->where('bookingstart', '>=', $date['start'])
                      ->where('bookingend', '>=', $date['start'])
                      ->where('productid', $id);
            });	
		*/

	}
	public function changeStatus($product)
	{
		if($product->active == 1)
			$product->active = 0;
		else $product->active = 1;
		return $product->save();
	}
	public function edit($id, $input)
	{
		$p = $this->find($id);
		$p->productname = $input['productname'];
		$p->productprice= $input['productprice'];
		$p->nightproductprice= $input['nightproductprice'];
		$p->overnightproductprice= $input['overnightproductprice'];
		$p->extensionproductprice= $input['extensionproductprice'];
		$p->paxmin = $input['paxmin'];
		$p->paxmax = $input['paxmax'];
		$p->producttypeid = $input['producttypeid'];
		$p->fileid = $input['fileid'];
		$p->productdesc = $input['productdesc'];
		if($p->save())return $p->id;
		return false;
	}
	public function getObject(){
		return new Product();
	}
	
}