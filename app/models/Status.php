<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

class Status extends Eloquent
{
	use SoftDeletingTrait;
	
	protected $table = "statuses";

	protected $fillable = array('status_name','class_name');

	

}