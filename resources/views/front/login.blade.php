@extends('layouts.front')
   
@section('content')
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						
						 
						<li><a href="">asdsad</a></li>
						
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>		
<div class="w3l_banner_nav_right">
			<!-- login -->
		<div class="w3_login">
			<h3>Sign In & Sign Up</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
						 {{ csrf_field() }}

					  <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
					   @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
					  <input id="password" type="password" placeholder="Password" name="password" required>
					  @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                      <input type="submit"> <span></span>
                      <div class="cta"><a href="{{ url('/password/reset') }}">Forgot your password?</a></div>
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					 <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
					  <input id="name" type="text" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
					   <input id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
					   <input id="password" type="password" placeholder="Password" name="password" required>
					  <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
					  <input type="submit">
					</form>
				  </div>
				  
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->


</div>
		<div class="clearfix"></div>
	</div>
 @endsection