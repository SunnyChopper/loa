<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
				<?php if(count($products) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<th>Product</th>
								<th></th>
								<th style='text-align: center;'>Quantity</th>
								<th style='text-align: center;'>Amount</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
										$product_helper->set_product_id($product["product_id"]);
										$product_info = $product_helper->get_product_by_id();
									?>
									<form action="/cart/delete/product" method="POST">
										<?php echo e(csrf_field()); ?>

										<input type="hidden" name="product_id" value="<?php echo e($product["product_id"]); ?>">
										<input type="hidden" name="num_items" value="<?php echo e($product["quantity"]); ?>">
										<input type="hidden" name="selectors" value="<?php echo e($product["selectors"]); ?>">
										<tr>
											<td align="center" style="vertical-align:middle; min-width: 80px; max-width: 80px;">
												<img src="<?php echo e($product_info["featured_image_url"]); ?>" class="regular-image">
											</td>

											<td style="vertical-align:middle;">
												<h4><?php echo e($product_info["product_name"]); ?></h4>
												<?php $selected = json_decode($product["selectors"], true); ?>
												<p class="mb-0">
													<?php $option_index = 0; $options = count($selected); ?>
													<?php $__currentLoopData = $selected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($option_index == ($options - 1)): ?>
															<small><?php echo e($option); ?></small>
														<?php else: ?>
															<small><?php echo e($option); ?>, </small>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</p>
											</td>

											<td align="center" style="vertical-align:middle;"><p><?php echo e($product["quantity"]); ?></p></td>
											<td align="center" style="vertical-align:middle;"><p class="text-center">$<?php echo e($product["subtotal"]); ?></p></td>
											<td align="center" style="vertical-align:middle;"><input type="submit" value="Delete" class="genric-btn small rounded primary"></td>
										</tr>
									</form>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<?php if($cart_helper->does_promo_code_exist_in_cart() == true): ?>
									<tr>
										<td></td>
										<td></td>
										<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>Savings Today</b></p></td>
										<?php $promo_code = $promo_code_helper->get_promo_code($cart_helper->get_promo_code()->code); ?>
										<?php if($promo_code->code_type == 1): ?>
											<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>-$<?php echo e(sprintf('%.2f', $promo_code->percent_off * $cart_helper->get_old_total())); ?></b></p></td>
										<?php else: ?>
											<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>-$<?php echo e(sprintf('%.2f', $promo_code->dollars_off)); ?></b></p></td>
										<?php endif; ?>
										<td></td>
									</tr>
								<?php endif; ?>

								<tr>
									<td></td>
									<td></td>
									<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>Total</b></p></td>
									<td align="center" style="vertical-align:middle;"><p class="mb-0"><b>$<?php echo e(sprintf('%.2f', $cart_helper->get_total())); ?></b></p></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<div class="well">
						<h5 class="text-center">Empty Cart...</h5>
						<p class="text-center">Click below to browse products</p>
						<div class="row">
							<a href="/shop" class="genric-btn primary small center-button rounded">View Ambition Shop</a>
						</div>
					</div>
				<?php endif; ?>
			</div>


			<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
				<?php if($cart_helper->does_promo_code_exist_in_cart() == false): ?>
					<div class="well">
						<h4 class="text-center">Got a Promo Code?</h4>
						<form action="/promo/attach" method="POST">
							<?php echo e(csrf_field()); ?>

							<div class="form-group row mt-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="text" name="promo_code" class="form-control<?php echo e(Session::has('promo_code_error') ? ' is-invalid' : ''); ?>" required>
								</div>
							</div>

							<?php if(Session::has('promo_code_error')): ?>
								<p class="red text-center mt-0 mb-0"><span role="alert"><?php echo e(Session::get('promo_code_error')); ?></span></p>
							<?php endif; ?>

							<?php if(Session::has('promo_code_success')): ?>
								<p class="green text-center mt-0 mb-0"><span role="alert"><?php echo e(Session::get('promo_code_success')); ?></span></p>
							<?php endif; ?>

							<div class="form-group row mt-8 mb-0">
								<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
									<input type="submit" value="Submit" class="genric-btn info center-button circle" style="font-size: 14px;" required>
								</div>
							</div>
						</form>
					</div>
				<?php else: ?>
					<div class="well">
						<h4 class="text-center">Got a Promo Code?</h4>
						<form action="/promo/delete" method="POST">
							<?php echo e(csrf_field()); ?>

							<div class="form-group row mt-8">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<input type="text" name="promo_code" class="form-control<?php echo e(Session::has('promo_code_error') ? ' is-invalid' : ''); ?>" value="<?php echo e($cart_helper->get_promo_code()->code); ?>" disabled>
								</div>
							</div>

							<?php if(Session::has('promo_code_error')): ?>
								<p class="red text-center mt-0 mb-0"><span role="alert"><?php echo e(Session::get('promo_code_error')); ?></span></p>
							<?php endif; ?>

							<?php if(Session::has('promo_code_success')): ?>
								<p class="green text-center mt-0 mb-0"><span role="alert"><?php echo e(Session::get('promo_code_success')); ?></span></p>
							<?php endif; ?>

							<div class="form-group row mt-8 mb-0">
								<div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 col-12">
									<input type="submit" value="Remove Promo Code" class="genric-btn danger center-button circle" style="font-size: 14px;" required>
								</div>
							</div>
						</form>
					</div>
				<?php endif; ?>

				<div class="well">
					<h3 class="text-center">Checkout</h3>
					<?php if($cart_helper->does_promo_code_exist_in_cart() == true): ?>
						<?php $promo_code = $promo_code_helper->get_promo_code($cart_helper->get_promo_code()->code); ?>
						<?php if($promo_code->code_type == 1): ?>
							<p class="mb-0 mt-0 text-center green"><small>You saved <?php echo e($promo_code->percent_off * 100); ?>% today!</small></p>
						<?php else: ?>
							<p class="mb-0 mt-0 text-center green"><small>You saved $<?php echo e($promo_code->dollars_off); ?> today!</small></p>
						<?php endif; ?>
					<?php else: ?>
					<?php endif; ?>
					<hr />
					<?php if($cart_helper->does_promo_code_exist_in_cart() == false): ?>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<h5 style="float: left;"><b>Today's Total: </b></h5>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								<h5 style="float: right;">$<?php echo e($cart_helper->get_total()); ?></h5>
							</div>
						</div>
					<?php else: ?>
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-6 col-6">
								<h5 style="float: left;"><b>Today's Old Total: </b></h5>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<h5 style="float: right;"><strike>$<?php echo e($cart_helper->get_old_total()); ?></strike></h5>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-8 col-md-8 col-sm-6 col-6">
								<h5 style="float: left;"><b>Today's New Total: </b></h5>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<h5 style="float: right;">$<?php echo e(sprintf('%.2f', $cart_helper->get_total())); ?></h5>
							</div>
						</div>
					<?php endif; ?>

					<?php if(count($products) > 0): ?>
						<a href="/checkout" class="genric-btn primary circle large center-button mt-32 mb-16" style="font-size: 16px;">Continue to Checkout <span class="lnr lnr-arrow-right"></span></a>
						<div class="row">
							<a href="/cart/delete/all" class="genric-btn danger circle center-button small">Delete All from Cart</a>
						</div>
					<?php else: ?>
						<button class="genric-btn disabled circle large center-button mt-32 mb-16" style="font-size: 16px;" disabled="">Add Items to Cart </a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>