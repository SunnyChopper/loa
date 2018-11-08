@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	@include('admin.users.modals.edit-user')
	@include('admin.users.modals.delete-user')
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
							@foreach($users as $user)
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
									<td>{{ $user->id }}</td>
									<td>{{ $user->first_name }} {{ $user->last_name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->last_login_time }}</td>
									<td>{{ $user->number_of_logins }}</td>
									<td>{{ $backend_role }}</td>
									<td>{{ $user->created_at->format('g:i:s a \o\n M jS, Y') }}</td>
									<td>
										<button id="edit_{{ $user->id }}" class="genric-btn info small edit_user_button">Edit</button>
										<button id="delete_{{ $user->id }}" class="genric-btn danger small delete_user_button">Delete</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				{{ $users->links() }}
			</div>
		</div>
	</div>
@endsection

@section('page_js')
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
@endsection