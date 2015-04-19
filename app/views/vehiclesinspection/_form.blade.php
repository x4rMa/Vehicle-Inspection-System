<div class="form-group {{ ($errors->has('mileage')) ? "has-error" : "" }}">
	{{Form::label('mileage','Mileage:')}}
	{{Form::text('mileage', Input::old('mileage'), array("class"=>"form-control", 'placeholder'=>'Mileage.') )}}
</div>

<div class="form-group {{ ($errors->has('istatus')) ? "has-error" : "" }}">
	{{Form::label('istatus','I Status:')}}
	{{Form::text('istatus', Input::old('istatus'), array("class"=>"form-control",'placeholder'=>'I Status') )}}
</div>

<div class="form-group {{ ($errors->has('pstatus')) ? "has-error" : "" }}">
	{{Form::label('pstatus','P Status:')}}
	{{Form::text('pstatus', Input::old('pstatus'), array("class"=>"form-control",'placeholder'=>'P Status') )}}
</div>

<!-- <div class="form-group {{ ($errors->has('certno')) ? "has-error" : "" }}">
	{{Form::label('certno','Certificate Number:')}}
	{{Form::text('certno', Input::old('certno'), array("class"=>"form-control",'placeholder'=>'certno') )}}
</div> -->

<div class="form-group {{ ($errors->has('comment')) ? "has-error" : "" }}">
	{{Form::label('comment','Comment:')}}
	{{Form::text('comment', Input::old('comment'), array("class"=>"form-control",'placeholder'=>'comment') )}}
</div>
													
<div class="form-group {{ ($errors->has('reistatus')) ? "has-error" : "" }}">
	{{Form::label('reistatus','Re - Status:')}}
	{{Form::text('reistatus', Input::old('reistatus'), array("class"=>"form-control", 'placeholder'=>'Re - Status') )}}
</div>

<div class="form-group {{ ($errors->has('inspe_comment')) ? "has-error" : "" }}">
	{{Form::label('inspe_comment','Inspection Comment:')}}
	{{Form::text('inspe_comment', Input::old('inspe_comment'), array("class"=>"form-control", 'placeholder'=>'Inspection Comment') )}}
</div>

<div class="form-group {{ ($errors->has('amount_paid')) ? "has-error" : "" }}">
	{{Form::label('amount_paid','Amount Paid:')}}
	{{Form::text('amount_paid', Input::old('amount_paid'), array("class"=>"form-control", 'placeholder'=>'Amount Paid') )}}
</div>

<div class="form-group {{ ($errors->has('reinspe_amount')) ? "has-error" : "" }}">
	{{Form::label('reinspe_amount','Reinspection Amount:')}}
	{{Form::text('reinspe_amount', Input::old('reinspe_amount'), array("class"=>"form-control", 'placeholder'=>'Reinspection Amount:') )}}
</div>

<div class="form-group {{ ($errors->has('vvalue')) ? "has-error" : "" }}">
	{{Form::label('vvalue','Vehicle Value:')}}
	{{Form::text('vvalue', Input::old('vvalue'), array("class"=>"form-control", 'placeholder'=>'Vehicle Value') )}}
</div>

<div class="form-group {{ ($errors->has('issue_date')) ? "has-error" : "" }}">
	{{Form::label('issue_date','Issue Date:')}}
	{{Form::text('issue_date', Input::old('issue_date'), array("class"=>"form-control datepicker", 'placeholder'=>'Issue Date') )}}
</div>

<div class="form-group {{ ($errors->has('inspedate')) ? "has-error" : "" }}">
	{{Form::label('inspedate','Inspection Date:')}}
	{{Form::text('inspedate', Input::old('inspedate'), array("class"=>"form-control datepicker", 'placeholder'=>'Inspection Date') )}}
</div>

<div class="form-group {{ ($errors->has('weekreport')) ? "has-error" : "" }}">
	{{Form::label('weekreport','Week Report:')}}
	{{Form::textarea('weekreport', Input::old('weekreport'), array("class"=>"form-control", 'placeholder'=>'Week Report') )}}
</div>

<div class="form-group {{ ($errors->has('monthreport')) ? "has-error" : "" }}">
	{{Form::label('monthreport','Month Report:')}}
	{{Form::textarea('monthreport', Input::old('monthreport'), array("class"=>"form-control", 'placeholder'=>'Month Report') )}}
</div>

<div class="form-group {{ ($errors->has('odometreunit')) ? "has-error" : "" }}">
	{{Form::label('odometreunit','Odometre Unit:')}}
	{{Form::text('odometreunit', Input::old('odometreunit'), array("class"=>"form-control", 'placeholder'=>'Odometre Unit') )}}
</div>

<div class="form-group {{ ($errors->has('inspecentre')) ? "has-error" : "" }}">
	{{Form::label('inspecentre','Inspection Centre:')}}
	{{Form::text('inspecentre', Input::old('inspecentre'), array("class"=>"form-control", 'placeholder'=>'Inspection Centre') )}}
</div>

<div class="form-group {{ ($errors->has('status')) ? "has-error" : "" }}">
	
	<input type="checkbox" name="status" style="margin:0px;">

	{{Form::label('inspecentre','I confirm that this vehicle is ready to be issued with a certificate:')}}
</div>
									

{{Form::submit('Submit', array('class'=>'btn btn-primary'))}}