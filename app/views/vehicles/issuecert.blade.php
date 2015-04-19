@extends('template')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		<h5 class="panel-title">Issue Vehicle Certificate</h5>
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

	<table  class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Chassis No</th>
			<th>Engine CC</th>
			<th>Make</th>
			<th>Model</th>
			<th>Y.O.R</th>
			<th>Location</th>
			<th>V.E.C</th>
			<th>Prefered Inspection Date</th>
			
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $vehicle->id }}</td>
			<td class="hidden-xs">{{ $vehicle->chasis }}</td>
			<td>{{ $vehicle->enginecc }}</td>
			<td>{{ $vehicle->make }}</td>
			<td>{{ $vehicle->model }}</td>
			<td>{{ $vehicle->yor }}</td>
			<td>{{ $vehicle->location->location_name }}</td>
			<td><a href="{{ URL::asset('uploads/vec/'.$vehicle->vec) }}">{{ $vehicle->vec }}</a></td>
			<td>{{ substr($vehicle->inspection_date,0,10) }}</td>

		</tr>
		
	</tbody>
</table>

		{{ Form::model($vehicle, array('url'=> $url, 'method'=> 'POST', 'role'=>'form', 'files'=> true)) }}
			@include('vehicles._issuecertform')
		{{ Form::close() }}
	</div>
</div>
@stop




