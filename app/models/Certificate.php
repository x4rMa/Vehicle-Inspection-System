<?php

class Certificate extends Eloquent
{
	
	protected $table = 'certificates';

	protected $fillable = [
			'vehicle_id',
			'issued_by',
			'status'
	];

	public function vehicle()
	{
		return $this->belongsTo('Vehicle', 'vehicle_id');
	}


}