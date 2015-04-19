@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
			@endif
		</p>
	

<table class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Task Title</th>
			<th class="hidden-xs">Start At</th>
			<th>Priority</th>
			<th>Status</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
				@foreach($tasks as $task)
		<tr>
			<td class="center">{{ $task->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('tasks/'.$task->id) }}">{{ str_limit($task->title, $limit = 30, $end = '...') }}</a></td>
			<td>{{ $task->start_at }}</td>
			<td>
				<span class="label {{ $task->priority->class_name }}">
					{{ $task->priority->priority_name }}
				</span>
			</td>
			<td>
				<span class="label {{ $task->status->class_name }}">
					{{ $task->status->status_name }}
				</span>
			</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('projects/'.$task->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('TaskController@destroy',$task->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit"  >Delete</button>                      
				{{Form::close()}}   
			</td>
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
