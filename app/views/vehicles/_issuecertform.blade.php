
<div class="form-group {{ ($errors->has('chasis')) ? "has-error" : "" }}">
	{{Form::label('certno','Certificate No:')}}
	{{Form::text('certno', Input::old('certno'), array("class"=>"form-control", 'placeholder'=>'Certificate No.') )}}
</div>
									

{{Form::submit('Issue Certificate', array('class'=>'btn btn-primary'))}}