@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
				<div class="well">
					<form method="post" action="/admin/login">
						@csrf
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Username:</h5>
									<input type="text" name="username" class="form-control{{ \Session::has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}" autofocus required>
									@if (\Session::has('username'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ \Session::get('username') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Password:</h5>
									<input type="password" name="password" class="form-control{{ \Session::has('password') ? ' is-invalid' : '' }}" required>
									@if (\Session::has('password'))
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ \Session::get('password') }}</strong>
	                                    </span>
	                                @endif
								</div>
							</div>

							@if (\Session::has('backend_auth_error'))
								<p>
	                                <span class="invalid-feedback" role="alert">
	                                    <strong>{{ \Session::get('backend_auth_error') }}</strong>
	                                </span>
	                            </p>
                            @endif

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="submit" value="Login" class="genric-btn primary rounded" style="font-size: 16px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection