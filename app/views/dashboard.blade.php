@extends('template')

@section('content')
						
						<!-- end: DASHBOARD TITLE -->
						<!-- start: FEATURED BOX LINKS -->
						
						@if(Auth::user()->status == 0)
						<div class="container-fluid container-fullw bg-white">
							<!-- start stats -->
							<div class="alert alert-warning">You have not activated your account. Please click the activation link in your email.</div>
							<!-- end stats -->
						</div>
						@endif

						@if(Auth::user()->isAdmin() || Auth::user()->isGeneralUser())
						<div class="container-fluid container-fullw bg-white">
							<!-- start stats -->
							@include('adminstats')
							<!-- end stats -->
						</div>
						@elseif(Auth::user()->isInspector()))
						<div class="container-fluid container-fullw bg-white">
							<!-- start stats -->
							@include('stats')
							<!-- end stats -->
						</div>

						@else 

						<div class="container-fluid container-fullw bg-white">
							<!-- start stats -->
							@include('clientsdashboard')
							<!-- end stats -->
						</div>

						@endif
						<!-- end: FEATURED BOX LINKS -->

						      

						@if(1 == 3)
						<!-- start: FIRST SECTION -->
						<div class="container-fluid container-fullw padding-bottom-10">
							<div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-md-7 col-lg-8">
											<div class="panel panel-white no-radius" id="visits">
												<div class="panel-heading border-light">
													<h4 class="panel-title"> Visits </h4>
													<ul class="panel-heading-tabs border-light">
														<li>
															<div class="pull-right">
																<div class="btn-group">
																	<a class="padding-10" data-toggle="dropdown">
																		<i class="ti-more-alt "></i>
																	</a>
																	<ul class="dropdown-menu dropdown-light" role="menu">
																		<li>
																			<a href="#">
																				Action
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				Another action
																			</a>
																		</li>
																		<li>
																			<a href="#">
																				Something else here
																			</a>
																		</li>
																	</ul>
																</div>
															</div>
														</li>
														<li>
															<div class="rate">
																<i class="fa fa-caret-up text-primary"></i><span class="value">15</span><span class="percentage">%</span>
															</div>
														</li>
														<li class="panel-tools">
															<a data-original-title="Refresh" data-toggle="tooltip" data-placement="top" class="btn btn-transparent btn-sm panel-refresh" href="#"><i class="ti-reload"></i></a>
														</li>
													</ul>
												</div>
												<div collapse="visits" class="panel-wrapper">
													<div class="panel-body">
														<div class="height-350">
															<canvas id="chart1" class="full-width" width="644" height="350" style="width: 644px; height: 350px;"></canvas>
															<div class="margin-top-20">
																<div class="inline pull-left">
																	<div id="chart1Legend" class="chart-legend"><ul class="tc-chart-js-legend"><li><span style="background-color:rgba(220,220,220,1)"></span>My First dataset</li><li><span style="background-color:rgba(151,187,205,1)"></span>My Second dataset</li></ul></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-5 col-lg-4">
											<div class="panel panel-white no-radius">
												<div class="panel-heading border-light">
													<h4 class="panel-title"> Acquisition </h4>
												</div>
												<div class="panel-body">
													<h3 class="inline-block no-margin">26</h3> visitors on-line
													<div class="progress progress-xs no-radius">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
															<span class="sr-only"> 40% Complete</span>
														</div>
													</div>
													<div class="row">
														<div class="col-sm-4">
															<h4 class="no-margin">15</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
																	<span class="sr-only"> 80% Complete</span>
																</div>
															</div>
															Direct
														</div>
														<div class="col-sm-4">
															<h4 class="no-margin">7</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																	<span class="sr-only"> 60% Complete</span>
																</div>
															</div>
															Sites
														</div>
														<div class="col-sm-4">
															<h4 class="no-margin">4</h4>
															<div class="progress progress-xs no-radius no-margin">
																<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
																	<span class="sr-only"> 40% Complete</span>
																</div>
															</div>
															Search
														</div>
													</div>
													<div class="row margin-top-30">
														<div class="col-xs-4 text-center">
															<div class="rate">
																<i class="fa fa-caret-up text-green"></i><span class="value">26</span><span class="percentage">%</span>
															</div>
															Mac OS X
														</div>
														<div class="col-xs-4 text-center">
															<div class="rate">
																<i class="fa fa-caret-up text-green"></i><span class="value">62</span><span class="percentage">%</span>
															</div>
															Windows
														</div>
														<div class="col-xs-4 text-center">
															<div class="rate">
																<i class="fa fa-caret-down text-red"></i><span class="value">12</span><span class="percentage">%</span>
															</div>
															Other OS
														</div>
													</div>
													<div class="margin-top-10">
														<div class="height-180">
															<canvas id="chart2" class="full-width" width="291" height="180" style="width: 291px; height: 180px;"></canvas>
															<div class="inline pull-left legend-xs">
																<div id="chart2Legend" class="chart-legend"><ul class="tc-chart-js-legend"><li><span style="background-color:rgba(220,220,220,0.5)"></span>My First dataset</li><li><span style="background-color:rgba(151,187,205,0.5)"></span>My Second dataset</li></ul></div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						<!-- end: FIRST SECTION -->

						@if(1 == 3)
						<!-- start: SECOND SECTION -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-8">
									<div class="panel panel-white no-radius">
										<div class="panel-body">
											<!-- start of monthly stats -->
											<div class="partition-light-grey padding-15 text-center margin-bottom-20">
												<h4 class="no-margin">2015</h4>
												<span class="text-light">Monthly Statistics</span>
											</div>
											<div id="accordion" class="panel-group accordion accordion-white no-margin">
												
												@include('monthly')
												
											</div>
											<!-- end of monthly stats -->
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">New Users</h4>
										</div>
										<div class="panel-body">
											<div class="text-center">
												<span class="mini-pie"> <canvas id="chart3" class="full-width" width="100" height="150" style="width: 100px; height: 150px;"></canvas> <span>450</span> </span>
												<span class="inline text-large no-wrap">Acquisition</span>
											</div>
											<div class="margin-top-20 text-center legend-xs inline">
												<div id="chart3Legend" class="chart-legend"><ul class="tc-chart-js-legend"><li><span style="background-color:#F7464A"></span>Red</li><li><span style="background-color:#46BFBD"></span>Green</li><li><span style="background-color:#FDB45C"></span>Yellow</li></ul></div>
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">90%</span>
														<span class="text-light">Satisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">2%</span>
														<span class="text-light">Unsatisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<span class="text-bold block text-extra-large">8%</span>
													<span class="text-light">NA</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: SECOND SECTION -->
						<!-- start: FOURTH SECTION -->
						<div class="container-fluid container-fullw bg-white">
							<!-- start activities -->
							<div class="row">
								<div class="col-xs-12 col-sm-4">
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-white no-radius">
												<div class="panel-body padding-20 text-center">
													<div class="space10">
														<h5 class="text-dark no-margin">This Month</h5>
														<h2 class="no-margin"><small>Total Invoices: </small>10</h2>
														<span class="badge badge-success margin-top-10">Expected Pay: 120,000</span>
														<br>
														<span class="badge badge-danger margin-top-10">Overdue: 3</span>
														
													</div>
													<!-- <div class="sparkline-4 space10">
														<span><canvas width="225" height="47" style="display: inline-block; vertical-align: top; width: 225px; height: 47px;"></canvas></span>
													</div> -->
													<span class="text-white-transparent"><i class="fa fa-clock-o"></i> 1 hour ago</span>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="panel panel-white no-radius">
												<div class="panel-body padding-20 text-center">
													<div class="space10">
														<h5 class="text-dark no-margin">This Year</h5>
														<h2 class="no-margin"><small>Ksh </small>210,450</h2>
														<span class="badge badge-danger margin-top-10">253 Sales</span>
													</div>
													<div class="sparkline-5 space10">
														<span><canvas width="225" height="47" style="display: inline-block; vertical-align: top; width: 225px; height: 47px;"></canvas></span>
													</div>
													<span class="text-white-transparent"><i class="fa fa-clock-o"></i> 1 hour ago</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Activities</h4>
										</div>
										<div class="panel-body">
											<ul class="timeline-xs margin-top-15 margin-bottom-15">
												<li class="timeline-item success">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															2 minutes ago
														</div>
														<p>
															<a  href="{{ URL::to('users/2') }}">
																Richard
															</a>
															added a new <a href="{{ URL::to('tasks/4') }}">task</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															12:30
														</div>
														<p>
															Staff Meeting
														</p>
													</div>
												</li>
												<li class="timeline-item danger">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															11:11
														</div>
														<p>
															<a  href="{{ URL::to('users/1') }}">
																Adams
															</a>
															updated a <a href="{{ URL::to('projects/2') }}">project</a>
														</p>
													</div>
												</li>
												<li class="timeline-item info">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Thu, 12 Jun
														</div>
														<p>
															<a href="{{ URL::to('users/1') }}">
																Adams
															</a>
															generated a new invoice for <a href="{{ URL::to('projects/5') }}">CDTS</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Tue, 10 Jun
														</div>
														<p>
															<a  href="{{ URL::to('users/2') }}">
																Richard
															</a>
															completed a <a href="{{ URL::to('projects/7') }}">project</a>
														</p>
													</div>
												</li>
												<li class="timeline-item">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Sun, 11 Apr
														</div>
														<p>
															<a  href="{{ URL::to('users/1') }}">
																Adams
															</a>
															sent a <a href="#">message</a> to all <a href="{{ URL::to('users') }}">users</a>
														</p>
													</div>
												</li>
												<li class="timeline-item warning">
													<div class="margin-left-15">
														<div class="text-muted text-small">
															Wed, 25 Mar
														</div>
														<p>
															<a href="{{ URL::to('users/1') }}">
																Kendi
															</a>
															updated her <a href="{{ URL::to('users/3') }}">profile</a>
														</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Chat</h4>
										</div>
										<!-- start chat window -->
										@include('chat')
										<!-- end chat window -->
										<div class="message-bar">
											<div class="message-inner">
												<a class="link icon-only" href="#"><i class="fa fa-camera"></i></a>
												<div class="message-area">
													<textarea placeholder="Message"></textarea>
												</div>
												<a class="link" href="#">
													Send
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: FOURTH SECTION -->
						<!-- start: THIRD SECTION -->
						<div class="container-fluid container-fullw padding-bottom-10">
							<div class="row">
								<div class="col-sm-8">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-light">
											<h4 class="panel-title">Users</h4>
										</div>
										<!-- start users -->
										@include('userslist')
										<!-- end users -->
									</div>
								</div>
								<div class="col-sm-4">
									<div class="panel panel-white no-radius">
										<div class="panel-heading border-bottom">
											<h4 class="panel-title">Specialization</h4>
										</div>
										<div class="panel-body">
											<canvas id="chart4" class="full-width" width="321" height="161" style="width: 321px; height: 161px;"></canvas>
											<div class="margin-top-20 padding-bottom-5 inline">
												<!-- <div id="chart4Legend" class="chart-legend">
													<ul class="tc-chart-js-legend">
														<li><span style="background-color:rgba(220,220,220,1)"></span>My First dataset</li>
														<li><span style="background-color:rgba(151,187,205,1)"></span>My Second dataset</li>
													</ul>
												</div> -->
											</div>
										</div>
										<div class="panel-footer">
											<div class="clearfix padding-5 space5">
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">90%</span>
														<span class="text-light">Satisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<div class="border-right border-dark">
														<span class="text-bold block text-extra-large">2%</span>
														<span class="text-light">Unsatisfied</span>
													</div>
												</div>
												<div class="col-xs-4 text-center no-padding">
													<span class="text-bold block text-extra-large">8%</span>
													<span class="text-light">NA</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end: THIRD SECTION -->

					</div>
					@endif

@stop

@section('dataTablesjs')
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="{{ URL::asset('vendor/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/moment/moment.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/fullcalendar/fullcalendar.min.js') }}"></script>
	<script src="{{ URL::asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

	<script src="{{ URL::asset('assets/js/pages-calendar.js') }}"></script>

@stop