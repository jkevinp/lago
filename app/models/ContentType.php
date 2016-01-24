<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class ContentType extends Eloquent {
	use UserTrait, RemindableTrait;
	public $timestamps = true;
	public $fillable = ['contentkey', 'contentvalue'];
	protected $table = 'contenttype';

	public function sitecontents(){
		return $this->hasMany('SiteContents' , 'contenttype', 'id');
	}
}
