<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<img src="<?php echo e($post->featured_image_url); ?>" class="regular-image mb-16">
				<div id="post-body">
					<?php echo $post->post_body; ?>

				</div>
				<hr />
				<p><small>Written by <?php echo e($post->author_first_name); ?> on <?php echo e($post->created_at->format('F jS, Y')); ?></small>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				

				
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>