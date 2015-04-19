<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('tasks.index')->with('tasks', Task::all())->with('title','Tasks');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	 	return View::make('tasks.create')
	 		->with('task', new Task)
	 		->with('title','Create New Task')
	 		->with('url', 'tasks')
	 		->with('method', 'POST')
	 		->with('priorities', Priority::lists('priority_name','id'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
				'title'			=> 'required|min:3',
				'description'	=> 'required|min:3',
				'start_at'		=> 'required|date|date_format:Y-m-d|after:yesterday',
				'priority_id'	=> 'required|numeric'
		);

		$messages = [
			'start_at.after' => 'The starting date is invalid.'
		];

		$this->status_id = 1; //The status is Active
		

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()){
			$task = Task::create(Input::except('_token'));
			Event::fire('task', [$task->id, 'created']);
			return Redirect::to('tasks')->with('success','Task created successfully');
		} else {
			return Redirect::to('tasks/create')->withErrors($validator)->withInput();
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
		return View::make('tasks.show')
				->with('task', Task::findOrFail($id))
				->with('title','Task Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return View::make('tasks.create')
			->with('task', Task::findOrFail($id))
			->with('title','Edit Task')
			->with('method', 'PUT')
			->with('url', 'tasks/'.$id)
			->with('priorities', Priority::lists('priority_name','id'))
			->with('statuses', Status::lists('status_name','id'));
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
				'start_at'		=> 'required|date|date_format:Y-m-d|after:yesterday',
				'status_id'		=> 'required|numeric',
				'priority_id'  	=> 'required|numeric'
			);

		$messages = [
			'start_at.after' => 'The starting date is invalid.'
		];

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()){
			Task::find($id)->update(Input::except('_token'));
			return Redirect::to('tasks')->with('success','Task updated successfully');
		} else {
			return Redirect::to('tasks/'.$id.'/edit')->withErrors($validator)->withInput();
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
		$task = Task::find($id)->delete();

		Event::fire('task', [$id, 'created']);

		return Redirect::to('tasks')->with('success', 'Task deleted successfully');
	}

}
