<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.promo-codes.modals.delete-promo-code-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($promo_codes) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Code</th>
								<th>Code Type</th>
								<th>Percent Off</th>
								<th>Dollars Off</th>
								<th>Minimum Amount</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $promo_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($code->code); ?></td>
										<?php if($code->code_type == 1): ?>
											<td>Percent Off</td>
										<?php else: ?>
											<td>Dollars Off</td>
										<?php endif; ?>

										<?php if($code->code_type == 1): ?>
											<td><?php echo e($code->percent_off * 100); ?>%</td>
										<?php else: ?>
											<td>N/A</td>
										<?php endif; ?>

										<?php if($code->code_type == 1): ?>
											<td>N/A</td> 
										<?php else: ?>
											<td>$<?php echo e($code->dollars_off); ?></td>
										<?php endif; ?>

										<?php if($code->code_type == 1): ?>
											<td>N/A</td> 
										<?php else: ?>
											<td>$<?php echo e($code->minimum_amount); ?></td>
										<?php endif; ?>

										<td style="min-width: 150px;"><?php echo e($code->created_at->format('M d, Y')); ?></td>
										<td style="min-width: 250px;"> 
											<a href="/admin/promo/edit/<?php echo e($code->id); ?>" class="genric-btn info small">Edit</a>
											<button id="<?php echo e($code->id); ?>" type="button" class="genric-btn danger small delete_promo_code_button">Delete</button>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Promo Codes on Site</h3>
								<p class="text-center">Click below to get started on creating the first promo code.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/promo/new" class="genric-btn primary rounded center-button" style="font-size: 14px;">Create New Promo Code</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$(".delete_promo_code_button").on('click', function() {
			// Get post ID
			var promo_id = $(this).attr('id');

			// Set ID for modal
			$("#promo_code_id_delete_modal").val(promo_id);

			// Show modal
			$("#delete_promo_code_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>