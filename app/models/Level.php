<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

class Level extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'levels';

	protected  $fillable = array('level_name');

}