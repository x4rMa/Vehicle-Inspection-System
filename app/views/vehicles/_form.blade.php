<div class="form-group {{ ($errors->has('destination')) ? "has-error" : "" }}">
	{{Form::label('destination','Destination:')}}
	{{Form::text('destination', Input::old('destination'), array("class"=>"form-control", 'placeholder'=>'Destination Name.') )}}
</div>

<div class="form-group {{ ($errors->has('chasis')) ? "has-error" : "" }}">
	{{Form::label('chasis','Chassis No:')}}
	{{Form::text('chasis', Input::old('chasis'), array("class"=>"form-control", 'placeholder'=>'Chassis No.') )}}
</div>

<div class="form-group {{ ($errors->has('enginecc')) ? "has-error" : "" }}">
	{{Form::label('enginecc','Engine Capacity:')}}
	{{Form::text('enginecc', Input::old('enginecc'), array("class"=>"form-control",'placeholder'=>'Engine Capacity') )}}
</div>

<div class="form-group {{ ($errors->has('make')) ? "has-error" : "" }}">
	{{Form::label('make','Make:')}}
	{{Form::text('make', Input::old('make'), array("class"=>"form-control",'placeholder'=>'Make') )}}
</div>

<div class="form-group {{ ($errors->has('model')) ? "has-error" : "" }}">
	{{Form::label('model','Model:')}}
	{{Form::text('model', Input::old('model'), array("class"=>"form-control",'placeholder'=>'Model') )}}
</div>

<div class="form-group {{ ($errors->has('location_id')) ? "has-error" : "" }}">
	{{Form::label('location_id','Location:')}}
	{{Form::select('location_id', ['0'=>'Please select location'] + Location::lists('location_name', 'id'), Input::old('location_id'), array("class"=>"form-control",'placeholder'=>'Location') )}}
</div>

<div class="form-group {{ ($errors->has('yor')) ? "has-error" : "" }}">
	{{Form::label('yor','Year of Registration:')}}
	{{ Form::select('yor', ['0' => 'Select Year'] + $yor, $vehicle->yor, array('class' => 'form-control')) }}
</div>
													
<div class="form-group {{ ($errors->has('inspection_date')) ? "has-error" : "" }}">
	{{Form::label('inspection_date','Inspection Date:')}}
	{{Form::text('inspection_date', Input::old('inspection_date'), array("size"=>"10","class"=>"form-control datepicker", 'placeholder'=>'Inspection Date') )}}
</div>

<!-- upload vec -->

@if($method == "POST")												
<div class="form-group {{ ($errors->has('vec')) ? "has-error" : "" }}">
	{{Form::label('vec','Vehicle Export Certificate: (Allowed formats: PNG. JPEG, JPG, PDF. Max Size: 1 MB)')}}
	{{Form::file('vec', Input::old('vec'), array("class"=>"form-control") )}}
</div>
@endif
									

{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}