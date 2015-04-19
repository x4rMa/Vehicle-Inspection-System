@extends('template')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		<h5 class="panel-title">Create Service</h5>
	</div>
	<div class="panel-body">
		<p class="text-small margin-bottom-20">
		
		@if($errors->has())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</p>

		{{ Form::open(array('url'=> 'service/store', 'role'=>'form')) }}

			<div class="form-group {{ ($errors->has('item')) ? "has-error" : "" }}">
				{{Form::label('item','Service Name:')}}
				{{Form::text('item', Input::old('item'), array("class"=>"form-control", 'placeholder'=>'Service Name') )}}
			</div>

			<div class="form-group {{ ($errors->has('charges')) ? "has-error" : "" }}">
				{{Form::label('charges','Charges:')}}
				{{Form::text('charges', Input::old('charges'), array("class"=>"form-control", 'placeholder'=>'Charges') )}}
			</div>

			<div class="form-group {{ ($errors->has('tax')) ? "has-error" : "" }}">
				{{Form::label('tax','Tax:')}}
				{{Form::text('tax', Input::old('tax'), array("class"=>"form-control", 'placeholder'=>'Tax') )}}
			</div>

			<div class="form-group {{ ($errors->has('description')) ? "has-error" : "" }}">
				{{Form::label('description','Description:')}}
				{{Form::textarea('description', Input::old('description'), array("class"=>"form-control",'placeholder'=>'Description') )}}
			</div>
			
				{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}
			
		{{ Form::close() }}
	</div>
</div>
@stop


