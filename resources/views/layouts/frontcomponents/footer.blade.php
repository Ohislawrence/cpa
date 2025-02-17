<!-- FOOTER-3
			============================================= -->
			<footer id="footer-3" class="pt-100 footer">
				<div class="container">


					<!-- FOOTER CONTENT -->
					<div class="row">


						<!-- FOOTER LOGO -->
						<div class="col-xl-3">
							<div class="footer-info">
								<img class="footer-logo" src="{{ asset('assets/media/logos/tracklia_black_logo.png') }}" alt="footer-logo">
								<img class="footer-logo-dark" src="{{ asset('assets/media/logos/tracklia_white_logo.png') }}" alt="footer-logo">
							</div>	
						</div>	


						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-md-3 col-xl-2">
							<div class="footer-links fl-1">

								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="{{ route('home') }}">Home</a></p></li>
									<li><p><a href="{{ route('aboutus') }}">About Us</a></p></li>						
									<li><p><a href="{{ route('contactus') }}">Contact Us</a></p></li>
									<li><p><a href="{{ route('support') }}">Support</a></p></li>			
								</ul>

							</div>
						</div>	<!-- END FOOTER LINKS -->	


						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-md-3 col-xl-2">
							<div class="footer-links fl-2">

								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="{{ route('app.support', ['integration'])  }}">Integrations</a></p></li>
									<li><p><a href="{{ route('pricing') }}">Pricing</a></p></li>	
									<li><p><a href="{{ route('start') }}">Start Now!</a></p></li>			
								</ul>

							</div>	
						</div>	<!-- END FOOTER LINKS -->	


						<!-- FOOTER LINKS -->
						<div class="col-sm-4 col-md-3 col-xl-2">
							<div class="footer-links fl-3">
								
								<!-- Links -->
								<ul class="foo-links clearfix">
									<li><p><a href="{{ route('tos') }}">Terms of Use</a></p></li>										
									<li><p><a href="{{ route('privacy') }}">Privacy Policy</a></p></li>	
									<li><p><a href="{{ route('blogs') }}">Our Blog</a></p></li>	
								</ul>

							</div>	
						</div>	<!-- END FOOTER LINKS -->	


						<!-- FOOTER LINKS -->
						<div class="col-sm-6 col-md-3">
							<div class="footer-links fl-4">
												
								<!-- Title -->
								<h6 class="s-17 w-700">Connect With Us</h6>

								<!-- Mail Link -->
								<p class="footer-mail-link ico-25">
									<a href="mailto:hello@tracklia.com">business@tracklia.com</a>
								</p>

								<!-- Social Links -->	
								<ul class="footer-socials ico-25 text-center clearfix">		
									<li><a href="https://facebook.com/tracklia"><span class="flaticon-facebook"></span></a></li>
									<li><a href="https://twitter.com/tracklia"><span class="flaticon-twitter"></span></a></li>
									<li><a href="https://linkedin.com/company/tracklia"><span class="flaticon-linkedin-logo"></span></a></li>
									
								</ul>

							</div>	
						</div>	<!-- END FOOTER LINKS -->	


					</div>	<!-- END FOOTER CONTENT -->


					<hr>	<!-- FOOTER DIVIDER LINE -->


					<!-- BOTTOM FOOTER -->
					<div class="bottom-footer">
						<div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">


							<!-- FOOTER COPYRIGHT -->
							<div class="col">
								<div class="footer-copyright"><p class="p-sm">&copy; {{ date("Y") }} {{ env('APP_NAME') }}. <span>All Rights Reserved</span></p></div>
							</div>


							


						</div>  <!-- End row -->
					</div>	<!-- END BOTTOM FOOTER -->


				</div>     <!-- End container -->	
			</footer>   <!-- END FOOTER-3 -->	
			



		</div>	<!-- END PAGE CONTENT -->	




		<!-- EXTERNAL SCRIPTS
		============================================= -->	
		<script src="{{ asset('publicassets/js/jquery-3.7.0.min.js') }}"></script>
		<script src="{{ asset('publicassets/js/bootstrap.min.js') }}"></script>	
		<script src="{{ asset('publicassets/js/modernizr.custom.js') }}"></script>
		<script src="{{ asset('publicassets/js/jquery.easing.js') }}"></script>
		<script src="{{ asset("publicassets/js/jquery.appear.js") }}"></script>
		<script src="{{ asset('publicassets/js/menu.js') }}"></script>
		<script src="{{ asset('publicassets/js/owl.carousel.min.js') }}"></script>
		<script src="{{ asset('publicassets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('publicassets/js/jquery.ajaxchimp.min.js') }}"></script>	
		<script src="{{ asset('publicassets/js/popper.min.js') }}"></script>
		<script src="{{ asset('publicassets/js/lunar.js') }}"></script>
		<script src="{{ asset('publicassets/js/wow.js') }}"></script>
				
		<!-- Custom Script -->		
		<script src="{{ asset('publicassets/js/custom.js') }}"></script>
		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->															
		<!--
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
		-->	