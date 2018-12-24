<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<div class="container mt-64 mb-64">
		<form action="/cart/checkout" method="POST" id="checkout_form">
			<?php echo e(csrf_field()); ?>

			<div class="row">
				<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
					<h3>Step 1: Contact Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">First Name<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_first_name" class="form-control" autofocus required>
								<?php else: ?>
									<input type="text" name="order_first_name" value="<?php echo e(Auth::user()->first_name); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Last Name:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_last_name" class="form-control" autofocus required>
								<?php else: ?>
									<input type="text" name="order_last_name" value="<?php echo e(Auth::user()->last_name); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Email<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="email" name="order_email" class="form-control" required>
								<?php else: ?>
									<input type="email" name="order_email" value="<?php echo e(Auth::user()->email); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<h3 class="mt-32">Step 2: Shipping Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-8 col-md-8 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Address<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_address" class="form-control" required>
								<?php else: ?>
									<input type="text" name="order_address" value="<?php echo e(Auth::user()->address); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">City<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_city" class="form-control" required>
								<?php else: ?>
									<input type="text" name="order_city" value="<?php echo e(Auth::user()->city); ?>" class="form-control" required>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">State/Province<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_state" class="form-control" required>
								<?php else: ?>
									<input type="text" name="order_state" value="<?php echo e(Auth::user()->state); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Country<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_country" class="form-control" required>
								<?php else: ?>
									<input type="text" name="order_country" value="<?php echo e(Auth::user()->country); ?>" class="form-control" autofocus required>
								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Zipcode<span class="red">*</span>:</h5>
								<?php if(Auth::guest()): ?>
									<input type="text" name="order_zipcode" class="form-control" autofocus required>
								<?php else: ?>
									<input type="text" name="order_zipcode" value="<?php echo e(Auth::user()->zipcode); ?>" class="form-control" required>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<h3 class="mt-32">Step 3: Billing Information</h3>
					<hr />
					<div class="row">
						<div class="col-lg-8 col-md-8 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">Card Number<span class="red">*</span>:</h5>
								<input type="text" name="card_number" value="<?php echo e(old('card_number')); ?>" class="form-control" required>
								<?php if($errors->has('card_number')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('card_number')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="form-group">
								<h5 class="mb-2">Expiry Month<span class="red">*</span>:</h5>
								<select id="ccExpiryMonth" form="checkout_form" name="ccExpiryMonth" class="form-control">
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

								<?php if($errors->has('ccExpiryMonth')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ccExpiryMonth')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-6 col-6">
							<div class="form-group">
								<h5 class="mb-2">Expiry Year<span class="red">*</span>:</h5>
								<select id="ccExpiryYear" form="checkout_form" name="ccExpiryYear" class="form-control">
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

								<?php if($errors->has('ccExpiryYear')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('ccExpiryYear')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12 col-12">
							<div class="form-group">
								<h5 class="mb-2">CVV Number<span class="red">*</span>:</h5>
								<input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="<?php echo e(old('card_number')); ?>" required>
								<?php if($errors->has('cvvNumber')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('cvvNumber')); ?></strong>
									</span>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				

				<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
					<div class="well">
						<h3 class="text-center">Checkout</h3>
						<p class="text-center mb-0"><small>Fields with <span class="red">*</span> are required</small></p>
						<hr />
						<div class="row mb-8">
							<div class="col-lg-8 col-md-8 col-sm-6 col-6">
								<h5 style="float: left;"><b>Subtotal: </b></h5>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<?php if($cart_helper->does_promo_code_exist_in_cart() == true): ?>
									<h5 style="float: right;">$<?php echo e(sprintf('%.2f', $cart_helper->get_old_total())); ?></h5>
								<?php else: ?>
									<h5 style="float: right;">$<?php echo e(sprintf('%.2f', $cart_helper->get_total())); ?></h5>
								<?php endif; ?>
							</div>
						</div>
						<hr />

						<div class="row mb-8">
							<div class="col-lg-8 col-md-8 col-sm-6 col-6">
								<h5 style="float: left;"><b>Shipping: </b></h5>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<h5 style="float: right;">$0.00</h5>
							</div>
						</div>
						<hr />

						<?php if($cart_helper->does_promo_code_exist_in_cart() == true): ?>
							<?php $promo_code = $promo_code_helper->get_promo_code($cart_helper->get_promo_code()->code); ?>
							<div class="row mb-8">
								<div class="col-lg-8 col-md-8 col-sm-6 col-6">
									<h5 style="float: left;"><b>Today's Savings: </b></h5>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-6">
									<?php if($promo_code->code_type == 1): ?>
										<h5 style="float: right;" class="mb-0">$<?php echo e(sprintf('%.2f', $promo_code->percent_off * $cart_helper->get_old_total())); ?></h5>
									<?php else: ?>
										<h5 style="float: right;" class="mb-0">$<?php echo e(sprintf('%.2f', $promo_code->dollars_off)); ?></h5>
									<?php endif; ?>
								</div>
							</div>
							<hr />
						<?php endif; ?>

						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-6 col-6">
								<h5 style="float: left;"><b>Today's Total: </b></h5>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-6">
								<h5 style="float: right;">$<?php echo e(sprintf('%.2f', $cart_helper->get_total())); ?></h5>
							</div>
						</div>

						

						<input id="checkout_button" type="submit" value="Complete Checkout" class="genric-btn primary circle large center-button mt-16 mb-0" style="font-size: 16px;"></a>
					</div>
				</div>
			</div>
		</form>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_js'); ?>
	<script type="text/javascript">
		$("#checkout_form").on('submit', function() {
			// Disable the button
			$("#checkout_button").prop('disabled', true);
			$("#checkout_button").val('Processing...');
		});
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>