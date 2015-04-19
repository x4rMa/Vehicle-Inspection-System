<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $fillable = array('username','firstname','phone','lastname','email','code','password', 'level_id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function isAdmin()
	{
		return $this->level_id == 1;
	}

	public function isInspector()
	{
		return $this->level_id == 2;
	}

	public function isClient()
	{
		return $this->level_id == 3;
	}
	
	public function isRa()
	{
		return $this->level_id == 4;
	}

	public function isGeneralUser()
	{
		return $this->level_id == 5;
	}
	
	public function level()
	{
		return $this->belongsTo('Level');
	}

	public function vehicle()
	{
		return $this->hasMany('Vehicle');
	}

	public function getFullNameAttribute()
	{
	    return $this->firstname.' '.$this->lastname;
	}

}