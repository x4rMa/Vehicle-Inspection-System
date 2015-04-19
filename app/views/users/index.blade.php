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
			<th>Full Name</th>
			<th class="hidden-xs">Email</th>
			<th class="hidden-xs">Phone Number</th>
			<th class="pull-right">Status</th>
			<th width="1px">Level</th>
			@if(!Auth::user()->isGeneralUser())
			<th></th>
			<th></th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td class="center">{{ $user->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('users/'.$user->id) }}">{{ $user->fullname }}</a></td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td> @if ($user->status == 1) <span class="label label-success pull-right"> Active </span> @else <span class="label label-inverted pull-right"> Inactive </span> @endif </td>
			<td>
				<span class="label @if($user->level_id == 1) {{'label-success'}} @elseif($user->level_id == 2) {{'label-info'}} @else {{'label-warning'}} @endif }}">
					{{ $user->level->level_name }}
				</span>
			</td>
			@if(!Auth::user()->isInspector() && (!Auth::user()->isGeneralUser() ))
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
				@if(!Auth::user()->isClient())
				<td>

					{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('UserController@destroy',$user->id))) }}
					 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
					{{Form::close()}}   

					
				</td>
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