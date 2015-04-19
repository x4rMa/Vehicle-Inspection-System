@extends('template')


@section('content')


		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
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
			<th>Destination</th>
			<th>Y.O.R</th>
			<th>Location</th>
			<th>Charges (JPY)</th>
			@if(! Auth::user()->isClient() )
			<th>V.E.C</th>
			@endif
			<th>Preferred Inspection Date</th>
			<th>Certificate</th>
			@if(Auth::user()->level_id != 3)
			<th>Action</th>
			@endif
			
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $vehicle->id }}</td>
			<td class="hidden-xs">{{ $vehicle->chasis }}</td>
			<td>{{ $vehicle->enginecc }}</td>
			<td>{{ $vehicle->make }}</td>
			<td>{{ $vehicle->model }}</td>
			<td>{{ $vehicle->destination }}</td>
			<td>{{ $vehicle->yor }}</td>
			<td>{{ $vehicle->location->location_name }}</td>
			<td>{{ money($vehicle->location->location_charge) }}</td>
			@if(! Auth::user()->isClient() )
			<td><a href="{{ URL::asset('uploads/'.$vehicle->vec) }}">{{ $vehicle->vec }}</a></td>
			@endif
			<td>{{ substr($vehicle->inspection_date,0,10) }}</td>
			<td>@if (!is_null($vehicle->certificate)) <a href="{{ URL::to('vehicles/certificates/'.$vehicle->id.'/download') }}"> {{ $vehicle->certificate->certno }} </a> @else <span class="label label-inverse">Not Yet Issued</span> @endif</td>
			@if(! Auth::user()->isClient() )
			<td>@if(is_null($vehicle->certificate))<a href="{{URL::to('vehiclesinspection/'.$vehicle->inspection->id.'/edit')}}"><span class="label label-info">Inspect</span></a> @else <a href="{{ URL::to('vehicles/certificates/'.$vehicle->id.'/download/view') }}"> View Cert </a> @endif </td>
			@endif
		</tr>
		
	</tbody>
</table>

<!-- div class="row">
	<div class="col-sm-4">

		<div class="col-md-12">
			<div class="panel panel-white no-radius">
				<div class="panel-body padding-20 text-center">
					<div class="space10">

						<h5 class="text-dark no-margin">Certificate</h5>

						<span class="badge badge-success margin-top-10">{{ !is_null($vehicle->certificate) ? $vehicle->certificate->certno :"Not Yes Issued"  }}</span>
						
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
 -->

@stop