<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.events.modals.view-event-signups', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($events) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Name</th>
								<th>Description</th>
								<th>Views</th>
								<th>Attending</th>
								<th>Guests</th>
								<th>Members</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($event->event_name); ?></td>
										<td><?php echo e($event->event_description); ?></td>
										<td><?php echo e($site_stats_helper->get_event_views($event->id)); ?></td>
										<td><?php echo e($site_stats_helper->get_event_attendees($event->id)); ?></td>
										<td><?php echo e($site_stats_helper->get_event_guest_attendees($event->id)); ?></td>
										<td><?php echo e($site_stats_helper->get_event_member_attendees($event->id)); ?></td>
										<td> 
											<button id="<?php echo e($event->id); ?>" type="button" class="genric-btn primary small view_signups_button">View List</button>
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
		$(".view_signups_button").on('click', function() {
			// Get post ID
			var event_id = $(this).attr('id');

			// Clean out the table
			$("#event_signups_table_body").html('');

			// AJAX to get data
			$.ajax({
				url: '/events/signups/' + event_id,
				method: 'GET',
				success: function(data) {
					// Get and parse data
					var signups_data = JSON.parse(data);

					// Populate table
					for (var i = 0; i < signups_data.length; i++) {
						var appending_html = "<tr><td>" + signups_data[i]["first_name"] + " " + signups_data[i]["last_name"] + "</td><td>" + signups_data[i]["email"] + "</td></tr>";
						$("#event_signups_table_body").append(appending_html);
					}

					// Show modal
					$("#view_event_modal").modal();
				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>