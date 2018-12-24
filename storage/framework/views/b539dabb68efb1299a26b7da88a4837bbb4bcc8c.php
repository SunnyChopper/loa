<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<h1 class="text-center">Thank You!</h1>
				<p class="text-center">Here's your order details:</p>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<table class="table table-striped">
					<thead>
						<th>Product</th>
						<th></th>
						<th style="text-align: center;">Quantity</th>
						
					</thead>
					<tbody>

							<?php $__currentLoopData = Session::get('purchased_products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$product_helper->set_product_id($product["product_id"]);
									$product_info = $product_helper->get_product_by_id();
								?>
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
									
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>