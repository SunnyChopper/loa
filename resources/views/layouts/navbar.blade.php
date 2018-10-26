<header id="header" id="home">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
					<ul>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
						<li><a href="#"><i class="fa fa-snapchat"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
					<a href="mailto:luis@lawofambition.com"><span class="lnr lnr-envelope"></span> <span class="text">luis@lawofambition.com</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="index.html"><img src="{{ URL::asset('img/logo.png') }}" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					@if(Auth::guest())
						<li><a href="/">Home</a></li>
						<li><a href="/free-tools">Free Tools</a></li>
						<li><a href="/free-advice">Free Advice</a></li>
						<li><a href="/courses">Courses</a></li>
						<li><a href="/events">Events</a></li>
						<li><a href="/shop">Ambition Shop</a></li>
						<li><a href="/contact">Contact</a></li>
						<li class="menu-has-children"><a href="/members/login">Members</a>
							<ul>
								<li><a href="/members/register">Register</a></li>
								<li><a href="/members/login">Login</a></li>
							</ul>
						</li>
					@else
						<li><a href="/members/dashboard">Dashboard</a></li>
						<li><a href="/members/community">Community</a></li>
						<li><a href="/members/tools">Tools</a></li>
						<li><a href="/members/courses">Courses</a></li>
						<li><a href="/events">Events</a></li>
						<li><a href="/members/shop">Ambition Shop</a></li>
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