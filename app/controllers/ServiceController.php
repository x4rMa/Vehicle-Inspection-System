<?php

class ServiceController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('services.index')->with('services', Service::all())->with('title','Services');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('services.create')->with('title','Create New Service');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
				'item'			=> 'required|min:3|unique:services',
				'description'	=> 'required|min:3',
				'charges'		=> 'required|numeric',
				'tax'			=> 'required|numeric'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			Service::create(Input::except('_token'));
			return Redirect::to('services')->with('success','Service created successfully');
		} else {
			return Redirect::to('service/create')->withErrors($validator)->withInput();
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
		return View::make('services.show')->with('service', Service::findOrFail($id))->with('title','Service Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('services.update')->with('service', Service::findOrFail($id))->with('title','Edit Service');
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
				'item'			=> 'required|min:3|unique:services,item,'.$id,
				'description'	=> 'required|min:3',
				'charges'		=> 'required|numeric',
				'tax'			=> 'required|numeric'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			Service::find($id)->update(Input::except('_token'));
			return Redirect::to('services')->with('success','Service updated successfully');
		} else {
			return Redirect::to('service/edit/'.$id)->withErrors($validator)->withInput();
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
		Service::find($id)->delete();

		return Redirect::to('services')->with('success', 'Service deleted successfully');
	}


}
