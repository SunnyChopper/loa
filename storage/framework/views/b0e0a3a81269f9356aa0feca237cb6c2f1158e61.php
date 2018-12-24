<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($posts) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Post ID</th>
								<th>Title</th>
								<th>Views</th>
								<th>Likes</th>
								<th>Link Clicks</th>
								<th>Member Signups</th>
								<th>Created</th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($post->id); ?></td>
										<td><?php echo e($post->title); ?></td>
										<td><?php echo e($post->views); ?></td>
										<td><?php echo e($post->likes); ?></td>
										<td><?php echo e($site_stats_helper->get_blog_post_link_clicks($post->id)); ?></td>
										<td><?php echo e($site_stats_helper->get_blog_post_member_signups($post->id)); ?></td>
										<td><?php echo e($post->created_at->format('F jS, Y')); ?></td>
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
				<?php else: ?>
					<div class="well">
						<div class="row">
							<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
								<h3 class="text-center">No Active Blog Posts</h3>
								<p class="text-center">Click below to get started on writing your first blog post.</p>
								<div class="row">
									<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 col-12">
										<a href="/admin/posts/new" class="genric-btn primary rounded center-button" style="font-size: 16px;">Create New Post</a>
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