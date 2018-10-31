<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				@if(isset($page_header) == true)
				<h1 class="text-white">{{ $page_header }}</h1>
				@elseif(session()->has('page_header'))
				<h1 class="text-white">{{ session('page_header') }}</h1>
				@else
				<h1 class="text-white">Law of Ambition</h1>
				@endif
				{{-- <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> About Us</a></p> --}}
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->