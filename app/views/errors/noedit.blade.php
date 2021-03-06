<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>:: EAAS - Japan ::</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->

		<link rel='shortcut icon' type='image/x-icon' href='{{ URL::asset('assets/images/favicon.ico') }}' />

		<link rel="stylesheet" type="text/css" href="http://datatables.net/media/blog/bootstrap_2/DT_bootstrap.css">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/datatables/bootstrap.min.css') }}">
		
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendor/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('vendor/themify-icons/themify-icons.min.css') }}">
		<link href="{{ URL::asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.css') }}" rel="stylesheet" media="screen">
		<link href="{{ URL::asset('vendor/switchery/switchery.min.css') }}" rel="stylesheet" media="screen">
		<!-- end: MAIN CSS -->

		@yield('formcss')
		
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/themes/theme-1.css') }}" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->

		<style type="text/css">
			div.dataTables_paginate.paging_bootstrap.pagination,
			div.dataTables_filter{
				margin-right: -114px;
			}
			div.dataTables_length {
				margin-left: -5px;
			}
		</style>

		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app">
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<nav>
						<!-- start: SEARCH FORM -->
						
						<!-- end: SEARCH FORM -->
						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu">
							<li class="active open">
								<a href="{{ URL::to('/') }}">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-home"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>
							@if(Auth::check())
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
												<span class="title"> Vehicles </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								
								@if(Auth::user()->isClient())
								<ul class="sub-menu">
									
									<li>
										<a href="{{ URL::to('vehicles/create') }}">
											<span class="title"> Add New Vehicle </span>
										</a>
									</li>
									
									<li>
										<a href="{{ URL::to('pending') }}">
											<span class="title"> Pending Vehicles  <span class="badge">{{ Vehicle::where('user_id','=', Auth::id())->doesntHave('certificate')->count() }}</span></span>
										</a>
									</li>
									
									<li>
										<a href="{{ URL::to('approved') }}">
											<span class="title"> Approved Vehicles  <span class="badge">{{ Vehicle::where('user_id','=', Auth::id())->has('certificate')->count() }}</span></span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('vehicles') }}">
											<span class="title"> View All Vehicles <span class="badge">{{ Vehicle::where('user_id','=', Auth::id())->count() }}</span> </span>
										</a>
									</li>
								</ul>
									@else
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('pending') }}">
											<span class="title"> Pending Vehicles   <span class="badge">{{ Vehicle::doesntHave('certificate')->count() }} </span></span>
										</a>
									</li>
									
									<li>
										<a href="{{ URL::to('approved') }}">
											<span class="title"> Approved Vehicles  <span class="badge">{{ Vehicle::has('certificate')->count() }}</span></span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('vehicles') }}">
											<span class="title"> View All Vehicles <span class="badge">{{ Vehicle::all()->count() }}</span> </span>
										</a>
									</li>
							
								</ul>
								@endif
							</li>
							@if(Auth::user()->isAdmin() || Auth::user()->isGeneralUser())
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Users </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('users/create') }}">
											<span class="title">Add New User</span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('user/admins') }}">
											<span class="title"> Administrators <span class="badge">{{ User::where('level_id','=', 1)->count() }}</span></span>
										</a>
									</li>

									<li>
										<a href="{{ URL::to('user/inspectors') }}">
											<span class="title"> Inspectors <span class="badge">{{ User::where('level_id','=', 2)->count() }}</span></span>
										</a>
									</li>

									<li>
										<a href="{{ URL::to('user/general') }}">
											<span class="title"> General Users <span class="badge">{{ User::where('level_id','=', 5)->count() }}</span></span>
										</a>
									</li>
									
									<li>
										<a href="{{ URL::to('user/ra') }}">
											<span class="title"> Revenue Authority Users <span class="badge">{{ User::where('level_id','=', 4)->count() }}</span></span>
										</a>
									</li>

									<li>
										<a href="{{ URL::to('users') }}">
											<span class="title"> All Users <span class="badge">{{ User::where('level_id','!=',3)->count() }}</span></span>
										</a>
									</li>
									
								</ul>
							</li>
							
							

							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-user"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Clients </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									
									<li>
										<a href="{{ URL::to('user/clients') }}">
											<span class="title"> All Clients <span class="badge">{{ User::where('level_id','=', 3)->count() }}</span></span>
										</a>
									</li>
									
								</ul>
							</li>

							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Certificates </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('vehiclesinspection') }}">
											<span class="title"> Issue Certificate</span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('vehicles/certificates/1') }}">
											<span class="title"> Approved Certificates <span class="badge">{{ Certificate::where('status','=', 1)->count() }}</span> </span>
										</a>
									</li>								
									<li>
										<a href="{{ URL::to('vehicles/certificates') }}">
											<span class="title"> All Certificates <span class="badge">{{ Certificate::all()->count() }}</span></span>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Inspections </span><i class="icon-arrow"></i>
										</div>
									</div>

								</a>
								<ul class="sub-menu">
									 <li>
										<a href="{{ URL::to('vehiclesinspection') }}">
											<span class="title"> Pending Inspections <span class="badge">{{ Vehicle::doesntHave('certificate')->where('paid', true)->count() }}</span> </span>
										</a>
									</li>								
									<li>
										<a href="{{ URL::to('complete') }}">
											<span class="title"> Completed Inspections <span class="badge"> {{ DB::table('vehicles')
					->leftJoin('users', 'vehicles.user_id', '=', 'users.id')
			        ->join('vehicles_inspection', function($join)
			        {
			            $join->on('vehicles.id', '=', 'vehicles_inspection.vehicle_id')
			                 ->where('vehicles_inspection.status', '=', true);
			        })      
			        ->count() }}
 </span> </span>
										</a>
									</li>
									
								</ul>
							</li>

							
							
							<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Locations </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="{{ URL::to('locations/create') }}">
											<span class="title">Add New Location</span>
										</a>
									</li>
									<li>
										<a href="{{ URL::to('locations') }}">
											<span class="title"> All Locations <span class="badge">{{ Location::all()->count() }}</span></span>
										</a>
									</li>
									
								</ul>
							</li>
							
							<li>
								<a target="_blank" href="http://eaa-s.jp/admin/welcome.php">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-pencil-alt"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Update Website Content </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								
							</li>

							@endif
							@endif
							

							
						</ul>
						<!-- end: MAIN NAVIGATION MENU -->
						<!-- start: CORE FEATURES -->
						
						<!-- end: CORE FEATURES -->
					
						<!-- end: DOCUMENTATION BUTTON -->
					</nav>
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="#">
							<img height="80%" width="80%" src="{{ URL::asset('assets/images/logoo.png') }}" alt="logo" style="margin-left:20px;">
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-right">
							<!-- start: MESSAGES DROPDOWN -->
							
							<!-- end: MESSAGES DROPDOWN -->
							<!-- start: ACTIVITIES DROPDOWN -->
							
							<!-- end: ACTIVITIES DROPDOWN -->
							<!-- start: LANGUAGE SWITCHER -->
							
							<!-- start: LANGUAGE SWITCHER -->
							<!-- start: USER OPTIONS DROPDOWN -->
							
							<style type="text/css">
								ul.dropdown-menu.dropdown-dark > li > a:hover {
									background: #333;
								}
							</style>
							
							<li class="dropdown current-user">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<img src="http://www.esmeth.com/wp-content/uploads/2014/11/user_placeholder-370x276.png" alt="Peter"> <span class="username">@if(Auth::check()) {{ Auth::user()->username; }} @else Guest @endif <i class="ti-angle-down"></i></i></span>
								</a>
								
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<!-- <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div> -->
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					<!-- <a class="dropdown-off-sidebar" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
						&nbsp;
					</a> -->
					<!-- end: NAVBAR COLLAPSE -->
				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: DASHBOARD TITLE -->
						<section id="page-title" class="padding-top-15 padding-bottom-15">
							<div class="row">
								<div class="col-sm-9">
									<h1 class="mainTitle">EAAS - Japan : Permission Denied </h1>
									<!-- <span class="mainDescription">overview &amp; stats </span> -->
								</div>
								
							</div>
						</section>
						<!-- end: DASHBOARD TITLE -->
						
						<p class="text-small margin-bottom-20">
		
								<div class="alert alert-danger">You cannot edit or delete this user.<a href="{{ url('/') }}">Go to Dashboard</a></div>
							
						</p>
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="col-sm-7">
						&copy; <span class="current-year"></span><span class="text-bold text-camelcase"> Powered By <a target="_blank" href="http://www.bluewebsafrica.co.ke">Blue Webs Africa</a></span>. <span>All rights reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			<!-- start: OFF-SIDEBAR -->

		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ URL::asset('vendor/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/switchery/switchery.min.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ URL::asset('vendor/Chart.js/Chart.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		@yield('dataTablesjs')

		
		<script src="{{ URL::asset('vendor/maskedinput/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/autosize/autosize.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/selectFx/classie.js') }}"></script>
		<script src="{{ URL::asset('vendor/selectFx/selectFx.js') }}"></script>
		<script src="{{ URL::asset('vendor/select2/select2.min.js') }}"></script>

		<script src="{{ URL::asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>

		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="{{ URL::asset('assets/js/main.js') }}"></script>
		<!-- start: JavaScript Event Handlers for this page  -->
		<script src="{{ URL::asset('assets/js/index.js') }}"></script>
		<script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

		@yield('formjs')

		<script>
			jQuery(document).ready(function() {
				Main.init();
				
				FormElements.init();
				
				
				
			});

		</script>
		
		
	</body>
</html>