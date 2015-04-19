<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

class Logger extends Eloquent
{
	use SoftDeletingTrait;

	protected $table = 'logs';

	protected  $fillable = array('user_id', 'action', 'url');
}