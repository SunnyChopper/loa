<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.posts.modals.delete-post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($courses) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Title</th>
								<th>Description</th>
								<th>Members</th>
								<th>Videos</th>
								<th>Status</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($course->course_title); ?></td>
										<td><?php echo e($course->course_description); ?></td>
										<td><?php echo e($course->course_members); ?></td>
										<td><?php echo e($course->course_num_videos); ?></td>
										<?php if($course->course_status == 1): ?>
											<td>In Draft</td>
										<?php elseif($course->course_status == 2): ?>
											<td>Coming Soon</td>
										<?php else: ?>
											<td>Published</td>
										<?php endif; ?>
										<td style="min-width: 150px;"><?php echo e($course->created_at->format('M d, Y')); ?></td>
										<td style="min-width: 250px;">
											<?php if($course_helper->is_user_an_instructor($course->id, Auth::id())): ?>
												<a href="/admin/courses/edit/<?php echo e($course->id); ?>" class="genric-btn info small">Edit</a>
												<button id="<?php echo e($course->id); ?>" type="button" class="genric-btn danger small delete_course_button">Delete</button>
											<?php endif; ?>
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
								<h3 class="text-center">No Courses on Site</h3>
								<p class="text-center">Click below to get started on creating your first course.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/courses/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Course</a>
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
		$(".delete_course_button").on('click', function() {
			// Get post ID
			var course_id = $(this).attr('id');

			// Set ID for modal
			$("#course_id_delete_modal").val(course_id);

			// Show modal
			$("#delete_course_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>