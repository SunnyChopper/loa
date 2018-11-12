@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-32 mb-32">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 col-12">
				<img src="https://i.pinimg.com/originals/b3/9f/24/b39f242593d0b7edd8e9b5da9dc640db.jpg" class="regular-image">
				<hr />
				<p class="mb-0"><b>Joined on:</b> November 7th, 2018</p>
				<p class="mb-0"><b>Last on:</b> November 10th, 2018</p>
			</div>

			<div class="col-lg-9 col-md-8 col-sm-12 col-12">
				<section id="enrolled_courses">
					<h4>Courses Enrolled In</h4>
					<div class="mt-8" style="padding: 24px; border: 2px solid #EAEAEA;">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<img src="https://ksassets.timeincuk.net/wp/uploads/sites/55/2017/08/Deadmau5-GettyImages-672874542-920x584.jpg" class="regular-image">
								<h5 class="mt-16 text-center">EDM Mastery</h5>
								<p class="mb-0 text-center"><small>Enrolled on November 7th, 2018</small></p>
							</div>
						</div>
					</div>
				</section>

				<section class="mt-32" id="blog_posts_read">
					<h4>Blog Posts Read</h4>
					<div class="mt-8" style="padding: 24px; border: 2px solid #EAEAEA;">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12 col-12">
								<img src="https://invenio-wpengine.netdna-ssl.com/wp-content/uploads/2018/03/301801114638digitalmarketing.jpg" class="regular-image">
								<h5 class="mt-16 text-center">Digital Marketing 101</h5>
								<p class="mb-0 text-center"><small>Read on November 7th, 2018</small></p>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
@endsection