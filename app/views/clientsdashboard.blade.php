


<div class="row">
	
	
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Book Inspection</h2>
				<p class="text-small">
					Add a vehicle for inspection.
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('vehicles/create') }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
	<div class="col-sm-4">
		<div class="panel panel-white no-radius text-center">
			<div class="panel-body">
				<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip  fa-stack-1x fa-inverse"></i> </span>
				<h2 class="StepTitle">Vehicles</h2>
				<p class="text-small">
					Total Vehicles: {{ $vehicles->count() }}
				</p>
				<p class="links cl-effect-1">
					<a href="{{ URL::to('vehicles') }}">
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
				<h2 class="StepTitle">Manage Profile</h2>
				<p class="text-small">
					Update your profile
				</p>
				<p class="cl-effect-1">
					<a href="{{ URL::to('users/'.Auth::id()) }}">
						view more
					</a>
				</p>
			</div>
		</div>
	</div>
	
</div>