<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Product extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $fillable = ['paxmin' ,'paxmax', 'active', 'productname', 'productdesc', 'productprice' ,'nightproductprice','overnightproductprice','extensionproductprice','productquantity','fileid', 'producttypeid'];
	protected $table = 'product';

	public function producttype(){
		 return $this->belongsTo('ProductType', 'producttypeid');
	}
	public function producttypename(){
		 return $this->belongsTo('ProductType', 'producttypename');
	}
	public function booking_details(){
		return $this->belongsToMany('booking_details');
	}
	public function scopeCreatedAscending($query){
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query){
        return $query->orderBy('created_at','DESC');
    } 
    public function scopeProductIsOthers(){
    	
    }
    public function getPriceByMode($mode){
    	switch ($mode) {
    		case 'day':
    			return $this->productprice;
    		break;
			case 'night':
				return $this->nightproductprice;
			break;
			case 'overnight1':
			case 'overnight2':
				return $this->overnightproductprice;
			break;
    	}
    }
    public function scopeByName($query){
    	
    }
    public static $rules = [
			'productname' => 'required|unique:product,productname',
			'producttypeid' => 'required',
			'productprice' => 'required|min:0|numeric|between:1,9999999',
			'nightproductprice' => 'required|min:0|numeric|between:1,9999999' ,
			'overnightproductprice' => 'required|min:0|numeric|between:1,9999999',
			'extensionproductprice' => 'required|min:0|numeric|between:1,9999999',
			'paxmin' => 'required|min:1|numeric|between:1,9999999',
			'paxmax' => 'required|min:1|numeric|between:1,9999999',
			'image' => 	'mimes:image,jpeg,jpg,bmp,png|required'
		];
    public static function rules(){
    	return self::$rules;
    }
}