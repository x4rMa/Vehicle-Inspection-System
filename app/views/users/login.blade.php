<!DOCTYPE html>
<!-- Template Name: Clip-Two - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<!-- start: HEAD -->
	<head>
		<title>:: EAAS - Login ::</title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
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
		<!-- start: CLIP-TWO CSS -->
		<link rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/plugins.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('assets/css/themes/theme-1.css') }}" id="skin_color" />
		<!-- end: CLIP-TWO CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body class="login">
		<!-- start: LOGIN -->
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<center><img src="{{ URL::asset('assets/images/logoo.png') }}" alt="EAAS Logo"/></center>
				</div>
				<!-- start: LOGIN BOX -->
				<div class="box-login">
					<form class="form-login" method="POST" action="{{ URL::to('loginpost') }}">
						<fieldset>
							<legend>
								Sign in to your account
							</legend>
							<p>
								Please enter your name and password to log in.
							</p>
							<p class="text-small margin-bottom-20">	
								@if($errors->has())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
								@endif
							</p>
							<p class="text-small margin-bottom-20">
								@if(Session::has('success'))
									<div class="alert alert-success">{{ Session::get('success') }}</div>
								@elseif(Session::has('error'))
									<div class="alert alert-danger">{{ Session::get('error') }}</div>
								@endif
							</p>
	
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" autocomplete="off" name="email" placeholder="email">
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" autocomplete="off" name="password" placeholder="Password">
									<i class="fa fa-lock"></i>
									<a class="forgot" href="{{ URL::to('resetpass') }}">
										I forgot my password
									</a> </span>
							</div>
							<div class="form-actions">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="remember" value="1">
									<label for="remember">
										Keep me signed in
									</label>
								</div>
								<button type="submit" class="btn btn-primary pull-right">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Don't have an account yet?
								<a href="{{ URL::to('register') }}">
									Create an account
								</a>
							</div>
						</fieldset>
					</form>
					<!-- start: COPYRIGHT -->
					<div class="copyright">
					&copy; <span class="current-year"></span><span class="text-bold text-camelcase"> Powered By <a href="http"//www.bluewebsafrica.co.ke" target="_blank">Blue Webs Africa</a></span>. <span>All rights reserved</span>
						</div>
					<!-- end: COPYRIGHT -->
				</div>
				<!-- end: LOGIN BOX -->
			</div>
		</div>
		<!-- end: LOGIN -->
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/modernizr/modernizr.js') }}"></script>
		<script src="{{ URL::asset('vendor/jquery-cookie/jquery.cookie.js') }}"></script>
		<script src="{{ URL::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ URL::asset('vendor/switchery/switchery.min.js') }}"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="{{ URL::asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="{{ URL::asset('assets/js/main.js') }}"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="{{ URL::asset('assets/js/login.js') }}"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				//Login.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
	<!-- end: BODY -->
</html>