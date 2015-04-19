<div class="form-group {{ ($errors->has('location_name')) ? "has-error" : "" }}">
	{{Form::label('location_name','Name of Location:')}}
	{{Form::text('location_name', Input::old('location_name'), array("class"=>"form-control", 'placeholder'=>'Name of Location') )}}
</div>

<div class="form-group {{ ($errors->has('location_charge')) ? "has-error" : "" }}">
	{{Form::label('location_charge','Inspection Charges:')}}
	{{Form::text('location_charge', Input::old('location_charge'), array("class"=>"form-control", 'placeholder'=>'Charges for this location') )}}
</div>


	{{Form::submit($buttonText, array('class'=>'btn btn-primary'))}}