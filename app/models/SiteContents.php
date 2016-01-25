<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class SiteContents extends Eloquent {
	use SoftDeletingTrait;
	protected $table = 'sitecontents';
	public $timestamps = true;
	public $fillable = ['contenttype', 'value' , 'orderposition' , 'media' , 'created_at' , 'updated_at' , 'deleted_at'];
	protected $dates = ['updated_at' , 'created_at' , 'deleted_at'];
	public function contentkey()
	{
		return $this->belongsTo('ContentType' ,'contenttype');
	}
	public function GetDate()
	{
		return $this->updated_at;
	}
}
