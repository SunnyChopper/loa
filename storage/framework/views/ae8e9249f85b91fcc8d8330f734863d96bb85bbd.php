<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.posts.modals.delete-post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php if(count($posts) > 0): ?>
					<div style="overflow: auto;">
						<table class="table table-striped" style="text-align: center;">
							<thead>
								<th>Title</th>
								<th>Views</th>
								<th>Likes</th>
								<th>Status</th>
								<th>Created</th>
								<th></th>
							</thead>
							<tbody>
								<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td style="min-width: 150px;"><?php echo e($post->title); ?></td>
										<td style="min-width: 50px;"><?php echo e($post->views); ?></td>
										<td style="min-width: 50px;"><?php echo e($post->likes); ?></td>
										<td style="min-width: 50px;">
											<?php if($post->is_active == 1): ?>
												Published
											<?php elseif($post->is_active == 2): ?>
												In Draft
											<?php endif; ?>
										</td>
										<td style="min-width: 50px;"><?php echo e($post->created_at->format('M d, Y')); ?></td>
										<td style="min-width: 100px;"> 
											<a href="/admin/posts/edit/<?php echo e($post->id); ?>" class="genric-btn info small">Edit</a>
											<button id="<?php echo e($post->id); ?>" type="button" class="genric-btn danger small delete_post_button">Delete</button>
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

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$(".delete_post_button").on('click', function() {
			// Get post ID
			var post_id = $(this).attr('id');

			// Set ID for modal
			$("#post_id_delete_modal").val(post_id);

			// Show modal
			$("#delete_post_modal").modal();
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>