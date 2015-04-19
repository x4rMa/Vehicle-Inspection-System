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
			<th>Company Name</th>
			<th class="hidden-xs">Contact Person</th>
			<th class="hidden-xs">Email</th>
			<th>Mobile Number</th>
			<th>Joined</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
				@foreach($clients as $client)
		<tr>
			<td class="center">{{ $client->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('clients/'.$client->id) }}">{{ ($client->company) }}</a></td>
			<td>{{ $client->firstname.' '.$client->lastname }}</td>
			<td>{{ $client->email }}</td>
			<td>{{ $client->phone }}</td>
			<td>{{ $client->created_at }}</td>
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('clients/'.$client->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin: 0px;', 'method'=>'delete','action'=> array('ClientController@destroy',$client->id))) }}
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


