<!-- start footer Area -->
<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			{{-- <div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Legal</h4>
					<ul>
						<li><a href="#">Terms and Services</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Cookie Policy</a></li>
					</ul>
				</div>
			</div> --}}
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Quick links</h4>
					<ul>
						@if(Auth::guest())
							<li><a href="/shop">Shop</a></li>
							{{-- <li><a href="/members/login">Login</a></li>
							<li><a href="/members/register">Register</a></li> --}}
						@endif
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Navigation</h4>
					<ul>
						<li><a href="/shop">Home</a></li>
						<li><a href="/contact">Contact</a></li>
						{{-- <li><a href="/about">About</a></li> --}}
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Resources</h4>
					<ul>
						{{-- <li><a href="#">Jobs & Careers</a></li> --}}
						<li><a href="https://www.redwolfent.com">Hire My Agency</a></li>
						{{-- <li><a href="#">Guest Post</a></li> --}}
					</ul>
				</div>
			</div>
			{{-- <div class="col-lg-4  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Newsletter</h4>
					<p>Get weekly entrepreneurship and mindset tips</p>
					<div class="" id="mc_embed_signup">
						 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
						  <div class="input-group">
						    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
						    <div class="input-group-btn">
						      <button class="btn btn-default" type="submit">
						        <span class="lnr lnr-arrow-right"></span>
						      </button>    
						    </div>
						    	<div class="info"></div>  
						  </div>
						</form> 
					</div>
				</div>
			</div> --}}
		</div>
		<div class="footer-bottom row align-items-center justify-content-between">
			<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Law of Ambition &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved.</p>
			<div class="col-lg-6 col-sm-12 footer-social">
				<a href="https://www.instagram.com/lawofambition"><i class="fa fa-instagram"></i></a>
				<a href="https://www.facebook.com/LawOfAmbition/"><i class="fa fa-facebook"></i></a>
				<a href="https://www.twitter.com/lawofambition"><i class="fa fa-twitter"></i></a>
				<a href="https://www.youtube.com/channel/UCGoNJS6pCTdfGAP66r4kLrA"><i class="fa fa-youtube"></i></a>
			</div>
		</div>
	</div>
</footer>
<!-- End footer Area -->	