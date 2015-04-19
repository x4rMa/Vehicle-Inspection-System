@extends('template')


@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success') }}</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif
		</p>
	
<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Full Name</th>
			<th class="hidden-xs">Email</th>
			<th class="hidden-xs">Phone Number</th>
			<th>Company</th>
			<th>City</th>
			<th>Street</th>
			<th>Postal</th>
			<th>Prefecture</th>
			<th>Status</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	
		<tr>
			<td class="center">{{ $user->id }}</td>
			<td class="hidden-xs">{{ $user->fullname }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->phone }}</td>
			<td>{{ $user->company }}</td>
			<td>{{ $user->city }}</td>
			<td>{{ $user->street }}</td>
			<td>{{ $user->postal }}</td>
			<td>{{ $user->prefecture }}</td>
			<td> @if ($user->status == 1) <span class="label label-success"> Active </span> @else <span class="label label-inverted"> Not Activated </span> @endif </td>
			@if(!Auth::user()->isInspector() && (!Auth::user()->isGeneralUser() ))
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('users/'.$user->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin:0;', 'method'=>'delete','action'=> array('UserController@destroy',$user->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{Form::close()}}   
			</td>
			@endif
			
		</tr>
		
	</tbody>
</table>

@stop