@extends('template')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Location</h5>
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
		{{ Form::model($location, array('url'=> $url, 'method'=> $method, 'role'=>'form')) }}
		
		<?php $buttonText = ($method == 'POST') ? "Add Location" : "Update Location"; ?>

			@include('locations._form', [$buttonText])
			
		{{ Form::close() }}
	</div>
</div>
@stop


