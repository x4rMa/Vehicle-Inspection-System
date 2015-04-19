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
			<th>Task Name</th>
			<th class="hidden-xs">Description</th>
			<th class="hidden-xs">Start At</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="center">{{ $task->id }}</td>
			<td class="hidden-xs">{{ $task->title }}</td>
			<td>{{ $task->description }}</td>
			<td>{{ $task->start_at }}</td>
			<td>
				<span class="label {{ Task::getSatusNameByID($task->status_id)->class_name }}">
					{{ Task::getSatusNameByID($task->status_id)->status_name }}
				</span>
			</td>
		</tr>
		
	</tbody>
</table>

@stop