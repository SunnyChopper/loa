@extends('layouts.app')

@section('content')
	@include('layouts.hero')
	<div class="container mt-64 mb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				@if(count($upcoming_events) > 0)
					<div class="well">
						<h2 class="text-center">Next Event Location</h2>
						<hr />
						<h4 class="text-center">{{ $upcoming_events[0]->event_name }}</h4>
						<p class="text-center">{{ $upcoming_events[0]->event_description }}</p>
						<h5 class="text-center">Where is it?</h45>
						<p class="text-center"><b>{{ $upcoming_events[0]->location }}</b></p>
						<h5 class="text-center">What date and time?</h45>
						<p class="text-center"><b>{{ Carbon\Carbon::parse($upcoming_events[0]->start_time)->format('F jS, Y \a\t H:i A') }}</b></p>
						{{-- <button type="button" class="genric-btn center primary" style="font-size: 16px;">I'm Coming! <span class="lnr lnr-arrow-right"></span></button> --}}
					</div>
				@else
					<div class="well">
						<h2 class="text-center">No upcoming events...</h2>
					</div>
				@endif
			</div>
		</div>

		{{-- <div class="row mt-64">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h2>Previous Events</h2>
				<hr />
				<section class="gallery-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<a href="https://advisory.kpmg.us/content/advisory/en/index/events/in-person-event-homepage.img.png" class="img-gal">
									<div class="single-imgs relative">		
										<div class="overlay overlay-bg"></div>
										<div class="relative">				
											<img class="img-fluid" src="https://advisory.kpmg.us/content/advisory/en/index/events/in-person-event-homepage.img.png" alt="">		
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-6">
								<a href="https://cdn-images-1.medium.com/max/1280/1*76KSie833sq6FAYtnbS7Ng.jpeg" class="img-gal">
									<div class="single-imgs relative">		
										<div class="overlay overlay-bg"></div>
										<div class="relative">				
											<img class="img-fluid" src="https://cdn-images-1.medium.com/max/1280/1*76KSie833sq6FAYtnbS7Ng.jpeg" alt="">				
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="https://i.ytimg.com/vi/3KD7ba4JBUo/maxresdefault.jpg" class="img-gal">
									<div class="single-imgs relative">		
										<div class="overlay overlay-bg"></div>
										<div class="relative">				
											<img class="img-fluid" src="https://i.ytimg.com/vi/3KD7ba4JBUo/maxresdefault.jpg" alt="">				
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="https://s3.amazonaws.com/vu-web/owen/wp/2017/10/24160131/A29W0781-1280x720.jpg" class="img-gal">
									<div class="single-imgs relative">		
										<div class="overlay overlay-bg"></div>
										<div class="relative">					
											<img class="img-fluid" src="https://s3.amazonaws.com/vu-web/owen/wp/2017/10/24160131/A29W0781-1280x720.jpg" alt="">				
										</div>
									</div>
								</a>
							</div>
							<div class="col-lg-4">
								<a href="http://ibgnews.com/wp-content/uploads/2018/04/RMB-Connect-2.jpg" class="img-gal">
									<div class="single-imgs relative">		
										<div class="overlay overlay-bg"></div>
										<div class="relative">					
											<img class="img-fluid" src="http://ibgnews.com/wp-content/uploads/2018/04/RMB-Connect-2.jpg" alt="">				
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>	
				</section>
				
			</div>
		</div> --}}
	</div>
@endsection