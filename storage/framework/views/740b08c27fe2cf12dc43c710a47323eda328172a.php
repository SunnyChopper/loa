<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<div class="well">
					<form id="update_order_form" action="/admin/orders/update" method="post">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
						<h3>Basic Information</h3>
						<hr />
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">First Name:</h5>
									<input type="text" value="<?php echo e($order->order_first_name); ?>" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Last Name:</h5>
									<input type="text" value="<?php echo e($order->order_last_name); ?>" class="form-control" disabled="">
								</div>
								
							</div>
						</div>

						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Address:</h5>
									<input type="text" value="<?php echo e($order->order_address); ?>" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">Zipcode:</h5>
									<input type="text" value="<?php echo e($order->order_zipcode); ?>" class="form-control" disabled>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">City:</h5>
									<input type="text" value="<?php echo e($order->order_city); ?>" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">State:</h5>
									<input type="text" value="<?php echo e($order->order_state); ?>" class="form-control" disabled>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-4 col-12">
								<div class="form-group">
									<h5 class="mb-2">Country:</h5>
									<input type="text" value="<?php echo e($order->order_country); ?>" class="form-control" disabled>
								</div>
							</div>
						</div>

						<div class="row mb-32">
							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<h5>Guest purchase?</h5>
								<?php if($order->is_guest == 1): ?>
									<p class="mb-0">Yes</p>
								<?php else: ?>
									<p class="mb-0">No</p>
								<?php endif; ?>
							</div>

							<?php if($order->is_guest == 0): ?>
								<div class="col-lg-4 col-md-4 col-sm-4 col-4">
									<h5>User ID</h5>
									<p class="mb-0"><?php echo e($order->user_id); ?></p>
								</div>
							<?php endif; ?>

							<div class="col-lg-4 col-md-4 col-sm-4 col-4">
								<h5>Order IP</h5>
								<p class="mb-0"><?php echo e($order->order_ip); ?></p>
							</div>
						</div>

						<h3>Product Information</h3>
						<hr />

						<?php $product_helper->set_product_id($order->product_id); $product_info = $product_helper->get_product_by_id(); ?>

						<div class="row mb-32">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<img src="<?php echo e($product_info->featured_image_url); ?>" class="regular-image">
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<h4><?php echo e($product_info->product_name); ?></h4>
								<p>
									<?php $__currentLoopData = json_decode($order->order_selectors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selector): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php echo e($selector); ?><br>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</p>

								<h5>Quantity</h5>
								<p><?php echo e($order->quantity); ?></p>

								<h5>Digital Product?</h5>
								<?php if($product_info->digital_product == 1): ?>
									<p>Yes</p>
								<?php else: ?>
									<p>No</p>
								<?php endif; ?>
							</div>
						</div>

						<h3>Shipping Information</h3>
						<hr />

						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Order Status:</h5>
									<select class="form-control" form="update_order_form" name="order_status">
										<option value="1" <?php if($order->order_status == 1) { echo "selected"; } ?>>Need to Ship</option>
										<option value="2" <?php if($order->order_status == 2) { echo "selected"; } ?>>Shipped</option>
										<option value="3" <?php if($order->order_status == 3) { echo "selected"; } ?>>Refunded</option>
										<option value="4" <?php if($order->order_status == 4) { echo "selected"; } ?>>Buyer Returned</option>
									</select>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<h5 class="mb-2">Tracking Number:</h5>
									<input type="text" name="order_tracking_num" placeholder="LH4S438HDSQX" value="<?php echo e($order->order_tracking_num); ?>" class="form-control">
								</div>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Order" class="genric-btn primary large rounded center-button" style="font-size: 20px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>