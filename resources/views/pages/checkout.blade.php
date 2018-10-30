@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	
	<div class="container mt-64 mb-64">
		<div class="row">
			
			<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
				<form>
					<h3>Step 1: Contact Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">First Name<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="text" name="first_name" class="form-control" autofocus required>
								@else
									<input type="text" name="first_name" value="{{ Auth::user()->first_name }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Last Name:</h5>
								@if(Auth::guest())
									<input type="text" name="last_name" class="form-control" autofocus required>
								@else
									<input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Email<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="email" name="email" class="form-control" autofocus required>
								@else
									<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>
					</div>

					<h3 class="mt-32">Step 2: Billing Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Address<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="text" name="first_name" class="form-control" autofocus required>
								@else
									<input type="text" name="first_name" value="{{ Auth::user()->address }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">State/Province<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="text" name="last_name" class="form-control" autofocus required>
								@else
									<input type="text" name="last_name" value="{{ Auth::user()->state }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Country<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="text" name="country" class="form-control" autofocus required>
								@else
									<input type="text" name="country" value="{{ Auth::user()->country }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Zipcode<span class="red">*</span>:</h5>
								@if(Auth::guest())
									<input type="text" name="zipcode" class="form-control" autofocus required>
								@else
									<input type="text" name="zipcode" value="{{ Auth::user()->zipcode }}" class="form-control" autofocus required>
								@endif
							</div>
						</div>
					</div>

					<h3 class="mt-32">Step 3: Billing Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-8 col-md-8 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Card Number<span class="red">*</span>:</h5>
								<input type="text" name="" class="form-control" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="form-group">
								<h5 class="mb-2">Expiry Month<span class="red">*</span>:</h5>
								<select class="form-control">
									<option value="01">01 - Jan</option>
									<option value="02">02 - Feb</option>
									<option value="03">03 - Mar</option>
									<option value="04">04 - Apr</option>
									<option value="05">05 - May</option>
									<option value="06">06 - Jun</option>
									<option value="07">07 - Jul</option>
									<option value="08">08 - Aug</option>
									<option value="09">09 - Sep</option>
									<option value="10">10 - Oct</option>
									<option value="11">11 - Nov</option>
									<option value="12">12 - Dec</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="form-group">
								<h5 class="mb-2">Expiry Year<span class="red">*</span>:</h5>
								<select class="form-control">
									<option value="18">2018</option>
									<option value="19">2019</option>
									<option value="20">2020</option>
									<option value="21">2021</option>
									<option value="22">2022</option>
									<option value="23">2023</option>
									<option value="24">2024</option>
									<option value="25">2025</option>
									<option value="26">2026</option>
									<option value="27">2027</option>
									<option value="28">2028</option>
									<option value="29">2029</option>
									<option value="30">2030</option>
									<option value="31">2031</option>
									<option value="32">2032</option>
									<option value="33">2033</option>
									<option value="34">2034</option>
									<option value="35">2035</option>
								</select>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">CVV Number<span class="red">*</span>:</h5>
								<input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="{{ old('card_number') }}" required>
                                @if ($errors->has('card_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cvvNumber') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>
					</div>
				</form>
			</div>
			

			<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
				<div class="well">
					<h3 class="text-center">Checkout</h3>
					<p class="text-center mb-0"><small>Fields with <span class="red">*</span> are required</small></p>
					<hr />
					<div class="row mb-8">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: left;"><b>Subtotal: </b></h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: right;">$99.98</h5>
						</div>
					</div>
					<hr />

					<div class="row mb-8">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: left;"><b>Shipping: </b></h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: right;">$0.00</h5>
						</div>
					</div>
					<hr />

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: left;"><b>Today's Total: </b></h5>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-6">
							<h5 style="float: right;">$99.98</h5>
						</div>
					</div>

					<div class="row p-2 mt-32" style="background-color: white; border-radius: 8px; border-bottom: 4px solid #E0E0E0;">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p class="text-center mb-0">Expected Arrival Date: <br><b>October 29th, 2018</b></p>
						</div>
					</div>

					<a href="/checkout" class="genric-btn primary circle large center-button mt-16 mb-0" style="font-size: 16px;">Complete Purchase <span class="lnr lnr-arrow-right"></span></a>
				</div>
			</div>
		</div>
	</div>
@endsection