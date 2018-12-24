<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<table class="table table-striped" style="text-align: center; display: table;">
				<thead>
					<tr>
						<th style="text-align: left;">Book</th>
						<th></th>
						<th>Posts</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php $__currentLoopData = $book_discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="max-width: 100px;" class="center-table-cell">
								<img src="<?php echo e($discussion->book_image_url); ?>" class="regular-image">
							</td>
							<td class="center-table-cell"><?php echo e($discussion->book_title); ?></td>
							<td class="center-table-cell"><?php echo e($discussion->num_posts); ?></td>
							<td class="center-table-cell"><?php echo e(Carbon\Carbon::parse($discussion->start_date)->format('M jS, Y')); ?></td>
							<td class="center-table-cell"><?php echo e(Carbon\Carbon::parse($discussion->end_date)->format('M jS, Y')); ?></td>
							<td class="center-table-cell">
								<a href="/admin/discussions/edit/<?php echo e($discussion->id); ?>" class="genric-btn rounded info">Edit</a>
								<button class="genric-btn danger rounded">Delete</button>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$("")
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>