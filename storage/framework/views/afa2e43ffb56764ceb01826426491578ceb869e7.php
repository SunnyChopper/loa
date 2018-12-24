<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

					<div class="row mt-32 mb-16">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h3 class="text-center">18</h3>
							<p class="mb-0 text-center"><small>New Users</small></p>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<h3 class="text-center">7</h3>
							<p class="mb-0 text-center"><small>Referred Users</small></p>
						</div>
					</div>

					<div class="row mt-32 mb-16">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5 class="mb-2">Today's Orders</h5>
							<table class="table table-striped">
								<thead>
									<tr>
										<td>Order ID</td>
										<td>Product</td>
										<td>Total</td>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>GD768DSJG98</td>
										<td>Ambition Premium Shirt</td>
										<td>$49.99</td>
									</tr>

									<tr>
										<td>FK8DSF86DSD</td>
										<td>Ambition Premium Shirt</td>
										<td>$49.99</td>
									</tr>

									<tr>
										<td>HFHJ6HF5975F</td>
										<td>Ambition Premium Shirt</td>
										<td>$49.99</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div style="padding: 24px; border: 2px solid #EAEAEA; margin-top: 16px; margin-bottom: 16px;">
					<h3>Quick Actions</h3>
					<hr />

					<ul class="list-group">
						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2 || Session::get('backend_auth') == 3): ?>
							<a href="/admin/posts/new">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Write a New Blog Post</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>

						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2): ?>
							<a href="/admin/events/new">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Create New Event</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>

						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2): ?>
							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Create Voting Poll</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>

						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2): ?>
							<a href="/admin/discussions/new">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Create Book Discussion</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>

						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2 || Session::get('backend_auth') == 6): ?>
							<a href="">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Check Support Tickets</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>

						<?php if(Session::get('backend_auth') == 1 || Session::get('backend_auth') == 2 || Session::get('backend_auth') == 6): ?>
							<a href="/admin/orders/view">
								<li class="list-group-item admin-action mt-8">
									<h4 class="mb-0" style="display: inline-block;">Check Orders</h4>
									<p class="mb-0" style="float: right; display: inline-block;"><span class="lnr lnr-arrow-right green" style="font-size: 20px;"></span></p>
								</li>
							</a>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>