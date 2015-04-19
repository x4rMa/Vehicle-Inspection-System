<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all();

		return View::make('clients.index')->with('clients', $clients)->with('title','Clients');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('clients.create')
		 		->with('client', new Client)
		 		->with('title','Create New Client')
		 		->with('url', 'clients')
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
				'company'	=> 'required|min:3',
				'firstname'	=> 'required|min:3',
				'lastname'	=> 'required|min:3',
				'email'		=> 'required|email|unique:clients',
				'phone'		=> 'required|min:6|phone|unique:clients',
				'address'	=> 'required|min:3'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			Client::create(Input::except('_token'));
			return Redirect::to('clients')->with('success','Client created successfully');
		} else {
			return Redirect::to('clients/create')->withErrors($validator)->withInput();
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
		return View::make('clients.show')->with('client', Client::findOrFail($id))->with('title','Client Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('clients.create')
			->with('client', Client::findOrFail($id))
			->with('title','Edit Client')
			->with('method', 'PUT')
			->with('url', 'clients/'.$id);
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
				'company'	=> 'required|min:3',
				'firstname'	=> 'required|min:3',
				'lastname'	=> 'required|min:3',
				'email'		=> 'required|email|unique:clients,email,'.$id,
				'phone'		=> 'required|min:6|phone|unique:clients,phone,'.$id,
				'address'	=> 'required|min:3'
			);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			Client::find($id)->update(Input::except('_token'));
			return Redirect::to('clients')->with('success','Client updated successfully');
		} else {
			return Redirect::to('client/edit/'.$id)->withErrors($validator)->withInput();
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
		Client::find($id)->delete();

		return Redirect::to('clients')->with('success', 'Client deleted successfully');
	}


}
