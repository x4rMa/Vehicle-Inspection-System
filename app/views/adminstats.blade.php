<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-pencil  fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Inspect Vehicles</h2>
				<p class="text-small">
					Pending Vehicles: {{ DB::table('vehicles')
			        ->join('vehicles_inspection', function($join)
			        {
			            $join->on('vehicles.id', '=', 'vehicles_inspection.vehicle_id')
			                 ->where('vehicles_inspection.status', '=', false);
			        })
			        ->wherePaid('true')   
			        ->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('vehiclesinspection') }}">
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
					Total: {{ DB::table('vehicles')
					->leftJoin('users', 'vehicles.user_id', '=', 'users.id')
			        ->join('vehicles_inspection', function($join)
			        {
			            $join->on('vehicles.id', '=', 'vehicles_inspection.vehicle_id')
			                 ->where('vehicles_inspection.status', '=', true);
			        })      
			        ->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('approved') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Manage Users</h2>
				<p class="text-small">
					Total: {{ User::where('level_id','!=', 3)->count() }}
				</p>
				<p class="cl-effect-1">
					<a href="{{ URL::to('users') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>

</div>

<!-- second row -->

<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-minus-circle  fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Unpaid Vehicles</h2>
				<p class="text-small">
					Total: {{ Vehicle::where('paid', false)->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('pendingunpaid') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-book fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Unapproved Certs</h2>
				<p class="text-small">
					Total: {{ Certificate::where('status', 0)->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('vehicles/certificates/0') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-cab fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">All Vehicles</h2>
				<p class="text-small">
					Total: {{ Vehicle::all()->count() }}
				</p>
				<p class="cl-effect-1">
					<a href="{{ URL::to('vehicles') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>

</div>