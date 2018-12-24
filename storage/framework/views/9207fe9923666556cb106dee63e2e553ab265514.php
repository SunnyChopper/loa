<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.products.modals.delete-product', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>Name</th>
							<th>Description</th>
							<th>Price</th>
							<th>Stock</th>
							<th>SKU</th>
							<th>Average Rating</th>
							<th># of Reviews</th>
							<th></th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($product->product_name); ?></td>
									<td><?php echo e($product->product_description); ?></td>
									<td>$<?php echo e($product->product_price); ?></td>
									<td><?php echo e($product->stock); ?></td>
									<td><?php echo e($product->sku); ?></td>
									<td><?php echo e($product->avg_rating); ?>/5</td>
									<td><?php echo e($product->reviews); ?></td>
									<td>
										<a href="/admin/products/edit/<?php echo e($product->id); ?>" class="genric-btn info small">Edit</a>
										<button id="<?php echo e($product->id); ?>" class="genric-btn danger small delete_product_button">Delete</button>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$(".delete_product_button").on('click', function() {
			// Get the product id
			var product_id = $(this).attr('id');

			// Change the hidden input value
			$("#product_id_delete_modal").val(product_id);

			// Show the modal
			$("#delete_product_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>