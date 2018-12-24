<!-- Modal -->
<div class="modal fade" id="edit_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/admin/users/edit" method="post">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" name="user_id" id="user_id_edit_modal" required>
				<div class="modal-header">
					<h5 class="modal-title">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<label>First Name:</label>
								<input type="text" id="edit_modal_first_name" class="form-control" name="first_name" disabled>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<label>Last Name:</label>
								<input type="text" id="edit_modal_last_name" class="form-control" name="last_name" disabled>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" id="edit_modal_email" class="form-control" name="email" disabled>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<div class="form-group">
								<label>Backend Role:</label>
								<select id="edit_modal_backend_auth" class="form-control" name="backend_auth">
									<option value="0">None</option>
									<option value="1">Full Administrator</option>
									<option value="2">Administrative Assistant</option>
									<option value="3">Guest Writer</option>
									<option value="4">Data Analyst</option>
									<option value="5">Course Assistant</option>
									<option value="6">Customer Support</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="genric-btn info" data-dismiss="modal" style="font-size: 14px;">Close</button>
					<input type="submit" value="Update" class="genric-btn primary" style="font-size: 14px;">
				</div>
			</form>
		</div>
	</div>
</div>