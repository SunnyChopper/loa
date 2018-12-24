<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form action="/admin/events/update" method="POST" id="update_event_form">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" value="<?php echo e($event->id); ?>" name="event_id">
					<div class="well">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-12">
								<div class="form-group">
									<label>Event Name:</label>
									<input type="text" name="event_name" value="<?php echo e($event->event_name); ?>" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Event Location:</label>
									<input type="text" name="event_location" value="<?php echo e($event->location); ?>" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Event Description:</label>
									<textarea name="event_description" form="update_event_form" class="form-control" rows="5"><?php echo e($event->event_description); ?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Start Time:</label>
									<input type="datetime-local" name="start_time" value="<?php echo e(Carbon\Carbon::parse($event->start_time)->format('Y-m-d\TH:i:s')); ?>" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>End Time:</label>
									<input type="datetime-local" name="end_date" value="<?php echo e(Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i:s')); ?>" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12 col-12">
								<input type="submit" value="Update Event" class="genric-btn rounded primary center-button" style="font-size: 16px;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>