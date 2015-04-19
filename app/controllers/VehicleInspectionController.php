<?php

use Illuminate\Support\MessageBag;

class VehicleInspectionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$vehicle = DB::table('vehicles')
					->leftJoin('users', 'vehicles.user_id', '=', 'users.id')
			        ->join('vehicles_inspection', function($join)
			        {
			            $join->on('vehicles.id', '=', 'vehicles_inspection.vehicle_id')
			                 ->where('vehicles_inspection.status', '=', false);
			        })
			        ->where('paid', true)

			        ->get();


		return View::make('vehiclesinspection.index')
		->with('vehicleinspection', $vehicle)
		->with('title', 'Pending Inspections')
		->with('status', false);
	}

	public function complete()
	{

		$vehicle = DB::table('vehicles')
					->leftJoin('users', 'vehicles.user_id', '=', 'users.id')
			        ->join('vehicles_inspection', function($join)
			        {
			            $join->on('vehicles.id', '=', 'vehicles_inspection.vehicle_id')
			                 ->where('vehicles_inspection.status', '=', true);
			        })
			        ->where('paid', true)
			        ->get();


		return View::make('vehiclesinspection.index')
		->with('vehicleinspection', $vehicle)
		->with('title', 'Completed Inspections')
		->with('status', true);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('vehiclesinspection.show')
				->with('vehicle', Vehicle::find($id))
				->with('title','Vehicle Inspection Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if( (! Auth::user()->isInspector()) && (! Auth::user()->isAdmin() ) ) {
			return Redirect::to('nopermission');
		}

		$vehicle = Vehicle::findOrFail($id)->inspection;

		return View::make('vehiclesinspection.create')
			->with('vehicle', $vehicle)
			->with('title','Inspect Vehicle')
			->with('method', 'PUT')
			->with('url', 'vehiclesinspection/'.$id);
	}



	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$rules = array(

				'mileage'		=> '',
				'pstatus'		=> '',
				'istatus'		=> '',
				'certno'		=> '',
				'comment'		=> '',
				'reistatus' 	=> '',
				'inspe_comment'	=> '',
				'amount_paid'	=> '',
				'reinspe_amount'=> '',
				'vvalue'		=> '',
				'issue_date' 	=> '',
				'inspedate' 	=> '',
				'weekreport' 	=> '',
				'monthreport' 	=> '',
				'odometreunit' 	=> '',
				'inspecentre' 	=> ''
		);

		$messages = [
			
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){

			$data = Input::except('_token', '_method');

			$feedback = ['to'=>'vehiclesinspection', 'flash'=>'Vehicle Inspection Report Updated Successfully'];

			if (Input::get('status') == NULL){
				$data['status'] = false;

			} else {
				$data['status'] = true;
				$feedback = ['to'=>'vehicles', 'flash'=>'Vehicle Inspection Completed Successfully'];
			} 

			$data['staff_id'] = Auth::id();

			Vehicle::findOrFail($id)->inspection()->update($data);

			return Redirect::to($feedback['to'])->with('success', $feedback['flash']);
		} else {
			return Redirect::to('vehiclesinspection/'.$vehicle->id.'/edit')->withErrors($validator)->withInput();
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function inspectorreport($id)
	{

		return View::make('vehiclesinspection.inspect')
			->with('vehicle', Vehicle::findOrFail($id))
			->with('title','Inspect Vehicle')
			->with('url', 'savereport/'.$id);
	}

	public function saveinspectordetails($id)
	{

		$rules = [];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){

			$vehicle = Vehicle::findOrFail($id);


			$vehicle->inspectordetails()->update(Input::except('_token', '_method','medrep'));

			//Event::fire('vehicle.inspected', array($vehicle));

			return Redirect::to('vehiclesinspection')->with('success','Vehicle Roadworthiness Report Saved Successfully');
		} else {
			return Redirect::to('vehicle/'.$id.'/report')->withErrors($validator)->withInput();
		}
	}

}
