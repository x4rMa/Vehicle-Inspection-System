@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success') }}</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif
		</p>
		
<h3>Customer Details</h3>

<div class="row">
	<div class="col-sm-4">

		<div class="col-md-12">
			<div class="panel panel-white no-radius">
				<div class="panel-body padding-20 text-center">
					<div class="space10">
						<h5 class="text-dark">{{ $vehicle->user->fullname }}</h5>
						<h5 class="text-dark">{{ $vehicle->user->email }}</h5>
						<h5 class="text-dark">{{ $vehicle->user->phone }}</h5>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<h3>Vehicle Details</h3>

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
			<th>V.E.C</th>
			<th>Prefered Inspection Date</th>
			<th>Action</th>
			
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
			<td><a href="{{ URL::to('uploads/vec/'.$vehicle->vec) }}">{{ $vehicle->vec }}</a></td>
			<td>{{ substr($vehicle->inspection_date,0,10) }}</td>
			<td><a href="{{URL::to('vehiclesinspection/'.$vehicle->inspection->id.'/edit')}}"><span class="label label-info">Inspect</span></a></td>
		</tr>
		
	</tbody>
</table>

<!-- Vehicle Inspection Details -->

<h3>Vehicle Inspection Details</h3>
<table  class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>mileage</th>
			<th>pstatus</th>
			<th>Inspection Status</th>
			<th>Comment</th>
			<th>Re-Istatus</th>
			<th>Inspection Comment</th>
			<th>Amount Paid</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td>{{ $vehicle->inspection->id }}</td>
			<td class="center">{{ $vehicle->inspection->mileage }}</td>
			<td class="hidden-xs">{{ $vehicle->inspection->pstatus }}</td>
			<td>{{ $vehicle->inspection->istatus }}</td>
			<td>{{ $vehicle->inspection->comment }}</td>
			<td>{{ $vehicle->inspection->reistatus }}</td>
			<td>{{ $vehicle->inspection->inspe_comment }}</td>
			<td>{{ $vehicle->inspection->amount_paid }}</td>
	
		</tr>
		
	</tbody>
</table>

<table  class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			
			<th>Re inspection Amount</th>
			<th>Value</th>
			<th>Issue Date</th>
			<th>Inspection Date</th>
			<th>Week Report</th>
			<th>Month Report</th>
			<th>Odometre Unit</th>
			<th>Inspection Centre</th>
			
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td>{{ $vehicle->inspection->reinspe_amount }}</td>
			<td>{{ $vehicle->inspection->vvalue }}</td>
			<td>{{ $vehicle->inspection->issue_date }}</td>
			<td>{{ $vehicle->inspection->inspedate }}</td>
			<td>{{ $vehicle->inspection->weekreport }}</td>
			<td>{{ $vehicle->inspection->monthreport }}</td>
			<td>{{ $vehicle->inspection->odometreunit }}</td>
			<td>{{ $vehicle->inspection->inspecentre }}</td>
		</tr>
		
	</tbody>
</table>

<!--  -->

<h3><a href="{{ URL::to('vehicle/'.$vehicle->id.'/report') }}">View Vehicle Roadworthiness Inspection Report</a></h3>

@stop