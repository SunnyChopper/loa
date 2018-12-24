<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 col-12">
				<?php if($user->profile_image_url != ""): ?>
					<img src="<?php echo e($user->profile_image_url); ?>" class="regular-image">
				<?php else: ?>
					<img src="https://www.chaarat.com/wp-content/uploads/2017/08/placeholder-user.png" class="regular-image">
				<?php endif; ?>
				<hr />
				<p class="mb-0"><b>Joined on:</b> <?php echo e(Carbon\Carbon::parse($user->created_at)->format('M jS, Y')); ?></p>
			</div>

			<div class="col-lg-9 col-md-8 col-sm-12 col-12">
				<section id="enrolled_courses">
					<h4>Courses Enrolled In</h4>
					<div class="mt-8" style="padding: 24px; border: 2px solid #EAEAEA;">
						<div class="row">
							<?php if(count($courses) > 0): ?>
								<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php $c = $course_helper->get_course_by_id($course->id); ?>
									<div class="col-lg-4 col-md-4 col-sm-12 col-12">
										<img src="<?php echo e($c->course_image_url); ?>" class="regular-image">
										<h5 class="mt-16 text-center"><?php echo e($c->course_title); ?></h5>
										<p class="mb-0 text-center"><small>Enrolled on <?php echo e($course->created_at->format('M js, Y')); ?></small></p>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php else: ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="text-center">Not enrolled in any course yet...</h6>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>

				<section id="enrolled_tools" class="mt-32">
					<h4>Tools Enrolled In</h4>
					<div class="mt-8" style="padding: 24px; border: 2px solid #EAEAEA;">
						<div class="row">
							<?php if(count($courses) > 0): ?>
								<div class="col-lg-4 col-md-4 col-sm-12 col-12">
									<img src="https://ksassets.timeincuk.net/wp/uploads/sites/55/2017/08/Deadmau5-GettyImages-672874542-920x584.jpg" class="regular-image">
									<h5 class="mt-16 text-center">EDM Mastery</h5>
									<p class="mb-0 text-center"><small>Enrolled on November 7th, 2018</small></p>
								</div>
							<?php else: ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h6 class="text-center">Not enrolled in any tools yet...</h6>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</section>

				
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>