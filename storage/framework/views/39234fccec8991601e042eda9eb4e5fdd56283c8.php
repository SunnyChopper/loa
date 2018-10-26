<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="well">
					<h3 class="text-center">My Team and I Will Get Back to You Shortly</h3>
					<hr />
					<form>
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Name:</h5>
									<input type="text" name="name" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Email:</h5>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
									<h5 class="mb-2">Message:</h5>
									<textarea form="contact_form" class="form-control" rows="6"></textarea>
								</div>
							</div>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="submit" value="Submit" class="genric-btn large primary" style="font-size: 18px;">
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<h3 style="margin-top: 42px;">Other Contact Information</h3>
				<hr />
				<p><span class="lnr lnr-phone-handset"></span> 123-456-7890</p>
				<p><span class="lnr lnr-envelope"></span> info@lawofambition.com</p>
				<p><i class="fa fa-instagram"></i> LawOfAmbition</p>
				<p><i class="fa fa-twitter"></i> LawOfAmbition</p>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>