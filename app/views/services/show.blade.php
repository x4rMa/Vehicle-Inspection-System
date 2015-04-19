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
			<th>Service Name</th>
			<th class="hidden-xs">Description</th>
			<th class="hidden-xs">Charges</th>
			<th>Tax</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $service->id }}</td>
			<td class="hidden-xs">{{ $service->item }}</td>
			<td>{{ $service->description }}</td>
			<td>{{ $service->charges }}</td>
			<td>{{ $service->tax }}</td>
		</tr>
	
		
	</tbody>
</table>

@stop