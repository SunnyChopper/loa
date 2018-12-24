<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Product ID</th>
							<th>Main Image</th>
							<th>Name</th>
							<th>Views</th>
							<th>Adds to Cart</th>
							<th>Purchases</th>
							<th>Guest Purchases</th>
							<th>Member Purchases</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($product->id); ?></td>
									<td><img src="<?php echo e($product->featured_image_url); ?>" style="max-width: 125px;" class="regular-image"></td>
									<td><?php echo e($product->product_name); ?></td>
									<td><?php echo e($site_stats_helper->get_product_views($product->id)); ?></td>
									<td><?php echo e($site_stats_helper->get_product_adds_to_cart($product->id)); ?></td>
									<td><?php echo e($site_stats_helper->get_product_purchases($product->id)); ?></td>
									<td><?php echo e($site_stats_helper->get_product_guest_purchases($product->id)); ?></td>
									<td><?php echo e($site_stats_helper->get_product_member_purchases($product->id)); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>