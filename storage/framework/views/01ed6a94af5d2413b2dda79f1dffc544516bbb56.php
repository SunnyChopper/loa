<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
				<form method="post" id="payment-form" role="form" action="/test/payment/create">
					<?php echo e(csrf_field()); ?>

					<input type="hidden" name="amount" value="10.00">
					<div class="well">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-xs-12">
								<h3>Test the Payment System</h3>
								<hr />
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group<?php echo e($errors->has('card_no') ? ' has-error' : ''); ?>">
		                            <h5 for="card_number" class="control-label mb-2">Card Number</h5>
		                            <input id="card_number" type="text" class="form-control" name="card_number" value="<?php echo e(old('card_number')); ?>" autofocus required>
	                                <?php if($errors->has('card_no')): ?>
	                                    <span class="help-block">
	                                        <strong><?php echo e($errors->first('card_no')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
		                        </div>
		                    </div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group<?php echo e($errors->has('ccExpiryMonth') ? ' has-error' : ''); ?>">
									<h5 for="ccExpiryMonth" class="control-label mb-2">Expiry Month</h5>
		                            <input id="ccExpiryMonth" type="text" class="form-control" name="ccExpiryMonth" value="<?php echo e(old('card_number')); ?>" required>
	                                <?php if($errors->has('card_no')): ?>
	                                    <span class="help-block">
	                                        <strong><?php echo e($errors->first('ccExpiryMonth')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
								</div>
							</div>

							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<div class="form-group<?php echo e($errors->has('ccExpiryYear') ? ' has-error' : ''); ?>">
									<h5 for="ccExpiryYear" class="control-label mb-2">Expiry Year</h5>
		                            <input id="ccExpiryYear" type="text" class="form-control" name="ccExpiryYear" value="<?php echo e(old('card_number')); ?>" required>
	                                <?php if($errors->has('card_no')): ?>
	                                    <span class="help-block">
	                                        <strong><?php echo e($errors->first('ccExpiryYear')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="form-group<?php echo e($errors->has('cvvNumber') ? ' has-error' : ''); ?>">
									<h5 for="cvvNumber" class="control-label mb-2">CVV Number</h5>
		                            <input id="cvvNumber" type="text" class="form-control" name="cvvNumber" value="<?php echo e(old('card_number')); ?>" required>
	                                <?php if($errors->has('card_no')): ?>
	                                    <span class="help-block">
	                                        <strong><?php echo e($errors->first('cvvNumber')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="submit" value="Get My Product" class="genric-btn large primary rounded" style="font-size: 18px;">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>