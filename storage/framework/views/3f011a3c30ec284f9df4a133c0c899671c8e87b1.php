<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.users.modals.edit-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.users.modals.delete-user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div style="overflow: auto;">
					<table class="table table-striped" style="text-align: center;">
						<thead>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Last Login Time</th>
							<th>Number of Logins</th>
							<th>Backend Role</th>
							<th>Created on</th>
							<th></th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$backend_role = "";
									switch($user->backend_auth) {
										case 0:
											$backend_role = "None";
											break;
										case 1:
											$backend_role = "Full Administrator";
											break;
										case 2:
											$backend_role = "Administrative Assistant";
											break;
										case 3:
											$backend_role = "Guest Writer";
											break;
										case 4:
											$backend_role = "Data Analyst";
											break;
										case 5:
											$backend_role = "Course Assistant";
											break;
										case 6:
											$backend_role = "Customer Support";
											break;
										default:
											break;
									}
								?>
								<tr>
									<td><?php echo e($user->id); ?></td>
									<td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
									<td><?php echo e($user->email); ?></td>
									<td><?php echo e($user->last_login_time); ?></td>
									<td><?php echo e($user->number_of_logins); ?></td>
									<td><?php echo e($backend_role); ?></td>
									<td><?php echo e($user->created_at->format('g:i:s a \o\n M jS, Y')); ?></td>
									<td>
										<button id="edit_<?php echo e($user->id); ?>" class="genric-btn info small edit_user_button">Edit</button>
										<button id="delete_<?php echo e($user->id); ?>" class="genric-btn danger small delete_user_button">Delete</button>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<?php echo e($users->links()); ?>

			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$(".delete_user_button").on('click', function() {
			// Get the product id
			var user_id_string = $(this).attr('id');
			var user_id = user_id_string.replace("delete_", "");

			// Change the hidden input value
			$("#user_id_delete_modal").val(user_id);

			// Show the modal
			$("#delete_user_modal").modal();
		});


		$(".edit_user_button").on('click', function() {
			// Get the product id
			var user_id_string = $(this).attr('id');
			var user_id = user_id_string.replace("edit_", "");

			// Change the hidden input value
			$("#user_id_edit_modal").val(user_id);

			// Get data from AJAX
			$.ajax({
				url: '/admin/users/id/' + user_id,
				method: 'get',
				success: function(data) {
					var json = JSON.parse(data);

					// Set elements
					$("#edit_modal_first_name").val(json["first_name"]);
					$("#edit_modal_last_name").val(json["last_name"]);
					$("#edit_modal_email").val(json["email"]);
					$("#edit_modal_backend_auth").val(json["backend_auth"]);

					// Show the modal
					$("#edit_user_modal").modal();
				}
			});
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>