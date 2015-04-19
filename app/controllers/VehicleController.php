<?php

use Illuminate\Support\MessageBag;

class VehicleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$vehicles = (Auth::user()->isClient()) ? Vehicle::where('user_id','=', Auth::id())->get() : Vehicle::all();

		return View::make('vehicles.index')->with('vehicles', $vehicles)->with('title', 'All Vehicles');
	}

	private function isAllowed()
	{
		return ( Auth::user()->isAdmin() ) ? true : false;
	}

	public function hasPaid(Vehicle $vehicles)
	{

		if($vehicles->paid){
			$vehicles->paid = false;
		} else {
			$vehicles->paid = true;	
		}

		$vehicles->staff_id = Auth::id();
		$vehicles->save();

		return Redirect::back();
	}
	
	public function approved()
	{
		$vehicles = (Auth::user()->isClient()) ? Vehicle::has('certificate')->where('user_id','=', Auth::id())->get() : Vehicle::has('certificate')->get();

		return View::make('vehicles.index')->with('vehicles', $vehicles)->with('title', 'Approved Vehicles');
	}
	
	public function pendingPaid()
	{
		
		$vehicles = (Auth::user()->isClient()) ? Vehicle::doesntHave('certificate')->where('user_id','=', Auth::id())->get() : Vehicle::doesntHave('certificate')->where('paid', true)->get();

		return View::make('vehicles.index')->with('vehicles', $vehicles)->with('title', 'Pending Vehicles');
	}

	public function pendingUnpaid()
	{
		
		$vehicles = (Auth::user()->isClient()) ? Vehicle::doesntHave('certificate')->where('user_id','=', Auth::id())->get() : Vehicle::doesntHave('certificate')->where('paid', false)->get();

		return View::make('vehicles.index')->with('vehicles', $vehicles)->with('title', 'Pending Vehicles');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if( ! Auth::user()->isClient() ) {
			return Redirect::to('nopermission');
		}

		$years = [];

		for ($i=date('Y'); $i >= 1980; $i--) { 
			$years[$i] = $i;
		}

	 	return View::make('vehicles.create')
	 		->with('vehicle', new Vehicle)
	 		->with('title','Add New Vehicle')
	 		->with('url', 'vehicles')
	 		->with('method', 'POST')
	 		->with('yom', $years)
	 		->with('yor', $years);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validator = Validator::make(Input::all(), Vehicle::$rules, Vehicle::$messages);

		if($validator->passes()){

			$vehicle = new Vehicle();

			$vehicle->chasis = Input::get('chasis');
			$vehicle->enginecc = Input::get('enginecc');
			$vehicle->engineno = Input::get('engineno');
			$vehicle->yor = Input::get('yor');
			$vehicle->destination = Input::get('destination');
			$vehicle->make = Input::get('make');
			$vehicle->model = Input::get('model');
			$vehicle->location_id = Input::get('location_id');
			$vehicle->vec = '';
			$vehicle->inspection_date = Input::get('inspection_date');

			$vehicle->charge = Location::find(Input::get('location_id'))->location_charge;
			
			$vehicle->user_id = Auth::id();

			$vehicle->save();

			$file = Input::file('vec');

			$extension = $file->getClientOriginalExtension();
			$fileName = "VEC".$vehicle->id.'.'.$extension;

			$vehicle->vec = $fileName;
			$vehicle->save();

			$file->move('uploads', $fileName); //Upload the file to public/uploads

			// CREATE NEW VEHICLE INSPECTION RECORD
			$insp = new VehicleInspection;
			$insp->vehicle_id = $vehicle->id;
			$insp->save();

			//CREATE NEW VEHICLE ROADWORTHINESS RECORD
			$insp_details = new InspectorDetails;
			$insp_details->vehicle_id = $vehicle->id;
			$insp_details->save();


			//Event::fire('vehicle.create', [$vehicle]);

			return Redirect::to('vehicles')->with('success','Vehicle Added Successfully');
		} else {
			return Redirect::to('vehicles/create')->withErrors($validator)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Vehicle $vehicles)
	{

		if($vehicles->user_id != Auth::id() && ( Auth::user()->isClient() )) {
			return Redirect::to('vehicles')->with('error','You cannot view someone else vehicle');
		}

		return View::make('vehicles.show')
				->with('vehicle', $vehicles)
				->with('title','Vehicle Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Vehicle $vehicles)
	{

		if( Auth::user()->isInspector() ) {
			return Redirect::to('nopermission');
		}

		if($vehicles->user_id != Auth::id() && ( ! Auth::user()->isAdmin() )){
			return Redirect::to('vehicles')->with('error','You cannot edit someone else vehicle');
		}

		$years = [];

		for ($i=date('Y'); $i >= 1980; $i--) { 
			$years[$i] = $i;
		}

		return View::make('vehicles.create')
			->with('vehicle', $vehicles)
			->with('title','Edit Vehicle')
			->with('method', 'PUT')
			->with('url', 'vehicles/'.$vehicles->id)
	 		->with('yor', $years);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Vehicle $vehicles)
	{

		$validator = Validator::make(Input::all(), Vehicle::updatingRules($vehicles), Vehicle::$updatingmessages);

		if($validator->passes()){

			//$vehicle = Vehicle::find($id);

			$vehicles->chasis = Input::get('chasis');
			$vehicles->enginecc = Input::get('enginecc');
			$vehicles->destination = Input::get('destination');
			$vehicles->yor = Input::get('yor');
			$vehicles->make = Input::get('make');
			$vehicles->model = Input::get('model');
			$vehicles->location_id = Input::get('location_id');
			$vehicles->inspection_date = Input::get('inspection_date');
			$vehicles->charge = Location::find(Input::get('location_id'))->location_charge;
			$vehicles->save();

			//Event::fire('vehicle.create', [ $vehicle ] );
		
			return Redirect::to('vehicles')->with('success','Vehicle Updated Successfully');
		} else {
			return Redirect::to('vehicles/'.$vehicles->id.'/edit')->withErrors($validator)->withInput();
		}
	}

	public function approvecert(Vehicle $vehicle)
	{
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}

		$v = $vehicle->certificate()->update( ['status' => true] );

		//Send Cert has been issued email
		Event::fire( 'vehicle.certificate', [ $vehicle ] );

		if($v){
			return Redirect::to('vehicles/certificates')->with('success','Vehicle Certificate approved successfully');
		} else {
			return Redirect::to('vehicles/certificates')->with('error','An error occurred while approving the certificate');
		}
	}

	public function showcerts($id = null)
	{
		$certs = Certificate::all();

		$title = 'Vehicle Certificates';
		
		if(is_numeric($id)) { 
			$certs = Certificate::where('status', $id)->get();
			$title = ($id == 1) ? 'Approved Vehicle Certificates' : 'Unapproved Vehicle Certificates';
		}

		return View::make('vehicles.certificates')
			->with('certificates', $certs)
			->with('title', $title);
	}

	// public function showUnapprovedCerts()
	// {
	// 	$certs = Certificate::where('status','=', 0)->get(); 

	// 	return View::make('vehicles.certificates')
	// 		->with('certificates', $certs)
	// 		->with('title','Vehicle Certificates');
	// }

	public function issuecert($id)
	{
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}

		$cert = Vehicle::findOrFail($id);

		return View::make('vehicles.issuecert')
			->with('vehicle', $cert)
			->with('title','Issue Vehicle Certificate')
			->with('method', 'POST')
			->with('url', 'savecert/'.$cert->id);
	}

	public function savecert($id)
	{

		$rules = array(
				'certno'	=> 'required|min:3|unique:certificates',
		);

		$messages = [
			'certno.unique' => 'The Certificate Number has already been issued to another vehicle.'
		];

		$validator = Validator::make(Input::only('certno'), $rules, $messages);

		if($validator->passes()){

			//$v = Vehicle::findOrFail($id);

			if ( Certificate::where('vehicle_id', $id)->count() > 0 ){
				return Redirect::to('vehicles/certificates')->with('error','The vehicle has already been issued with a certificate.');
			}

			$cert = new Certificate;

			$cert->certno = Input::get('certno');

			$cert->vehicle_id = $id;

			$cert->issued_by = Auth::id();

			$cert->save();

			return Redirect::to('vehicles/certificates')->with('success','Vehicle Certificate issued successfully');
		} else {
			return Redirect::to('vehicle/'.$id.'/issuecert')->withErrors($validator)->withInput();
		}
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Vehicle $vehicles)
	{
		$vehicles->inspection()->delete();
		$vehicles->inspectordetails()->delete();
		$vehicles->certificate()->delete();
		$vehicles->delete();

		//Event::fire('vehicle.deleted', [$vehicle]);

		return Redirect::to('vehicles')->with('success', 'Vehicle Deleted Successfully');
	}

	public function destroycert($id)
	{
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}

		Certificate::find($id)->delete();

		return Redirect::to('vehicles/certificates')->with('success', 'Vehicle Certificate Deleted Successfully');
	}

	public function download($id, $action = null)
	{
	
	$vehicle = Vehicle::findOrFail($id);
		
    $html = "<center> "."<img src=".URL::asset('assets/images/logoo.png')."></center>"
    		."<br>"
    		."<center style='font-size:20px'>EAST AFRICA AUTOMOBILE SERVICE Co.,LTD"
    		."<br>"
			."TEL : 046-205-7611  Website : http://www.eaa-s.jp"
			."<br>"
			."FAX : 046-205-7610  Email : info@eaa-s.jp"
			."<br>"
			."<p style='font-size:30px'><i>Certificate of Appraisal</i></p></center>"
		     ."<br><b>Certificate Number: ".$vehicle->certificate->certno."</b>"
		     ."<br>"
		     ."<br>"
			."Date of Issue: " .$vehicle->certificate->updated_at
			."<br>"
			."Date of Appraisal: " .$vehicle->inspectordetails->updated_at
			."<br>"
			 ."<br>"
	    	."<br>"
	    	."Client: " .$vehicle->user->fullname
	    	."<br>"
	    	."Email: ".$vehicle->user->email
	    	."<br>"
	    	."Phone Number: ".$vehicle->user->phone
	     	."<br>"
	     	."<br>"
	     	."<br>"
			."We hereby certify that the vehicle, for which details are given below,"
			."has the following value at the time of appraisal in Japan"
			."<br>"
			."<br>"
	 		."Make: " .$vehicle->make
	 		."<br>"
	 		."Model: " .$vehicle->model
	 		."<br>"
	 		."Engine Capacity (cc rating): " .$vehicle->enginecc
	 		."<br>"
	 		."Year of First Registration: " .$vehicle->yor
	  		."<br>"
	   		."Chassis Number: " .$vehicle->chasis	
	  		."<br>"
	  ."Engine Number: " .$vehicle->engineno
	  ."<br>"
	  ."Inspected Mileage (Odometer Reading): " .$vehicle->mileage
	 ."<br>"
	  ."Inspected Date: " .$vehicle->inspection->updated_at
	  ."<br>"
	  ."<br>"
	  ."<br>"
	 ."Remarks: " .$vehicle->inspection->comment
	   ."<br>"
	    ."<br>"
	     ."<br>"
	     ."This appraisal for the vehicle was made in accordance with, and on the basis of the provisions set forth by" 

	  ." EAST AFRICA AUTOMOBILE SERVICES" 
	  ."<br>"
	  ."<img src=".URL::asset('assets/images/place.png').">"
		."<br>"
		."<img src=".URL::asset('assets/images/sign.png').">"
     	."<br>"
	   ."____________________________________________________________________________________________________________________________________________________ " 
	   ."<br>"
	   ."THIS CERTIFICATE IS VALID FOR A PERIOD OF THREE(3) MONTHS FROM THE DATE OF ISSUE" 
	   ."<br>";
	   
	  if($action == 'view')
	   	 return PDF::load($html, 'A4', 'portrait')->show();
	  else
	   	return PDF::load($html, 'A4', 'portrait')->download($vehicle->certificate->certno);
	}

}