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
								<th>Guest Adds</th>
								<th>Guest Removals</th>
								<th>Guest Usage</th>
								<th>Guest Revenue Lost</th>
								<th>Member Adds</th>
								<th>Member Removals</th>
								<th>Member Usage</th>
								<th>Member Revenue Lost</th>
								<th>Total Adds</th>
								<th>Total Removals</th>
								<th>Total Usage</th>
								<th>Total Revenue Lost</th>
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
										<td><?php echo e($site_stats_helper->promo_code_get_guest_addition($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_guest_removal($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_guest_usage($code->id)); ?></td>
										<td>$<?php echo e(sprintf("%.2f", $site_stats_helper->promo_code_get_guest_revenue_lost($code->id))); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_member_addition($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_member_removal($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_member_usage($code->id)); ?></td>
										<td>$<?php echo e(sprintf("%.2f", $site_stats_helper->promo_code_get_member_revenue_lost($code->id))); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_guest_addition($code->id) + $site_stats_helper->promo_code_get_member_addition($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_guest_removal($code->id) + $site_stats_helper->promo_code_get_member_removal($code->id)); ?></td>
										<td><?php echo e($site_stats_helper->promo_code_get_total_usage($code->id)); ?></td>
										<td>$<?php echo e(sprintf("%.2f", $site_stats_helper->promo_code_get_total_revenue_lost($code->id))); ?></td>
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
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>