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
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($services as $service)
		<tr>
			<td class="center">{{ $service->id }}</td>
			<td class="hidden-xs"><a href="{{ URL::to('service/show/'.$service->id) }}">{{ $service->item }}</a></td>
			<td>{{ $service->description }}</td>
			<td>{{ $service->charges }}</td>
			<td>{{ $service->tax }}</td>
			<td class="center">
			<div class="visible-md visible-lg hidden-sm hidden-xs">
				<a href="{{ URL::to('service/edit/'.$service->id) }}" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
				<a data-confirm="Are you sure you want to delete this service?" href="{{ URL::to('service/delete/'.$service->id) }}" class="delete btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
			</div>
			</td>
		</tr>
		@endforeach
		
	</tbody>
</table>

@stop

@section('deletescript')

<script type="text/javascript">

$('.delete').on("click", function (e) {
    e.preventDefault();

    var choice = confirm($(this).attr('data-confirm'));

    if (choice) {
        window.location.href = $(this).attr('href');
    }
});
</script>

@stop