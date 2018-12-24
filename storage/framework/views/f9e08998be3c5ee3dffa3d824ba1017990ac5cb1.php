<!-- Modal -->
<div class="modal fade" id="delete_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/admin/users/delete" method="post">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" name="user_id" id="user_id_delete_modal" required>
				<div class="modal-header">
					<h5 class="modal-title">Are you sure?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>You are about to delete this user, are you sure?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="genric-btn info" data-dismiss="modal" style="font-size: 14px;">Close</button>
					<input type="submit" value="Delete" class="genric-btn danger" style="font-size: 14px;">
				</div>
			</form>
		</div>
	</div>
</div>