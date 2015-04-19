<?php

class DashboardController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();


		$vehicles = (Auth::user()->isClient()) ? Vehicle::where('user_id','=', Auth::id())->get() : Vehicle::all();

		return View::make('dashboard')
			->with('title','Dashboard')
			->with('vehicles', $vehicles);
	}


}
