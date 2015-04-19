
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-pencil  fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Inspect Vehicles</h2>
				<p class="text-small">
					Pending Vehicles: {{ Vehicle::doesntHave('certificate')->where('paid', true)->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('pendingpaid') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Approved Vehicles</h2>
				<p class="text-small">
					View Approved Vehicles
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('approved') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>

	@if(Auth::user()->isAdmin())
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Manage Users</h2>
				<p class="text-small">
					Manage administrators and inspectors
				</p>
				<p class="cl-effect-1">
					<a href="{{ URL::to('users') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	@else

	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Vehicles</h2>
				<p class="text-small">
					View all vehicles
				</p>
				<p class="cl-effect-1">
					<a href="{{ URL::to('vehicles') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>

	@endif

</div>