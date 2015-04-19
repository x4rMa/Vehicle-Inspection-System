<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('projects.index')->with('projects', Project::all())->with('title','Projects');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('projects.create')
	 		->with('project', new Project)
	 		->with('title','Create New Project')
	 		->with('url', 'projects')
	 		->with('method', 'POST')
	 		->with('clients', Client::get(['firstname','lastname','id'])->lists('clientname','id'))
	 		->with('techs', User::where('level_id','=', 2)->get(['firstname','lastname','id'])->lists('username','id'))
	 		->with('priorities', Priority::lists('priority_name','id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$messages = array(
			'start_at.required' => 'The starting date is required',
			'end_at.required' => 'The ending date is required',
			'start_at.after' => 'The starting date is invalid.',
			'end_at.after' => 'Oh No! The ending date should be greater than the starting date.'
		);
		
		$this->user_id = Auth::id();

		$validator = Validator::make(Input::all(), (new Project)->rules(), $messages);

		if($validator->passes()){
			Project::create(Input::except('_token'));
			return Redirect::to('projects')->with('success','Project created successfully');
		} else {
			return Redirect::to('projects/create')->withErrors($validator)->withInput();
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
		return View::make('projects.show')
				->with('project', Project::findOrFail($id))
				->with('title','Project Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('projects.create')
			->with('project', Project::findOrFail($id))
			->with('title','Edit Project')
			->with('method', 'PUT')
			->with('url', 'projects/'.$id)
			->with('priorities', Priority::lists('priority_name','id'));
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
				'title'			=> 'required|min:3',
				'description'	=> 'required|min:3',
				'client_id' 	=> 'numeric',
				'user_id' 		=> 'numeric',
				'start_at'		=> 'required|date',
				'end_at'		=> 'required|date',
				'priority_id'	=> 'required'
		);

		$messages = array(
			'start_at.required' => 'The starting date is required',
			'end_at.required' => 'The ending date is required',
			'start_at.after' => 'The starting date is invalid.',
			'end_at.after' => 'Oh No! The ending date should be greater than the starting date.'
		);

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()){
			Project::find($id)->update(Input::except('_token'));
			return Redirect::to('projects')->with('success','Project updated successfully');
		} else {
			return Redirect::to('projects/'.$id.'/edit')->withErrors($validator)->withInput();
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
		Project::find($id)->delete();

		return Redirect::to('projects')->with('success', 'project deleted successfully');
	}


}
