<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

class Location extends Eloquent
{
	use SoftDeletingTrait;
	
	protected $table = 'locations';

	protected $fillable = ['location_name','location_charge'];

	public function vehicle()
	{
		return $this->hasMany('Vehicle', 'location_id');
	}

}