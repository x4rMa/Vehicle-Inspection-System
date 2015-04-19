<div class="form-group {{ ($errors->has('username')) ? "has-error" : "" }}">
	{{Form::label('username','User Name:')}}
	{{Form::text('username', Input::old('username'), array("class"=>"form-control", 'placeholder'=>'e.g john') )}}
</div>

@if (Auth::check())
@if(Auth::user()->isAdmin())
<div class="form-group {{ ($errors->has('level_id')) ? "has-error" : "" }}">
	{{Form::label('level_id','User Level:')}}
	{{ Form::select('level_id', ['0' => 'Select User Level'] + $levels, $user->level_id, array('class' => 'form-control')) }}
</div>
@endif
@endif

<div class="form-group {{ ($errors->has('company')) ? "has-error" : "" }}">
	{{Form::label('company','Company Name:')}}
	{{Form::text('company', Input::old('company'), array("class"=>"form-control", 'placeholder'=>'') )}}
</div>

<div class="form-group {{ ($errors->has('firstname')) ? "has-error" : "" }}">
	{{Form::label('firstname','First Name:')}}
	{{Form::text('firstname', Input::old('firstname'), array("class"=>"form-control", 'placeholder'=>'e.g John') )}}
</div>

<div class="form-group {{ ($errors->has('lastname')) ? "has-error" : "" }}">
	{{Form::label('lastname','Last Name:')}}
	{{Form::text('lastname', Input::old('lastname'), array("class"=>"form-control", 'placeholder'=>'Lastname') )}}
</div>

<div class="form-group {{ ($errors->has('email')) ? "has-error" : "" }}">
	{{Form::label('email','Email:')}}
	{{Form::text('email', Input::old('email'), array("class"=>"form-control", 'placeholder'=>'Email') )}}
</div>

@if($method == "POST")

<div class="form-group {{ ($errors->has('password')) ? "has-error" : "" }}">
	{{Form::label('password','Password:')}}
	{{Form::input('password','password', Input::old('password'), array("class"=>"form-control", 'placeholder'=>'Password') )}}
</div>

<div class="form-group {{ ($errors->has('cpassword')) ? "has-error" : "" }}">
	{{Form::label('cpassword','Confirm Password:')}}
	{{Form::input('password','cpassword', Input::old('cpassword'), array("class"=>"form-control", 'placeholder'=>'Confirm Password') )}}
</div>

@endif

<div class="form-group {{ ($errors->has('phone')) ? "has-error" : "" }}">
	{{Form::label('phone','Phone Number:')}}
	{{Form::text('phone', Input::old('phone'), array("class"=>"form-control",'placeholder'=>'Phone Number') )}}
</div>


<div class="form-group {{ ($errors->has('city')) ? "has-error" : "" }}">
	{{Form::label('city','City:')}}
	{{Form::text('city', Input::old('city'), array("class"=>"form-control",'placeholder'=>'') )}}
</div>


<div class="form-group {{ ($errors->has('street')) ? "has-error" : "" }}">
	{{Form::label('street','Street:')}}
	{{Form::text('street', Input::old('street'), array("class"=>"form-control",'placeholder'=>'') )}}
</div>


<div class="form-group {{ ($errors->has('prefecture')) ? "has-error" : "" }}">
	{{Form::label('prefecture','Prefecture:')}}
	{{Form::text('prefecture', Input::old('prefecture'), array("class"=>"form-control",'placeholder'=>'') )}}
</div>


<div class="form-group {{ ($errors->has('postal')) ? "has-error" : "" }}">
	{{Form::label('postal','Postal Code:')}}
	{{Form::text('postal', Input::old('postal'), array("class"=>"form-control",'placeholder'=>'') )}}
</div>

	{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}
