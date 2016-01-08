<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usergroup extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	public $timestamps = false;
	public $fillable = ['usergroupname', 'usergroupauth'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usergroup';	
	 public function users()
    {
        return $this->belongsToMany('User');
    }

}
