<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

class VehicleInspection extends Eloquent
{
	use SoftDeletingTrait;
	
	protected $table = 'vehicles_inspection';

	protected $fillable = [
			'vehicle_id',
			'mileage',
			'pstatus',
			'istatus',
			'certno',
			'comment',
			'reistatus',
			'inspe_comment',
			'amount_paid',
			'reinspe_amount',
			'vvalue',
			'issue_date',
			'inspedate',
			'weekreport',
			'monthreport',
			'odometreunit',
			'inspecentre',
			'status',
			'staff_id'
		];

	public function vehicle()
	{
		return $this->belongsTo('Vehicle', 'vehicle_id');
	}

	public function getInspectorAttribute()
	{
		return User::where('id','=', $this->staff_id)->firstOrFail()->fullname;
	}

}