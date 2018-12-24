<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.events.modals.delete-event', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($events) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Name</th>
								<th>Description</th>
								<th>Location</th>
								<th>Start Time</th>
								<th>End Time</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td style="min-width: 50px;"><?php echo e($event->event_name); ?></td>
										<td style="min-width: 150px;"><?php echo e($event->event_description); ?></td>
										<td style="min-width: 100px;"><?php echo e($event->location); ?></td>
										<td style="min-width: 50px;"><?php echo e(Carbon\Carbon::parse($event->start_time)->format('M jS, Y \a\t H:i A')); ?></td>
										<td style="min-width: 50px;"><?php echo e(Carbon\Carbon::parse($event->end_date)->format('M jS, Y \a\t H:i A')); ?></td>
										<td style="min-width: 100px;"> 
											<a href="/admin/events/edit/<?php echo e($event->id); ?>" class="genric-btn info small">Edit</a>
											<button id="<?php echo e($event->id); ?>" type="button" class="genric-btn danger small delete_event_button">Delete</button>
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
								<h3 class="text-center">No Events</h3>
								<p class="text-center">Click below to create the first event.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/events/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Event</a>
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
		$(".delete_event_button").on('click', function() {
			// Get post ID
			var event_id = $(this).attr('id');

			// Set ID for modal
			$("#event_id_delete_modal").val(event_id);

			// Show modal
			$("#delete_event_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>