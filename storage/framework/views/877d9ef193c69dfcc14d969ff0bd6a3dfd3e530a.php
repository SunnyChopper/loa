<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('layouts.hero', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="videoWrapper">
				    <!-- Copy & Pasted from YouTube -->
				    <iframe width="560" height="349" src="https://www.youtube.com/embed/GyGqV_PkfGo?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
				</div>

				<div class="well">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-12">
							<h4 class="text-center">Meet your Instructor</h4>
							<hr />
						</div>
					</div>

					<div class="row">
						<div class="col-lg-4 col-md-5 col-sm-12 col-12">
							<img src="https://i.pinimg.com/originals/b3/9f/24/b39f242593d0b7edd8e9b5da9dc640db.jpg" class="regular-image" style="border-radius: 100%;">
						</div>
						<div class="col-lg-8 col-md-7 col-sm-12 col-12">
							<h5>Amy Mendoza</h5>
							<p>Trained in the special arts of Halo and Call of Duty. Currently a member of the FaZe gaming group.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 col-12" style="padding: 24px; border: 2px solid #EAEAEA;">
				<h2>Mastering Halo</h2>
				<hr />
				<h3 class="green mb-8">$24.99</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<h4 class="mb-8">Topics Covered</h4>
				<ul class="list-group mb-16">
					<li class="list-group-item">
						<h5>Module 1</h5>
						Basic Weaponary and Basic Movement Skills
					</li>

					<li class="list-group-item">
						<h5>Module 2</h5>
						Figuring Out Which Type of Halo Player You Are
					</li>

					<li class="list-group-item">
						<h5>Module 3</h5>
						Beginner Level In-Game Tactics
					</li>

					<li class="list-group-item">
						<h5>Module 4</h5>
						Intermediate Level In-Game Tactics
					</li>

					<li class="list-group-item">
						<h5>Module 5</h5>
						Advanced Level In-Game Tactics
					</li>
				</ul>
				<a href="/courses/enroll/1" class="genric-btn primary rounded" style="font-size: 16px;">Enroll in Course <span class="lnr lnr-arrow-right"></span></a>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>