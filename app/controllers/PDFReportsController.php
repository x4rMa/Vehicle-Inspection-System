<?php

class PDFReportsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return View::make('pdfreports.index')
				->with('title','PDF Reports')
				->with('pdfreports', PDFReports::orderBy('id','desc')->get());
				
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}

	 	return View::make('pdfreports.create')
		 		->with('pdfreport', new PDFReports)
		 		->with('title','Create New PDF Report')
		 		->with('url', 'pdfreports')
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
				'title'			=> 'required|min:2|unique:pdfreports',
				'description'	=> 'required|min:5',
				'file'			=> 'required|mimes:pdf|max:50000'
		);

		$messages = [
			'file.required' => 'Please upload your PDF Report.'
		];


		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()){

			$s = new PDFReports();

			$file = Input::file('file');

			$extension = $file->getClientOriginalExtension();
			$fileName = $file->getClientOriginalName();

			$s->title = Input::get('title');
			$s->description = Input::get('description');
			$s->file = $fileName;

			$s->save();

			$file->move('PDF Reports', $fileName); //Upload the file to public/PDF Reports

			return Redirect::to('pdfreports')->with('success','PDFReport Created Successfully');
		} else {
			return Redirect::to('pdfreports/create')->withErrors($validator)->withInput();
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
		return View::make('pdfreports.show')->with('pdfreport', PDFReports::findOrFail($id))->with('title','PDF Report Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}
		
		return View::make('pdfreports.create')
		 		->with('pdfreport', PDFReports::findOrFail($id))
		 		->with('title','Edit PDF Reports')
		 		->with('url', 'pdfreports/'.$id)
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
				'title'			=> 'required|min:2|unique:pdfreports,title,'.$id,
				'description'	=> 'required|min:5',
				'file'			=> 'mimes:pdf|max:50000'
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){
			$s = PDFReports::findOrFail($id);

			$s->title = Input::get('title');
			$s->description = Input::get('description');
			

			$s->save();

			return Redirect::to('pdfreports')->with('success','PDF Report Updated Successfully');
		} else {
			return Redirect::to('pdfreports/'.$id.'/edit')->withErrors($validator)->withInput();
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
		if( ! Auth::user()->isAdmin() ) {
			return Redirect::to('nopermission');
		}
		
		PDFReports::find($id)->delete();

		return Redirect::to('pdfreports')->with('success', 'PDF Report Deleted Successfully');
	}


}
