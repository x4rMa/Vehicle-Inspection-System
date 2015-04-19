
<div class="form-group {{ ($errors->has('title')) ? "has-error" : "" }}">
	{{Form::label('titletitle','Title:')}}
	{{Form::text('title', Input::old('title'), array("class"=>"form-control", 'placeholder'=>'Title') )}}
</div>


<div class="form-group {{ ($errors->has('description')) ? "has-error" : "" }}">
	{{Form::label('description','Description:')}}
	{{Form::textarea('description', Input::old('description'), array("class"=>"form-control", 'placeholder'=>'Write a brief description') )}}
</div>

@if($method == "PUT")
	<p>Current PDF Report: <a href="{{ URL::asset('PDF Reports/'.$pdfreport->file) }}">{{ $pdfreport->file }}</a> <small>(If you want to change this, please upload another one, otherwise leave it as it is.)</small>
@endif

<div class="form-group {{ ($errors->has('file')) ? "has-error" : "" }}">
	{{Form::label('file','PDF Report: (Allowed format: PDF only. Max Size: 5 MB)')}}
	{{Form::file('file', null,array("class"=>"form-control") )}}
</div>


	{{Form::submit($buttonText, array('class'=>'btn btn-primary'))}}