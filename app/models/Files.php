<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;


class Files extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	protected $fillable = ['imagename', 'directory','description'];
	protected $table = 'files';
	public function scopeCreatedAscending($query)
    {
        return $query->orderBy('created_at','ASC');
    } 
    public function scopeCreatedDescending($query)
    {
        return $query->orderBy('created_at','DESC');
    } 

}