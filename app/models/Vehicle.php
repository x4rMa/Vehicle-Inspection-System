<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait; // <-- This is required

use Carbon\Carbon;

class Vehicle extends Eloquent
{
	use SoftDeletingTrait;
	
	protected $table = 'vehicles';

	protected $fillable = ['user_id','chasis','engineno','enginecc','yom','yor','destination','make','model','location_id','charge', 'vec','inspection_date','paid','staff_id'];
	
	protected $dates = ['inspection_date'];

	public static $rules = array(
				'chasis'	=> 'required|min:3|unique:vehicles',
				'destination'	=> 'required|min:2',
				'enginecc'	=> 'required|min:3',
				'yor'		=> 'required|integer|digits:4',
				'make' 		=> 'required',
				'model'		=> 'required',
				'location_id'	=> 'required|numeric',
				'vec'		=> 'required|mimes:png,jpeg,jpg,pdf,doc|max:20000', //2 MB
				'inspection_date' => 'required|date|after:yesterday'
	);

	public static $messages = [
		'yor.digits' => 'The year of first registration should be a valid year.',
		'vec.required' => 'Please upload the Vehicle Export Certificate',
		'chasis.unique' => 'Chassis Number is already in existence',
		'vec.mimes' => 'Vehicle Export Certificate should be in png, jpeg, jpg, pdf or doc format only'
	];

	public static function updatingRules($vehicles)
	{

	return  [
				'chasis'	=> 'required|min:3|unique:vehicles,chasis,'.$vehicles->id,
				'enginecc'	=> 'required|min:3|unique:vehicles,enginecc,'.$vehicles->id,
				'destination'		=> 'required|min:2',
				'yor'		=> 'required|integer|digits:4',
				'make' 		=> 'required',
				'model'		=> 'required',
				'location_id'	=> 'required|numeric',
				'inspection_date'	=> 'required|date|after:yesterday'
		];
	}

	public static $updatingmessages = [
			'yom.digits' => 'The year of manufacture should be a valid year.',
			'yor.digits' => 'The year of first registration should be a valid year.'
		];
	
	
	public function setInspectionDateAttribute($date)
	{
		$this->attributes['inspection_date'] = Carbon::parse($date);
	}

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
	
	public function location()
	{
		return $this->belongsTo('Location', 'location_id');
	}

	public function inspection()
	{
		return $this->hasOne('VehicleInspection', 'vehicle_id');
	}

	public function certificate()
	{
		return $this->hasOne('Certificate', 'vehicle_id');
	}

	public function inspectordetails()
	{
		return $this->hasOne('InspectorDetails', 'vehicle_id');
	}

	
}