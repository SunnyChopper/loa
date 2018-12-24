<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="container p-32 mt-32 mb-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-8 mb-8">
				<img src="<?php echo e($product->featured_image_url); ?>" class="regular-image">
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-8 mb-8 p-32" style="border: 2px solid #EEEEEE;">
				<form id="add_to_cart_form" action="/cart/add" method="POST">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
					<h3><?php echo e($product->product_name); ?></h3>
					<hr />
					<p><?php echo e($product->product_description); ?></p>
					<h3 class="mb-16 green">$<?php echo e($product->product_price); ?></h3>

					<?php 
						$selectors = json_decode($product->selectors);
						$loop_index = 0;
					?>

					<?php $__currentLoopData = $selectors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selector=>$options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="default-select mb-16" id="default-select">
							<select form="add_to_cart_form" name="<?php echo e($selector); ?>" style="display: none;">
								<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<div class="nice-select" tabindex="0" style="border: 1px solid #EDEDED;">
								<span class="current"><?php echo e($options[0]); ?></span>
								<ul class="list">
									<?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li data-value="<?php echo e($option); ?>" class="option"><?php echo e($option); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<p class="mb-0">Number of item:</p>
					<div class="default-select mb-16" id="default-select">
						<select form="add_to_cart_form" name="num_items" style="display: none;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
						</select>
						<div class="nice-select" tabindex="0" style="border: 1px solid #EDEDED;">
							<span class="current">1</span>
							<ul class="list">
								<li data-value="1" class="option selected">1</li>
								<li data-value="2" class="option">2</li>
								<li data-value="3" class="option">3</li>
							</ul>
						</div>
					</div>


					<button id="add_to_cart_button" class="genric-btn primary circle large mt-8" style="font-size: 16px;">Add to Cart <span class="lnr lnr-cart"></span></button>
				</form>

				<div class="row mt-32">
					<div class="col-lg-4 col-md-4 col-sm-5 col-6">
						<img src="https://www.veravalonline.com/wp-content/uploads/ssl-secure.png" class="regular-image">
					</div>
					<div class="col-lg-5 col-md-6 col-sm-7 col-6">
						<img src="https://cdn.shopify.com/s/files/1/2581/7362/files/999999999.png?1496325821189209333" class="regular-image">
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>