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
			<th>Company Name</th>
			<th class="hidden-xs">Contact Person</th>
			<th class="hidden-xs">Email</th>
			<th>Mobile Number</th>
			<th class="hidden-xs">Address</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $client->id }}</td>
			<td class="hidden-xs">{{ $client->company }}</td>
			<td>{{ $client->firstname." ".$client->lastname }}</td>
			<td>{{ $client->email }}</td>
			<td>{{ $client->phone }}</td>
			
			<td class="hidden-xs">{{ $client->address }}</td>
		</tr>
	
		
	</tbody>
</table>

@stop