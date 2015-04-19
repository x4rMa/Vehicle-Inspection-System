@extends('template')

@section('content')
<p class="text-small margin-bottom-20">
	<h4>Oops, something went wrong.</h4>
	<br>
	<h6>We could not be able to activate your account</h6>
	<br>
	<h6><a href="{{ URL::to('users/lock') }}">Login</a></h6>
</p>
	
@stop