<!-- Modal -->
<div class="modal fade" id="rsvp_event_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="/admin/events/rsvp" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="event_id" id="event_id_rsvp_modal" required>
				<div class="modal-header">
					<h5 class="modal-title">RSVP to Event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<label>First Name:</label>
								<input type="text" name="first_name" class="form-control" required>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<label>Last Name:</label>
								<input type="text" name="last_name" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="genric-btn info" data-dismiss="modal" style="font-size: 14px;">Close</button>
					<input type="submit" value="RSVP" class="genric-btn primary" style="font-size: 14px;">
				</div>
			</form>
		</div>
	</div>
</div>