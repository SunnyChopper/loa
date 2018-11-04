<?php
	use \App\Custom\CartHelper;
	$cart_helper = new CartHelper();
?>
<header id="header" id="home">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
					<ul>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-snapchat"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
					@if(Session::has('backend_auth'))
					<a href="/admin/switch" style="display: inline-block;" class="mb-0">Switch to Regular Site</a>
					@endif

					@if(!Session::has('backend_auth'))
					<span class="lnr lnr-cart white"></span> <a href="/cart" style="display: inline-block;" class="mb-0"> Cart <span class="badge">{{ $cart_helper->get_number_of_items() }}</span></a>
					@endif

					@if(!Session::has('backend_auth'))
					<a href="mailto:luis@lawofambition.com"><span class="lnr lnr-envelope"></span> <span class="text">luis@lawofambition.com</span></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="/"><img src="{{ URL::asset('img/logo.png') }}" alt="" title="" style="max-width: 150px;" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					@if(Auth::guest())
						<li><a href="/">Home</a></li>
						<li><a href="/free-tools">Free Tools</a></li>
						<li><a href="/free-advice">Free Advice</a></li>
						{{-- <li><a href="/courses">Courses</a></li> --}}
						{{-- <li><a href="/events">Events</a></li> --}}
						<li><a href="/shop">Ambition Shop</a></li>
						<li><a href="/contact">Contact</a></li>
						<li class="menu-has-children"><a href="/members/login">Members</a>
							<ul>
								<li><a href="/members/register">Register</a></li>
								<li><a href="/members/login">Login</a></li>
							</ul>
						</li>
					@elseif(\Session::has('backend_auth'))
						@include('layouts.backend-menu')
					@else
						<li><a href="/members/dashboard">Dashboard</a></li>
						<li><a href="/free-advice">Free Advice</a></li>
						<li><a href="/members/community">Community</a></li>
						<li><a href="/members/tools">Tools</a></li>
						{{-- <li><a href="/members/courses">Courses</a></li> --}}
						{{-- <li><a href="/events">Events</a></li> --}}
						<li><a href="/shop">Ambition Shop</a></li>
						<li><a href="/contact">Contact</a></li>
						<li class="menu-has-children"><a href="/members/profile">{{ Auth::user()->first_name }}</a>
							<ul>
								<li><a href="/members/settings">Settings</a></li>
								<li><a href="/members/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</nav>
		</div>
	</div>
</header>