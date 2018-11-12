@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
					<a class="nav-link" id="v-pills-notifications-tab" data-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false">Notifications</a>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<form>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h4>Edit Profile</h4>
									<hr />
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>First Name:</label>
										<input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="form-control" required>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Last Name:</label>
										<input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="form-control" required>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Display Username:</label>
										<input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control" required>
									</div>
								</div>

								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="form-group">
										<label>Email:</label>
										<input type="text" value="{{ Auth::user()->email }}" class="form-control" disabled>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 col-md-5 col-sm-6 col-12">
									<button type="button" class="genric-btn primary rounded" style="font-size: 16px;">Update Profile</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab-tab">
						<form>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<h4>Edit Email Notifications</h4>
									<hr />
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<ul class="list-group">
										<li class="list-group-item notification_option" id="1">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-12">
													<input id="#checkbox_1" type="checkbox" style="display: inline-block;">
													<p class="mb-0" style="display: inline-block; margin-left: 4px;">Get notified when new blog post published</p>
												</div>
											</div>
										</li>

										<li class="list-group-item notification_option" id="2">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-12">
													<input id="#checkbox_2" type="checkbox" style="display: inline-block;">
													<p class="mb-0" style="display: inline-block; margin-left: 4px;">Get notified when new course published</p>
												</div>
											</div>
										</li>

										<li class="list-group-item notification_option" id="3">
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 col-12">
													<input id="#checkbox_3" type="checkbox" style="display: inline-block;">
													<p class="mb-0" style="display: inline-block; margin-left: 4px;">Get notified when new book discussion published</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<div class="row mt-16">
								<div class="col-lg-4 col-md-5 col-sm-6 col-12">
									<button type="button" class="genric-btn primary rounded" style="font-size: 16px;">Update Notifications</button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
					<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
				</div>
			</div>
		</div>
	</div>
@endsection