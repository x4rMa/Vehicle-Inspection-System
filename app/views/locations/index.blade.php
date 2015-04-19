@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
	

<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Location Name</th>
			<th class="hidden-xs">location Charge</th>
			@if(Auth::user()->isAdmin())
			<th></th>
			<th></th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($locations as $location)
		<tr>
			<td class="center">{{ $location->id }}</td>
			<td class="hidden-xs">{{ $location->location_name }}</td>
			<td>{{ $location->location_charge }}</td>

			@if(Auth::user()->isAdmin())
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('locations/'.$location->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin:0;','method'=>'delete','action'=> array('LocationController@destroy', $location->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{ Form::close() }}
			</td>
			@endif
			
		</tr>
		@endforeach
		
	</tbody>
</table>

<span class="pull-right">{{ $locations->links() }}</span>

@stop
