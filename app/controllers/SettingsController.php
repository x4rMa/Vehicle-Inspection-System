<?php

class SettingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('settings.index')->with('settings', Settings::all())->with('title','Settings');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('settings.create')
		 		->with('settings', new Settings)
		 		->with('title','Create New Settings')
		 		->with('url', 'settings')
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
				'company'		=> 'required|min:3|unique:settings',
				'slogan'		=> 'required|min:3',
				'address'		=> 'required|min:3',
				'logo'			=> '',
				'email'			=> 'required|email|unique:settings'
			);

		$image = Input::file('logo');

		$filename = "logo";

		$extension = $image->getClientOriginalExtension();
	
		$image->move('uploads', $filename . '.' . $extension);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){

			$s = new Settings();

			$s->company = Input::get('company');
			$s->slogan = Input::get('slogan');
			$s->address = Input::get('address');
			$s->email = Input::get('email');
			$s->logo = $filename . '.' . $extension;

			$s->save();

			return Redirect::to('settings')->with('success','Settings created successfully');
		} else {
			return Redirect::to('settings/create')->withErrors($validator)->withInput();
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
		return View::make('settings.show')->with('settings', Settings::findOrFail($id))->with('title','Settings Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('settings.create')
		 		->with('settings', Settings::findOrFail($id))
		 		->with('title','Edit Settings')
		 		->with('url', 'settings/'.$id)
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
				'company'		=> 'required|min:3|unique:settings,company,'.$id,
				'slogan'		=> 'required|min:3',
				'address'		=> 'required|min:3',
				'logo'			=> '',
				'email'			=> 'required|min:3|unique:settings,email,'.$id
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			Settings::find($id)->update(Input::except('_token'));
			return Redirect::to('settings')->with('success','Settings updated successfully');
		} else {
			return Redirect::to('settings/'.$id.'/edit')->withErrors($validator)->withInput();
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
		Settings::find($id)->delete();

		return Redirect::to('settings')->with('success', 'Record deleted successfully');
	}


}
