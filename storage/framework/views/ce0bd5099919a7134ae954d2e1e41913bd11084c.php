<!-- Modal -->
<div class="modal fade" id="delete_voting_poll_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/poll/delete" method="POST">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" name="voting_poll_id" id="voting_poll_id_delete_modal" required>
				<div class="modal-header">
					<h5 class="modal-title">Are you sure?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>You are about to delete this voting poll, are you sure?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="genric-btn info" data-dismiss="modal" style="font-size: 14px;">Close</button>
					<input type="submit" value="Delete" class="genric-btn danger" style="font-size: 14px;">
				</div>
			</form>
		</div>
	</div>
</div>