<?php

class LocationController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('locations.index')
				->with('title','Locations')
				->with('locations', Location::orderBy('id','desc')->paginate(10));
				
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('locations.create')
		 		->with('location', new Location)
		 		->with('title','Create New Location')
		 		->with('url', 'locations')
		 		->with('method', 'POST');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
				'location_name'		=> 'required|min:2|unique:locations',
				'location_charge'	=> 'required|integer'
			);


		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){

			$s = new Location();

			$s->location_name = Input::get('location_name');
			$s->location_charge = Input::get('location_charge');

			$s->save();

			return Redirect::to('locations')->with('success','Location Created Successfully');
		} else {
			return Redirect::to('locations/create')->withErrors($validator)->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('locations.show')->with('location', Location::findOrFail($id))->with('title','Location Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('locations.create')
		 		->with('location', Location::findOrFail($id))
		 		->with('title','Edit Locations')
		 		->with('url', 'locations/'.$id)
		 		->with('method', 'PUT');
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
				'location_name'		=> 'required|min:2|unique:locations,location_name,'.$id,
				'location_charge'	=> 'required|numeric'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			$s = Location::findOrFail($id);

			$s->location_name = Input::get('location_name');
			$s->location_charge = Input::get('location_charge');

			$s->save();
			return Redirect::to('locations')->with('success','Location Updated Successfully');
		} else {
			return Redirect::to('locations/'.$id.'/edit')->withErrors($validator)->withInput();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Location::find($id)->delete();

		return Redirect::to('locations')->with('success', 'Location Deleted Successfully');
	}


}
