@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div style="padding: 24px; border: 2px solid #EAEAEA; margin-top: 16px; margin-bottom: 16px;">
					<h3>Quick Stats</h3>
					<hr />
					<div class="row mt-32 mb-16">
						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<h3 class="text-center">545</h3>
							<p class="mb-0 text-center"><small>Total Users</small></p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<h3 class="text-center">43</h3>
							<p class="mb-0 text-center"><small>Users Logged In Today</small></p>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
							<h3 class="text-center">7.88%</h3>
							<p class="mb-0 text-center"><small>Daily Retention Percentage</small></p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div style="padding: 24px; border: 2px solid #EAEAEA; margin-top: 16px; margin-bottom: 16px;">
					<h3>Quick Actions</h3>
					<hr />

					<ul class="list-group">
						@if(Session::get('backend_auth') < 2)
							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Write a New Blog Post</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>

							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 style=" display: inline-block;">Check Blog Stats</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						@endif

						@if(Session::get('backend_auth') == 1)
							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 style=" display: inline-block;">Create New Course</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						
							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 style=" display: inline-block;">Check Course Stats</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						@endif

						<a href="">
							<li class="list-group-item admin-action mt-8">
								<h4 style=" display: inline-block;">Check Full Stats</h4>
								<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
							</li>
						</a>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection