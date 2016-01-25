<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class SiteContents extends Eloquent {
	public $timestamps = true;
	public $fillable = ['contenttype', 'value' , 'orderposition' , 'media'];
	protected $table = 'sitecontents';

	public function contentkey()
	{
		return $this->belongsTo('ContentType' ,'contenttype');
	}
}
