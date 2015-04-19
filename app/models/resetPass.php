<?php

class resetPass extends Eloquent
{
	
	protected $table = "resetpass";

	protected $fillable = ['email','code','password'];

	public $timestamps = false;

	

}