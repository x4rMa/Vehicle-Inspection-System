<?php

Route::get('in', function(){

	Auth::attempt(['email'=>'admin@eaa-s.jp', 'password'=>'admin123']);

	return Redirect::to('/');

});

Route::get('restore/{id}', function($id){
	$vehicles = Vehicle::withTrashed()->find($id);
	$vehicles->inspection()->restore();
	$vehicles->inspectordetails()->restore();
	$vehicles->certificate()->restore();
	$vehicles->restore();
});

Route::get('nopermission', function(){
	return View::make('errors.stop')->with('title', 'Error Message');
});



Route::model('vehicles', 'Vehicle');
//Route::model('vehiclesinspection', 'VehicleInspection');
Route::model('users', 'User');
Route::model('certificates', 'Certificate');
Route::model('inspectordetails', 'InspectorDetails');

Route::resource('users', 'UserController');

Route::post('unlock', 'UserController@unlock');
Route::get('lock', 'UserController@lock');
Route::get('logout', 'UserController@logout');



Route::group(array('before'=>'guest'), function(){ 

	Route::get('login', 'UserController@login');
	Route::post('loginpost', 'UserController@loginpost');

	Route::get('register', 'UserController@register');
	Route::post('registerpost', 'UserController@registerpost');

	Route::get('resetpass', 'UserController@resetpass');
	
	Route::post('resetpasspost', 'UserController@resetpasspost');

	Route::get('email/{email}/reset/{code}', 'UserController@newpassword');

	//Route::get('email/{email}/activate/{code}', 'UserController@activate');
	Route::get('email/{email}/code/{code}', 'UserController@verify');

	Route::get('users/resend', 'UserController@resend');
});


/****You Must Be Logged In to do the following****/

Route::group(array('before'=>'auth'), function(){

	Route::get('/',  'DashboardController@index');
	Route::get('profile', 'UserController@profile');
	Route::post('profile', 'UserController@updateOwnProfile');
	Route::get('vehicles/certificates/{id}/download/{action?}', 'VehicleController@download');

	//Vehicle Roadworthiness Report
	Route::get('vehicle/{id}/report', 'VehicleInspectionController@inspectorreport');	
	Route::post('savereport/{id}', 'VehicleInspectionController@saveinspectordetails');

	Route::group(array('before'=>'admin,generalUser'), function(){
		//Issue Certificate

		Route::get('paid/{vehicles}', 'VehicleController@hasPaid');

		Route::get('vehicle/{id}/issuecert', 'VehicleController@issuecert');
		Route::get('vehicles/certificates', 'VehicleController@showcerts');
		Route::get('vehicles/certificates/{id}', 'VehicleController@showcerts');
		Route::get('vehicles/certificates/{vehicles}/approve', 'VehicleController@approvecert');
		Route::post('savecert/{id}', 'VehicleController@savecert');
		Route::delete('vehicles/certificates/{id}/delete', 'VehicleController@destroycert');
		Route::resource('locations', 'LocationController');

	});

	Route::group(array('before'=>'admin,inspector'), function(){

		Route::get('complete', 'VehicleInspectionController@complete');

		Route::resource('vehiclesinspection', 'VehicleInspectionController');
		//Vehicle Roadworthiness Report
		Route::get('vehicle/{id}/report', 'VehicleInspectionController@inspectorreport');	
		Route::post('savereport/{id}', 'VehicleInspectionController@saveinspectordetails');

	});
	
	Route::get('approved', 'VehicleController@approved');
	Route::get('pendingpaid', 'VehicleController@pendingPaid');
	Route::get('pendingunpaid', 'VehicleController@pendingUnpaid');

	//Route::get('unapprovedcerts', 'VehicleController@showUnapprovedCerts');
	Route::resource('clients', 'ClientController');
	Route::resource('vehicles', 'VehicleController');
	Route::resource('projects', 'ProjectController');
	Route::resource('services', 'ServiceController');
	Route::resource('pdfreports', 'PDFReportsController');
	
	Route::get('user/{level?}', 'UserController@index');
});