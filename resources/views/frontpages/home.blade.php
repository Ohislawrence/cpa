@extends('layouts.guest')
@section('title',  'Transform Your Affiliate Program with Tracklia' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('description',  'Simplify affiliate management, boost performance, and grow your business with Tracklia all-in-one SaaS platform.' )
@section('imagealt',  'homepage image' )
@section('image',  asset("images/tracklia-page.jpg") )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')

<!-- HERO-1
============================================= -->	
<section id="hero-1" class="bg--scroll hero-section">
	<div class="container">	
		<div class="row d-flex align-items-center">


			<!-- HERO TEXT -->
			<div class="col-md-6">
				<div class="hero-1-txt color--white wow fadeInRight">

					<!-- Title -->
					<h2 class="s-58 w-700">Effortless Affiliate Management for Your Business</h2>

					<!-- Text -->
					<p class="p-xl">Simplify affiliate management, maximize performance, and scale your business with Tracklia—an all-in-one SaaS platform designed for SaaS and eCommerce stores.
					</p>

					<!-- Button -->	
					<a href="{{ route('start') }}" class="btn r-04 btn--theme hover--tra-white">Get started for free</a>
					<p class="p-sm btn-txt ico-15">
						<span class="flaticon-check"></span> No credit card needed, free {{ \App\Models\Plan::where('name', 'pro')->first()->free_days }}-day trial
					</p>

				</div>
			</div>	<!-- END HERO TEXT -->	


			<!-- HERO IMAGE -->
			<div class="col-md-6">	
				<div class="hero-1-img wow fadeInLeft">	
					<img class="img-fluid" src="{{ url('publicassets/images/hero-1-img.png') }}" alt="hero-image">					
				</div>
			</div>	
			

		</div>    <!-- End row --> 	
	</div>	   <!-- End container --> 	
</section>	<!-- END HERO-1 -->	

		
<!-- FEATURES-6
			============================================= -->
			<section id="features-6" class="py-100 features-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-70">	

								<!-- Title -->	
								<h2 class="s-50 w-700">Why Choose Tracklia?</h2>	

								<!-- Text -->	
								<p class="s-21 color--grey">
									Tracklia empowers SaaS businesses, eCommerce stores, and platforms like WordPress and Shopify to seamlessly manage affiliate programs. With powerful customization tools, real-time analytics, and creator-friendly features,
									 Tracklia is the ultimate solution for scaling your affiliate program.
								</p>
									
							</div>	
						</div>
					</div>


					<!-- FEATURES-6 WRAPPER -->
					<div class="fbox-wrapper text-center">
						<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">


							<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-6 fb-1 wow fadeInUp">

		 							<!-- Icon -->
									<div class="fbox-ico ico-55">
										<div class="shape-ico color--theme">

											<!-- Vector Icon -->
											<span class="flaticon-graphics"></span>

											<!-- Shape -->
											<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
											  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
											</svg>

										</div>
									</div>	<!-- End Icon -->

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-20 w-700">Trusted by Industry Leaders</h6>
										<p>Join a network trusted by some of the biggest names in the industry.</p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #1 -->	


		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-6 fb-2 wow fadeInUp">

		 							<!-- Icon -->
									<div class="fbox-ico ico-55">
										<div class="shape-ico color--theme">

											<!-- Vector Icon -->
											<span class="flaticon-idea"></span>

											<!-- Shape -->
											<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
											  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
											</svg>

										</div>
									</div>	<!-- End Icon -->

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-20 w-700">High-Performing Offers</h6>
										<p>Access a wide range of high-performing offers across various verticals. </p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #2 -->	


		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-6 fb-3 wow fadeInUp">

		 							<!-- Icon -->
									<div class="fbox-ico ico-55">
										<div class="shape-ico color--theme">

											<!-- Vector Icon -->
											<span class="flaticon-graphic"></span>

											<!-- Shape -->
											<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
											  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
											</svg>

										</div>
									</div>	<!-- End Icon -->

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-20 w-700">Server-to-server Tracking</h6>
										<p>We rely on first party data, which is the most reliable data </p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #3 -->	


		 					<!-- FEATURE BOX #4 -->
		 					<div class="col">
		 						<div class="fbox-6 fb-4 wow fadeInUp">

		 							<!-- Icon -->
									<div class="fbox-ico ico-55">
										<div class="shape-ico color--theme">

											<!-- Vector Icon -->
											<span class="flaticon-search-engine-1"></span>

											<!-- Shape -->
											<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
											  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
											</svg>

										</div>
									</div>	<!-- End Icon -->

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-20 w-700">Advanced Reporting</h6>
										<p>Stay on top of your performance with our state-of-the-art reporting tools.</p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #4 -->	


						</div>  <!-- End row -->  
					</div>	<!-- END FEATURES-6 WRAPPER -->


				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-6 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">




			<!-- TEXT CONTENT
			============================================= -->
			<section id="how_it_works" class="pt-100 ct-02 content-section division">
				<div class="container">


					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">


						<!-- IMAGE BLOCK -->
						<div class="col-md-6">
							<div class="img-block left-column wow fadeInRight">
								<img class="img-fluid" src="publicassets/images/img-10.png" alt="content-image">
							</div>
						</div>


						<!-- TEXT BLOCK -->	
						<div class="col-md-6">
							<div class="txt-block right-column wow fadeInLeft">

								<!-- Section ID -->	
						 		<span class="section-id">For Mercharts</span>

								<!-- Title -->	
								<h2 class="s-46 w-700">Tracklia provide you with a All-in-one solution.</h2>

								<!-- Text -->	
								<p>
									Manage affiliate from any platform or social media with ease, and it's easy to setup.
								</p>

								<!-- Small Title -->	
								<h5 class="s-24 w-700">How It Works:</h5>

								<!-- List -->	
								<ul class="simple-list">

									<li class="list-item">
										<p>
											<b>Sign Up and Customize:</b> Create a tailored affiliate program in minutes.
										</p>
									</li>

									<li class="list-item">
										<p>
											<b>Invite Affiliates:</b> Attract top creators and influencers
										</p>
									</li>
									<li class="list-item">
										<p class="mb-5">
											<b>Track Performance:</b> Monitor real-time metrics and optimize for success.
										</p>
									</li>

								</ul>
								<a href="{{ route('start') }}" class="color--theme"> >> Start Free Trial</a>
							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>	<!-- END SECTION CONTENT (ROW) -->	

				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			@include('frontpages.components.blogsection')

<!-- FEATURES-11
============================================= -->
<section id="tracklia_features" class="pt-100 features-section division">
	<div class="container">


		<!-- SECTION TITLE -->	
		<div class="row justify-content-center">	
			<div class="col-md-10 col-lg-9">
				<div class="section-title mb-70">

					<!-- Title -->	
					<h2 class="s-50 w-700">Tracklia Features That Drive Success</h2>	
					<!-- Text -->	
					<p class="s-21 color--grey">Everything you need to create, manage, and scale a winning affiliate program.</p>
						
				</div>	
			</div>
		</div>


		<!-- FEATURES-11 WRAPPER -->
		<div class="fbox-wrapper">
			<div class="row row-cols-1 row-cols-md-2 rows-3">


				<!-- FEATURE BOX #1 -->
				<div class="col">
					<div class="fbox-11 fb-1 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-graphics"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Scalable Plans</h6>
							<p>
								From startups to enterprises, Tracklia grows with your business.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #1 -->	


				<!-- FEATURE BOX #2 -->
				<div class="col">
					<div class="fbox-11 fb-2 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-idea"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Payment Automation</h6>
							<p>
								Streamline payouts to affiliates with secure and automated payment processing, currently Paypal.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #2 -->	


				<!-- FEATURE BOX #3 -->
				<div class="col">
					<div class="fbox-11 fb-3 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-graphic"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Affiliate Recruitment Tools</h6>
							<p>
								Discover and onboard top affiliates, influencers, and creators to maximize reach and engagement.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #3 -->	


				<!-- FEATURE BOX #4 -->
				<div class="col">
					<div class="fbox-11 fb-4 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-wireframe"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Customizable Affiliate Programs</h6>
							<p>
								Set commission structures, approval workflows, and program rules tailored to your business needs.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #4 -->	


				<!-- FEATURE BOX #5 -->
				<div class="col">
					<div class="fbox-11 fb-5 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-trophy"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Seamless Integration</h6>
							<p>
								Connect with SaaS platforms, eCommerce stores, and CMS like Shopify and WordPress effortlessly.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #5 -->	


				<!-- FEATURE BOX #6 -->
				<div class="col">
					<div class="fbox-11 fb-6 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-search-engine-1"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div>	<!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Real-Time Analytics</h6>
							<p>
								Get detailed insights into affiliate performance, traffic, and conversions to make data-driven decisions.
							</p>
						</div>

					</div>
				</div>	<!-- END FEATURE BOX #6 -->	


			</div>  <!-- End row -->  
		</div>	<!-- END FEATURES-11 WRAPPER -->


	</div>     <!-- End container -->
</section>	<!-- END FEATURES-11 -->


			
			@include('frontpages.components.cta2')



			

            
@endsection