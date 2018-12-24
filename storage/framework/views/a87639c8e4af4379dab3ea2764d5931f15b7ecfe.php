<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-12 col-12">
				<div class="discussion-post">
					<form id="create_discussion_post_form" action="/discussion/post/create" method="POST">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="book_discussion_id" value="<?php echo e($book->id); ?>">
						<div class="row mb-16">
							<div class="col-lg-2 col-md-2 col-sm-3 col-3">
								<?php if($user->profile_image_url != ""): ?>
									<img src="<?php echo e($user->profile_image_url); ?>" class="regular-image circle-image">
								<?php else: ?>
									<img src="https://www.chaarat.com/wp-content/uploads/2017/08/placeholder-user.png" class="regular-image circle-image">
								<?php endif; ?>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-12 col-12">
								<h5 class="mb-2">Create New Post</h5>
								<textarea name="post_body" rows="3" form="create_discussion_post_form" class="form-control"></textarea>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<input type="submit" value="Create Post" class="genric-btn primary small rounded mb-0" style="float: right;">
							</div>
						</div>
					</form>
				</div>

				<hr class="mt-32 mb-32" />
				
				<?php if(count($posts) > 0): ?>
					<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="row discussion-post">
							<div class="col-lg-2 col-md-2 col-sm-4 col-4 discussion-profile">
								<?php if($user_helper->get_user_profile_image_url_by_id($post->post_owner_id) != ""): ?>
									<a href=""><img src="<?php echo e($user_helper->get_user_profile_image_url_by_id($post->post_owner_id)); ?>" class="regular-image circle-image"></a>
								<?php else: ?>
									<img src="https://www.chaarat.com/wp-content/uploads/2017/08/placeholder-user.png" class="regular-image circle-image">
								<?php endif; ?>
								<p class="mb-0 mt-2 text-center"><a href="" class="black-link"><?php echo e($user_helper->get_user_first_name_by_id($post->post_owner_id)); ?> <?php echo e($user_helper->get_user_last_name_by_id($post->post_owner_id)); ?></a></p>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-8 discussion-body">
								<p><?php echo e($post->post_body); ?></p>
								<p class="mb-0"><small><?php echo e($post->created_at->format('M jS, Y \a\t h:i A')); ?></small></p>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<?php echo e($posts->links()); ?>

						</div>
					</div>
				<?php else: ?>
					<h4 style="color: #C0C0C0;" class="text-center mt-64">No posts yet...be the first one!</h4>
				<?php endif; ?>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-12 col-12">
				<div class="well">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<img src="<?php echo e($book->book_image_url); ?>" class="regular-image">
							<h5 class="text-center mt-16 mb-0"><?php echo e($book->book_title); ?></h5>
							<p class="text-center"><small><?php echo e(Carbon\Carbon::parse($book->start_date)->format('M jS')); ?> to <?php echo e(Carbon\Carbon::parse($book->end_date)->format('M jS')); ?></small></p>
							<?php if($book->book_description != ""): ?>
								<hr />
								<p class="text-center"><?php echo e($book->book_description); ?></p>
							<?php endif; ?>

							<?php if($book->book_amazon_link != ""): ?>
								<a href="<?php echo e( ); ?>" class="genric-btn rounded small primary center-button">Get Book</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>