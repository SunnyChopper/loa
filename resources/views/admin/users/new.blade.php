@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
				<form action="/admin/users/create" method="post">
					{{ csrf_field() }}
					<div class="well">
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
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Username:</label>
									<input type="text" name="username" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<label>Password:</label>
									<input type="password" name="password" class="form-control" required>
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

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Backend Role:</label>
									<select class="form-control" name="backend_auth">
										<option value="0">None</option>
										<option value="1">Full Adminstrator</option>
										<option value="2">Administrative Assistant</option>
										<option value="3">Guest Writer</option>
										<option value="4">Data Analyst</option>
										<option value="5">Course Assistant</option>
										<option value="6">Customer Support</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<input type="submit" value="Create User" class="genric-btn primary rounded center-button mb-0" style="font-size: 16px;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
