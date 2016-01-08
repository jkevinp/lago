<?php
namespace Sunrock\Repositories;
use BookingDetails;
use Sunrock\Interfaces\BookingDetailsRepository;
use Hash;
use Helpers;
use Product;
use Files;
use Carbon\Carbon;
class EloquentBookingDetailsRepository implements BookingDetailsRepository
{
	private $page = 6;
	public function getByRefId($id){
		return BookingDetails::where('bookingreferenceid', '=' , $id);
	}
	public function getProduct($id){
		return Product::find($id);
	}
	public function getMedia($id){
		$product = Product::find($id);
		if($product)
		{
			$file = Files::find($product->fileid);
			if($file)
			{
				return $file->imagename;
			}
				return 'default.jpg';
		}
		else
			return 'default.jpg';
	}
	public function all(){
		return BookingDetails::all();
	}
	public function find($id){
		return BookingDetails::find($id);
	}
	public function paginate(){
		return BookingDetails::paginate($this->page);
	}
	public function findByBookingRefid($code){
		return BookingDetails::where('bookingreferenceid' , '=',$code);
	}
	public function changeTemporaryStatus($arows, $isTemp){
		 foreach ($arows as $row) {
		 	$row->temporary = $isTemp;
		 	$row->save();
		 }
	}
	public function changeRoom($bid, $product , $di){
		$detail = $this->find($bid);
		$detail->productid = $product->id;
		$detail->productname= $product->productname;
		$newStartDAte = new Carbon($di['start']);
		$newStartDAte = $newStartDAte->addHours($di['timeofday']);
		$detail->bookingstart = $newStartDAte;
		$detail->bookingend = $newStartDAte->addHours($di['lenofstay'] * 24);
		return $detail->save();
	}
	public function updateBookingReference($code ,$newid){
		return $this->findByBookingRefid($code)->update(['bookingreferenceid' => $newid]);
	}
	public static function create($items , $date ,$token , $temporary){
		$booking_details =   new BookingDetails();
		foreach ($items as $key => $value)
		{
			$booking_details = BookingDetails::create(array(
					'productid'   => $value['productid'] ,
					'productname' =>  $value['product'],
					'quantity'    => $value['quantity'],
					'bookingreferenceid' => $token,
					'time' => $date['timeofday'],
					'bookingstart' =>  $date['datetime_start'],
					'bookingend' => $date['datetime_end'],
					'temporary' => $temporary
				));
		}
	}
	public static function deleteTemporary($token){
		BookingDetails::where('bookingreferenceid' ,'=' ,$token)->delete();
	}
}