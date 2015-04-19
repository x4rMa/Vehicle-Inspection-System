<?php

use Illuminate\Support\MessageBag;

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($level = null)
	{
		$users = User::where('level_id','!=', 3)->orderBy('id','desc')->get();

		$title = 'Users';

		if($level == 'admins'){
			$users = User::where('level_id','=', 1)->orderBy('id','desc')->get();
			$title = 'Administrators';
		}

		if($level == 'inspectors'){
			$users = User::where('level_id','=', 2)->orderBy('id','desc')->get();
			$title = 'Inspectors';
		}
		
		if($level == 'ra'){
			$users = User::where('level_id','=', 4)->orderBy('id','desc')->get();
			$title = 'Revenue Authority Users';
		}

		if($level == 'clients'){
			$users = User::where('level_id','=', 3)->orderBy('id','desc')->get();
			$title = 'Clients';
		}

		if($level == 'general'){
			$users = User::where('level_id','=', 5)->orderBy('id','desc')->get();
			$title = 'General Users';
		}

		return View::make('users.index')->with('users', $users)->with('title', $title);
	}

	private function isAllowed()
	{
		return ( Auth::user()->isAdmin() ) ? true : false;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		if( ! $this->isAllowed() ) {
			return Redirect::to('nopermission');
		}

		$levels = [
			1  	=> 'Administrator',
			2 	=> 'Inspector',
			4 	=> 'Revenue Authority User',
			5	=> 'General User'
		
		];
		
	 	return View::make('users.create')
	 		->with('user', new User)
	 		->with('title','Create New Account')
	 		->with('url', 'users')
	 		->with('method', 'POST')
	 		->with('levels', $levels);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
				'username'	=> 'required|min:3|unique:users',
				'firstname'	=> 'required|min:3',
				'lastname'	=> 'required|min:3',
				'email'		=> 'required|email|unique:users',
				'password'	=> 'required|min:3',
				'cpassword' => 'required|same:password',
				'phone'		=> 'required|unique:users',
				'company'	=> 'min:3',
				'city'		=> 'required|min:3',
				'street'	=> 'min:2',
				'postal'	=> '',
				'prefecture'=> ''
		);

		$messages = [
			'cpassword.required' => 'Please confirm your password',
			'cpassword.same' => 'Your passswords are not matching',
			'email.unique' => 'The email is already in existence.',
			'phone.unique' => 'The phone is already in existence.'
		];
		

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->passes()){

			$user = new User();

			$user->username = Input::get('username');
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->phone = Input::get('phone');
			$user->company = Input::get('company');
			$user->city = Input::get('city');
			$user->street = Input::get('street');
			$user->postal = Input::get('postal');
			$user->prefecture = Input::get('prefecture');

			$user->level_id = (Auth::check()) ? Input::get('level_id')  : '3' ; 
		
			$user->status = 1; // Set account to active by default

			$user->code = md5(uniqid()); //code for activating account

			$user->save();
			
			$data = (!Auth::check()) ? [ 'to' => 'login' ] : [ 'to' => 'users' ];

		
			return Redirect::to($data['to'])->with('success', 'Account Created Successfully');
			
		} else {
			if(Auth::check())
				return Redirect::to('users/create')->withErrors($validator)->withInput();
			else
				return Redirect::to('register')->withErrors($validator)->withInput();
				
			
		}
	}
	public function activate($email, $code)
	{
		if( ! $this->isAllowed() ) {
			return Redirect::to('nopermission');
		}

		$user = User::where('email','=', $email)->firstOrFail();

		if ($user->status == 1) {
			return Redirect::to('login')->with('error', 'Sorry, your account has already been activated.');
		} else {

			if($user->code == $code){

				$user->code = "";
				$user->status = 1;
				$user->save();

				Event::fire('user.activated', [$user]);
				return Redirect::to('login')->with('success', 'You have activated your account. You can now log in');
			} else {
				return Redirect::to('login')->with('error', 'The activation code is invalid');
			}
		}


	}

	public function newpassword($email, $code)
	{
		$user = User::where('email','=', $email)->firstOrFail();

		if ($user->status == 0) {

			Event::fire('user.resendactivation', [$user]);

			return Redirect::to('login')->with('error', 'Sorry, your account has not been activated. Check your email');
		} else {

			if($user->code == $code){

				$user->code = "";
				//$user->status = 1;
				$user->save();

				//Event::fire('user.activated', [$user]);

				return Redirect::route('users.newpassword')
					->with('email', $email)
					->with('success', 'Your email has been verified. Please enter the new password');
			} else {
				return Redirect::to('login')->with('error', 'The activation code is invalid');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 
	private function hasPermission($id){
		if(! Auth::user()->isAdmin() ) {
				return Redirect::to('/')->with('error','You cannot view someone else profile');
				
		}
		return false;
	}
	public function show(User $user)
	{

		return View::make('users.show')
				->with('user', $user)
				->with('title','user Profile');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(User $user)
	{

		if($user->id == 1){
			return View::make('errors.noedit')->with('title', 'Error Message');
			die;
		}

		$levels = [
			1  	=> 'Administrator',
			2 	=> 'Inspector',
			4 	=> 'Revenue Authority User',
			5	=> 'General User'
		];
		
		return View::make('users.create')
			->with('user', $user)
			->with('title','Edit user')
			->with('method', 'PUT')
			->with('url', 'users/'.$user->id)
			->with('levels', $levels);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(User $user)
	{

		$rules = array(
				'username'	=> 'required|min:3|unique:users,username,'.$user->id,
				'firstname'	=> 'required|min:3',
				'lastname'	=> 'required|min:3',
				'email'		=> 'required|email|unique:users,email,'.$user->id,
				'phone'		=> 'required|unique:users,phone,'.$user->id,
				'level_id'	=> 'numeric',
				'company'	=> 'min:3',
				'city'		=> 'required|min:3',
				'street'	=> 'min:2',
				'postal'	=> '',
				'prefecture'=> ''
		);
		
		$messages = [
			'email.unique' => 'The email is already in existence.',
			'phone.unique' => 'The phone is already in existence.'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->passes()){

			//$user = User::findOrFail($id);
			
			// $user->username = Input::get('username');
			// $user->firstname = Input::get('firstname');
			// $user->lastname = Input::get('lastname');
			// $user->email = Input::get('email');
			// $user->phone = Input::get('phone');
			// $user->level_id = Input::get('level_id');
			// $user->company = Input::get('company');
			// $user->city = Input::get('city');
			// $user->street = Input::get('street');
			// $user->postal = Input::get('postal');
			// $user->prefecture = Input::get('prefecture');
			
			$user->update(Input::except('_token','_method'));

			return Redirect::to('users/'.$user->id)->with('success','Account Updated Successfully');
		} else {
			return Redirect::to('users/'.$user->id.'/edit')->withErrors($validator)->withInput();
		}
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{

		if( ! Auth::user()->isAdmin() ) { 
			return View::make('errors.noedit')->with('title', 'Error Message');
		}

		$vehicles = Vehicle::where('user_id', '=', $user->id)->count();

		if($vehicles > 0){

			$vehicles->inspection()->delete();
			$vehicles->inspectordetails()->delete();
			$vehicles->certificate()->delete();
			$vehicles->delete();

		} 

		$user->delete();
		

		return Redirect::to('users')->with('success', 'User deleted successfully');
	}

	public function lock()
	{
		Auth::logout();

		return View::make('lock');
	}

	public function logout()
	{
		Auth::logout();

		return View::make('users.login');
	}

	public function login()
	{
		return View::make('users.login');
	}

	public function resetpass()
	{
		return View::make('users.resetpass');
	}

	public function resetpasspost()
	{
		$rules = array(
			'email' => 'required | email | exists:users,email', //check if email exists
			'password' => 'required|min:6',
			'cpassword' => 'required|same:password',
		);

		$messages = array(
			'email.required' => 'Please enter your email.',
			'email.exists' => 'The email you have entered does not exist',
			'cpassword.same' => 'Your passwords are not matching',
		);

		//dd(Input::all());

		$validator = Validator::make(Input::all(), $rules, $messages);
	
		if($validator->passes()){

			$code = md5(uniqid());

				$check = resetPass::where('email', '=', Input::get('email'))->count();

				if($check == 0){
			
				$reset = new resetPass();

				$reset->code = $code;

				$reset->email = Input::get('email');

				$reset->password = Input::get('password');

				$reset->save();
			} else {
				$obj = resetPass::where('email', '=', Input::get('email'))->firstOrFail();

				$obj->update( ['code'=>$code, 'password'=>Input::get('password')] );

			}


				$user = User::where('email', '=', Input::get('email'))->firstOrFail();

				//dd($user->firstname);

				Event::fire('user.resetpass', [ $user, $code ]);

				return Redirect::to('login')->with('success','A passsword reset link has been sent to your Email.');
			
		} else {
			return Redirect::to('resetpass')->withErrors($validator);
		}
	
	}

	public function verify($email, $code)
	{
		$reset = resetPass::where('code', $code)->first();

		if($reset){

			$user = User::where('email', $email)->first();

			$user->password = Hash::make($reset->password);

			$user->save();

			$reset->delete();

			Event::fire('user.resetpasssuccess', [ $user ]);

			return Redirect::to('login')->with('success','Your password has been changed successfully.');
		} else {
			return Redirect::to('login')->with('error','Your password reset code is invalid.');

		}
	}


	public function register()
	{
		return View::make('users.register')->with('user', new User)->with('method','POST');
	}

	public function loginpost()
	{
		$rules = array(
			'email' => 'required|min:3|email',
			'password' => 'required|min:3'
		);

		$messages = array(
			'email.required' => 'Please enter your email.',
			'password.required' => 'Please enter your password.',
		);

		$validator = Validator::make(Input::all(), $rules, $messages);
	
		// New MessageBag
		$errorMessages = new Illuminate\Support\MessageBag;

		// Check if there is actually any errors
		if ($validator->fails()) {
		    $errorMessages->merge($validator->errors()->toArray());
		    return Redirect::to('login')->withErrors($errorMessages);
		} else {

			$login = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			));

			if($login){
				return Redirect::to('/');
			} else {

				$errorMessages->add('incorrect', 'Incorrect Email or Password');
				return Redirect::to('login')->withErrors($errorMessages)->withInput();
			}
		}
	
	}
	
	
	public function unlock()
	{
		$rules = [ 'password' => 'required|min:3' ];

		$messages = ['password.required' => 'Please enter your password.' ];

		$validator = Validator::make(Input::all(), $rules, $messages);
		// New MessageBag
		$errorMessages = new Illuminate\Support\MessageBag;

		// Check if there is actually any errors
		if ($validator->fails()) {
		    $errorMessages->merge($validator->errors()->toArray());
		    return Redirect::to('lock')->withErrors($errorMessages);
		} else {
			$login = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			));

			if($login){
				return Redirect::to('/');
			} else {

				$errorMessages->add('incorrect', 'Incorrect Password');
				return Redirect::to('lock')->withErrors($errorMessages);
			}
		}
	
	}

	public function profile()
	{
		return View::make('users.profile')
				->with('my', User::find(Auth::id()))
				->with('title', 'My Profile');
	}
	

}