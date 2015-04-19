@if($method == "PUT")
	<div class="form-group {{ ($errors->has('priority_id')) ? "has-error" : "" }}">
		{{Form::label('status_id','Task Status:')}}
		{{ Form::select('status_id', $statuses, $task->status_id, array('class' => 'form-control')) }}
	</div>status_id
@endif

<div class="form-group {{ ($errors->has('item')) ? "has-error" : "" }}">
	{{Form::label('title','Task Title:')}}
	{{Form::text('title', Input::old('title'), array("class"=>"form-control", 'placeholder'=>'Task Title') )}}
</div>

<div class="form-group {{ ($errors->has('description')) ? "has-error" : "" }}">
	{{Form::label('description','Description:')}}
	{{Form::textarea('description', Input::old('description'), array("class"=>"form-control",'placeholder'=>'Description') )}}
</div>

<div class="form-group {{ ($errors->has('start_at')) ? "has-error" : "" }}">
	{{Form::label('start_at','Starting Date:')}}
	{{Form::text('start_at', Input::old('start_at'), array("class"=>"form-control", 'placeholder'=>'starting time') )}}
</div>

<div class="form-group {{ ($errors->has('priority_id')) ? "has-error" : "" }}">
	{{Form::label('priority_id','Priority:')}}
	{{ Form::select('priority_id', $priorities, $task->priority_id, array('class' => 'form-control')) }}
</div>

{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}