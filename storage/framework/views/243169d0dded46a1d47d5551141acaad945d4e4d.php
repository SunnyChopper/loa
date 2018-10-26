<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2 class="text-center">Work Smarter than the Competition</h2>
				<p class="text-center mt-2">To become an effective entrepreneur, you have to learn how to use the tools at your disposal. Here are some to begin with.</p>
				<hr />
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<a href="/members/register" class="black-link">
					<div class="image-box">
						<div class="image">
							<img src="https://gp1.com/wp-content/uploads/2017/07/SOCIALMedia.jpeg" class="regular-image">
						</div>
						<div class="info">
							<h4 class="text-center">Social Media Tips Tool</h4>
							<p class="text-center mb-0 mt-8">The internet gave birth to social media which has allowed for a major shift in marketing. If leveraged correctly, social media marketing can drive enormous amounts of traffic, leads, and sales.</p>
							<a href="/members/register" class="genric-btn primary center-button mt-16" style="font-size: 14px">Gain Access</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="image-box-disabled">
					<div class="image">
						<img src="https://i.ytimg.com/vi/zIqcrGpqO2g/maxresdefault.jpg" class="regular-image">
					</div>

					<div class="info">
						<h4 class="text-center">Accountability Tool</h4>
						<p class="text-center mb-0 mt-8">Often times, we all need someone to push us and hold us accountable to make sure we get that project done. This is where Wolf Squad can help you do exactly that.</p>
						<a href="" class="genric-btn disable center-button mt-16" style="font-size: 14px">Coming Soon</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>