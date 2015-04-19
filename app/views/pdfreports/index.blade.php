@extends('template')

@section('content')

		<p class="text-small margin-bottom-20">
			@if(Session::has('success'))
				<div class="alert alert-success">{{ Session::get('success') }}</div>
			@elseif(Session::has('error'))
				<div class="alert alert-danger">{{ Session::get('error') }}</div>
			@endif
		</p>
	

<table data-order='[[ 0, "desc" ]]' data-page-length='10' class="table table-striped table-bordered table-hover" id="example" >
	<thead>
		<tr>
			<th class="center">#</th>
			<th>Title</th>
			<th class="hidden-xs">Download Report</th>
			@if( Auth::user()->isAdmin() )
			<th></th>
			<th></th>
			@endif
		</tr>
	</thead>
	<tbody>
		@foreach($pdfreports as $pdfreport)
		<tr>
			<td class="center">{{ $pdfreport->id }}</td>
			<td class="hidden-xs">{{ $pdfreport->title }}</td>
			<td><a href="{{ URL::asset('PDF Reports/'.$pdfreport->file) }}">{{ $pdfreport->file }}</a></td>

			@if( Auth::user()->isAdmin() )
			<td class="center">
				<div class="visible-md visible-lg hidden-sm hidden-xs">
					<a href="{{ URL::to('pdfreports/'.$pdfreport->id.'/edit') }}" class="btn btn-primary btn-xs" tooltip-placement="top" tooltip="Edit">Edit</a>
					
				</div>
			</td>
			<td>
				{{ Form::open(array('style'=>'margin:0;','method'=>'delete','action'=> array('PDFReportsController@destroy', $pdfreport->id))) }}
				 	<button class = 'btn btn-danger btn-xs' type="submit">Delete</button>                      
				{{ Form::close() }}
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
