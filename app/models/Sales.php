<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Sales extends Eloquent implements UserInterface, RemindableInterface
{

	use UserTrait, RemindableTrait;
	protected $fillable = ['cartid','bookingid', 'type', 'transactionid' , 'id' , 'productid', 'productquantity', 'productprice' ,'totalprice'];
	protected $table = 'sales';
	public function scopeCreatedAscending($query)
    {
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 
    public function product(){
        return $this->hasOne('Product' , 'id' , 'productid');
    }
    public function products(){
        return $this->hasOne('Product' , 'id' , 'productid');
    }
     public function transaction(){
        return $this->hasOne('Transactions' , 'id' , 'transactionid');
    }
    public function transactions(){
        return $this->hasOne('Transactions' , 'id' , 'transactionid');
    }
    public function account()
    {
        return $this->belongsTo('Account' , 'account_id');
    }
}