<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.voting-polls.modals.delete-voting-poll', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<?php if(count($polls) > 0): ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Option 1 Votes</th>
								<th>Option 2 Votes</th>
								<th>Option 3 Votes</th>
								<th>Option 4 Votes</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $polls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($poll->voting_option_1_votes); ?></td>
										<td><?php echo e($poll->voting_option_2_votes); ?></td>
										<td><?php echo e($poll->voting_option_3_votes); ?></td>
										<td><?php echo e($poll->voting_option_4_votes); ?></td>
										<td><?php echo e(Carbon\Carbon::parse($poll->start_date)->format('M jS, Y')); ?></td>
										<td><?php echo e(Carbon\Carbon::parse($poll->end_date)->format('M jS, Y')); ?></td>
										<td>
											<button id="delete_<?php echo e($poll->id); ?>" class="genric-btn danger small delete_voting_poll_button">Delete</button>
										</td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php else: ?>
				<div class="col-lg-8 offset-lg-2 col-md-10 offset-1 col-sm-12 col-12">
					<div class="well">
						<h3 class="text-center">No Polls</h3>
						<p class="text-center mt-8">Create your first voting poll and gain feedback from the audience.</p>
						<div class="row">
							<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-12">
								<a href="/admin/voting/new" class="genric-btn primary rounded" style="font-size: 14px;">Create Voting Poll</a>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$(".delete_voting_poll_button").on('click', function() {
			// Get the product id
			var voting_poll_id_string = $(this).attr('id');
			var voting_poll_id = voting_poll_id_string.replace("delete_", "");

			// Change the hidden input value
			$("#voting_poll_id_delete_modal").val(voting_poll_id);

			// Show the modal
			$("#delete_voting_poll_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>