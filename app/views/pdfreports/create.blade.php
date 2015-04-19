@extends('template')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		<h5 class="panel-title">Add New Report</h5>
	</div>
	<div class="panel-body">
		<p class="text-small margin-bottom-2">
		
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
		{{ Form::model($pdfreport, array('url'=> $url, 'method'=> $method, 'role'=>'form', 'files' => true)) }}
		
		<?php $buttonText = ($method == 'POST') ? "Add Report" : "Update Report"; ?>

			@include('pdfreports._form', [$buttonText])
			
		{{ Form::close() }}
	</div>
</div>
@stop


