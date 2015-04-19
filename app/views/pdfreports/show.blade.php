@extends('template')


@section('content')

<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Title</th>
			<th class="hidden-xs">Report</th>
			<th class="hidden-xs">Description</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td class="center">{{ $pdfreport->id }}</td>
			<td class="hidden-xs">{{ $pdfreport->title }}</td>
			<td>{{ $pdfreport->file }}</td>
			<td>{{ $pdfreport->description }}</td>
		</tr>	
	</tbody>
</table>

@stop