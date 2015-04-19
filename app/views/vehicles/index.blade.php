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
			<th>Destination</th>
			<th>Owner</th>
			<th>Chassis No</th>
			<th>Inspection Date</th>
			<th>Date of Booking</th>
			<th>Status</th>
			<th>Certificate</th>
			@if(!Auth::user()->isInspector() && (!Auth::user()->isGeneralUser() ))
				<th></th>
				<th></th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($vehicles as $vehicle)
		<tr>
			<td class="center">{{ $vehicle->id }}</td>
			<td>{{ $vehicle->destination }}</td>
			<td class="hidden-xs">{{ $vehicle->user->fullname }}</td>
			<td><a href="{{ URL::to('vehicles/'.$vehicle->id) }}">{{ $vehicle->chasis }}</a></td>
			<td>{{ substr($vehicle->inspection_date,0,10) }}</td>
			<td>{{ substr($vehicle->created_at,0,10) }}</td>
			<td>
				@if($vehicle->paid)
					<span class="label label-success">PAID</span> 
				@else
					<span class="label label-danger">UNPAID</span>
				@endif

				@if (is_null($vehicle->certificate))
					@if(Auth::user()->isAdmin()) 
						<a href="{{ URL::to('paid/'.$vehicle->id) }}"> <small>update</small></a>
					@endif
				@endif
			</td>

			<td>@if (!is_null($vehicle->certificate)) <a href="{{ URL::to('vehicles/certificates/'.$vehicle->id.'/download') }}"> {{ $vehicle->certificate->certno }} </a> @else <span class="label label-inverse">Not Yet Issued </span> @endif</td>
			@if(!Auth::user()->isInspector() && (!Auth::user()->isGeneralUser() ))
			<td class="center">  
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('vehicles/'.$vehicle->id.'/edit') }}" class=" {{ (!is_null($vehicle->certificate)) ? 'disabled' : '' }} btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('VehicleController@destroy',$vehicle->id))) }}
				 	<button  class =" {{ (!is_null($vehicle->certificate)) ? 'disabled' : '' }} btn btn-danger btn-xs" type="submit"  >Delete</button>                      
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