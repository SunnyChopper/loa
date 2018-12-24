<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
				<div class="well">
					<form method="post" action="/admin/login">
						<?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Username:</h5>
									<input type="text" name="username" class="form-control<?php echo e(\Session::has('username') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('username')); ?>" autofocus required>
									<?php if(\Session::has('username')): ?>
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong><?php echo e(\Session::get('username')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Password:</h5>
									<input type="password" name="password" class="form-control<?php echo e(\Session::has('password') ? ' is-invalid' : ''); ?>" required>
									<?php if(\Session::has('password')): ?>
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong><?php echo e(\Session::get('password')); ?></strong>
	                                    </span>
	                                <?php endif; ?>
								</div>
							</div>

							<?php if(\Session::has('backend_auth_error')): ?>
								<p>
	                                <span class="invalid-feedback" role="alert">
	                                    <strong><?php echo e(\Session::get('backend_auth_error')); ?></strong>
	                                </span>
	                            </p>
                            <?php endif; ?>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="submit" value="Login" class="genric-btn primary rounded" style="font-size: 16px;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>