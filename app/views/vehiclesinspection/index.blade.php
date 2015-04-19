 @extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success') }}</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif
		</p>

<table data-order='[[ 0, "desc" ]]' data-page-length='25' class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Model</th>
			<th>Make</th>
			<th>Client Name</th>
			<th>Prefered Inspection Date</th>
			@if(!$status)
			<th>Initial Inspection</th>
			<th>Full Inspection Report</th>
			@else
			@if(Auth::user()->isAdmin())
			<th>Certificate</th>
			@endif
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($vehicleinspection as $vehicle)
		<tr>
			<td class="center">{{ $vehicle->id }}</td>
			<td><a href="{{ URL::to('vehiclesinspection/'.$vehicle->id) }}">{{ $vehicle->make }}</a></td>
			<td>{{ $vehicle->model }}</td>
			<td class="hidden-xs">{{ $vehicle->firstname.' '.$vehicle->lastname }}</td>
			<td>{{ substr($vehicle->inspection_date,0,10) }}</td>
			@if(!Auth::user()->isGeneralUser())
				@if(!$status)
				<td class="center">
					<div class="visible-md visible-lg hidden-sm hidden-xs pull-left">
						<a href="{{ URL::to('vehiclesinspection/'.$vehicle->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Update</a>
					</div>
				</td>
				<td class="center">
					<div class="visible-md visible-lg hidden-sm hidden-xs pull-left">
						<a href="{{ URL::to('vehicle/'.$vehicle->id.'/report') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Update</a>
					</div>
				</td>
				@else
					@if(Auth::user()->isAdmin())
					<td>
						@if( Certificate::where('vehicle_id', $vehicle->id)->count() == 0 )
						<div class="visible-md visible-lg hidden-sm hidden-xs">
								<a href="{{ URL::to('vehicle/'.$vehicle->id.'/issuecert') }}" class="btn btn-info btn-xs" tooltip-placement="top" tooltip="Edit">Issue Cert</a>
						</div>
						@else
						<div class="visible-md visible-lg hidden-sm hidden-xs">
								<a href="{{ URL::to('vehicles/certificates/'.$vehicle->id.'/download') }}"> {{ Certificate::where('vehicle_id', $vehicle->id)->first()->certno }} </a> 
						</div>
						@endif
					</td>
					@endif
				@endif
			@endif
		</tr>
		@endforeach
	</tbody>
</table>
			

@stop

@section('dataTablesjs')
<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.js"></script>
@stop