<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Bootstrap E-commerce Templates</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">      
		<link href="{{ asset('bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
		
		<link href="{{ asset('themes/css/bootstrappage.css') }}" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="{{ asset('themes/css/flexslider.css') }}" rel="stylesheet"/>
		<link href="{{ asset('themes/css/main.css') }}" rel="stylesheet"/>

		<!-- scripts -->
		<script src="{{ asset('themes/js/jquery-1.7.2.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>				
		<script src="{{ asset('themes/js/superfish.js') }}"></script>	
		<script src="{{ asset('themes/js/jquery.scrolltotop.js') }}"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							
							@if(Session::has('loggedCustomer'))
								<li><a href="#">My Account</a></li>
							    <li><a href="{{route('chart.list')}}">Your Cart</a></li>
							@endif
											
							<li><a href="{{route('login.index')}}">Login</a></li>
							<li><a href="{{route('logout.index')}}">Logout</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>




		<div id="wrapper" class="container">

			@yield('topbar')
			
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="{{ asset('themes/images/carousel/banner-1.jpg') }}" alt="" />
						</li>
						<li>
							<img src="{{ asset('themes/images/carousel/banner-2.jpg') }}" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
				<br/>Don't miss to use our cheap abd best bootstrap templates.
			</section>



  			@yield('customer')
		
			<section class="our_client">
				<h4 class="title"><span class="text">Manufactures</span></h4>
				<div class="row">					
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/14.png') }}"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/35.png') }}"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/1.png') }}"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/2.png') }}"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/3.png') }}"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="{{ asset('themes/images/clients/4.png') }}"></a>
					</div>
				</div>
			</section>
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="{{route('customer.index')}}">Homepage</a></li>  
							<li><a href="#">About Us</a></li>
							<li><a href="#">Contac Us</a></li>
							<li><a href="{{route('chart.list')}}">Your Cart</a></li>
							<li><a href="{{route('customer.create')}}">Register</a></li>							
						</ul>					
					</div>
					<div class="span4">
						
						<ul class="nav">
							<li></li>
							<li></li>
							<li></li>
							<li></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="{{ asset('themes/images/logo.png') }}" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>