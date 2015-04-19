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
			<th>Certificate No</th>
			<th>Owner</th>
			<th>Make</th>
			<th>Model</th>
			<th>Issued Date</th>
			<th>Status</th>
			<th></th>
			@if( Auth::user()->isAdmin() ))
				
				<th></th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($certificates as $cert)
		<tr>
			<td class="center">{{ $cert->id }}</td>
			<td class="hidden-xs">{{ $cert->certno }}</a></td>
			<td><a href="{{ URL::to('users/'.$cert->vehicle->user_id) }}">{{ $cert->vehicle->user->fullname }}</a></td>
			<td><a href="{{ URL::to('vehicles/'.$cert->vehicle_id) }}">{{ $cert->vehicle->make }}</a></td>
			<td>{{ $cert->vehicle->model }}</td>
			<td>{{ $cert->created_at }}</td>
			<td>@if($cert->status == 1) <span class="label label-success">APPROVED</span> @else <span class="label label-inverse">NOT YET APPROVED</span> @endif</td>
			<td>@if($cert->status == 0)<a href="{{ URL::to('vehicles/certificates/'.$cert->vehicle_id.'/approve') }}">Approve Now</a>@endif</td>
			@if(Auth::user()->isAdmin())
			
			<td>
				{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('VehicleController@destroycert', $cert->id))) }}
					 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{Form::close()}}    
			</td>
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
