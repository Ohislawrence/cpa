@extends('layouts.guest')
@section('title',  'Advertisers' )
@section('type',  '' )
@section('url',  '' )
@section('card',  '' )
@section('description',  '' )
@section('imagealt',  '' )
@section('card',  '' )


@section('header')

@endsection




@section('footer')

@endsection


@section('slot')
<!-- IMAGE CONTENT
			============================================= -->
			<section id="lnk-3" class=" bg--04 ct-10 content-section division">
				<div class="section-overlay pt-100">
					<div class="container">
					

						<!-- SECTION TITLE -->	
						<div class="row justify-content-center">	
							<div class="col-md-10 col-lg-9">
								<div class="section-title mb-70">

									<!-- Title -->	
									<h2 class="s-50 w-700">Unlock Unmatched Quality and Reach with DealsIntel</h2>	

									<!-- Text -->	
									<p class="s-21">Welcome to DealsIntel, the leading affiliate network where your advertising goals come to life. By partnering with us, you gain access to a network of top-performing affiliates, cutting-edge technology, and unparalleled support. Whether you're looking to increase brand visibility, drive sales, or generate leads, DealsIntel is here to help you succeed.</p>
										
									<!-- Button -->
									<a href="{{ route('advertiserreg') }}" class="btn r-04 btn--theme mt-20">Create your Advertiser Account</a>

								</div>	
							</div>
						</div>

					
						<!-- IMAGE BLOCK -->
						<div class="row">	
							<div class="col">
								<div class="img-block video-preview wow fadeInUp">

									<!-- Preview Image --> 
				 					<img class="img-fluid" src="{{ asset('publicassets/images/dashboard-012.png') }}" alt="advertiser-img">

								</div>
							</div>
						</div>


					</div>	   <!-- End container -->
				</div>     <!-- End section overlay -->
			</section>	<!-- END IMAGE CONTENT -->	
            

			<!-- FEATURES-2
			============================================= -->
			<section id="features-2" class="py-100 features-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-80">	

								<!-- Title -->	
								<h2 class="s-50 w-500">Why Choose DealsIntel?</h2>	

								<!-- Text -->	
								<p class="s-21 color--grey">Whether you're a startup or a Fortune 500 company, our platform is designed to scale with your needs. Manage large volumes of traffic, expand your reach, and grow your business with confidence.</p>
									
							</div>	
						</div>
					</div>


					<!-- FEATURES-2 WRAPPER -->
					<div class="fbox-wrapper text-center">
						<div class="row row-cols-1 row-cols-md-3">


							<!-- FEATURE BOX #1 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-1 wow fadeInUp">

		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid light-theme-img" src="{{ asset('publicassets/images/f_01.png') }}" alt="feature-image">
										<img class="img-fluid dark-theme-img" src="{{ asset('publicassets/images/f_01_dark.png') }}" alt="feature-image">
									</div>

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700">High-Quality Traffic</h6>
										<p>Reach your target audience with precision. Our network of vetted affiliates ensures that your offers are promoted to high-quality, engaged traffic that converts. We focus on delivering real, measurable results for your campaigns.</p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #1 -->	


		 					<!-- FEATURE BOX #2 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-2 wow fadeInUp">

		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid light-theme-img" src="{{ asset('publicassets/images/f_05.png') }}" alt="feature-image">
										<img class="img-fluid dark-theme-img" src="{{ asset('publicassets/images/f_05_dark.png') }}" alt="feature-image">
									</div>

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700">Comprehensive Analytics</h6>
										<p>Make informed decisions with our detailed reporting and analytics tools. Track the performance of your campaigns in real-time, analyze key metrics, and optimize for maximum ROI.</p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #2 -->		


		 					<!-- FEATURE BOX #3 -->
		 					<div class="col">
		 						<div class="fbox-2 fb-3 wow fadeInUp">

		 							<!-- Image -->
									<div class="fbox-img gr--whitesmoke h-175">
										<img class="img-fluid light-theme-img" src="{{ asset('publicassets/images/f_02.png') }}" alt="feature-image">
										<img class="img-fluid dark-theme-img" src="{{ asset('publicassets/images/f_02_dark.png') }}" alt="feature-image">
									</div>

									<!-- Text -->
									<div class="fbox-txt">
										<h6 class="s-22 w-700">Dedicated Account Management</h6>
										<p>Our team of experienced account managers is dedicated to your success. From campaign setup to optimization, we provide personalized support to help you achieve your marketing goals.</p>
									</div>

		 						</div>
		 					</div>	<!-- END FEATURE BOX #3 -->	


						</div>  <!-- End row -->  
					</div>	<!-- END FEATURES-2 WRAPPER -->


				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-2 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">




			<!-- TEXT CONTENT
			============================================= -->
			<section class="pt-100 ct-04 content-section division">
				<div class="container">
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-80">	

								<!-- Title -->	
								<h2 class="s-50 w-500">How it works...</h2>	

								
							</div>	
						</div>
					</div>

					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
			 			<div class="col-md-6 order-last order-md-2">
			 				<div class="txt-block left-column wow fadeInRight">


			 					<!-- CONTENT BOX #1 -->
								<div class="cbox-2 process-step">
									
									<!-- Icon -->
									<div class="ico-wrap">
										<div class="cbox-2-ico bg--theme color--white">1</div>
										<span class="cbox-2-line"></span>
									</div>
	
									<!-- Text -->
									<div class="cbox-2-txt">
										<h5 class="s-22 w-700">Sign Up</h5>
										<p>Join our network by completing a simple registration process.
										</p>
									</div>

								</div>	<!-- END CONTENT BOX #1 -->


								<!-- CONTENT BOX #2 -->
								<div class="cbox-2 process-step">
									
									<!-- Icon -->
									<div class="ico-wrap">
										<div class="cbox-2-ico bg--theme color--white">2</div>
										<span class="cbox-2-line"></span>
									</div>
	
									<!-- Text -->
									<div class="cbox-2-txt">
										<h5 class="s-22 w-700">Create Campaigns</h5>
										<p>Work with our account managers to create and tailor your campaigns to meet your specific objectives.
										</p>
									</div>

								</div>	<!-- END CONTENT BOX #2 -->


								<!-- CONTENT BOX #3 -->
								<div class="cbox-2 process-step">
									
									<!-- Icon -->
									<div class="ico-wrap">
										<div class="cbox-2-ico bg--theme color--white">3</div>
									</div>
	
									<!-- Text -->
									<div class="cbox-2-txt">
										<h5 class="s-22 w-700">Launch</h5>
										<p>Our network of affiliates will start promoting your offers across various channels, driving quality traffic to your site.
										</p>
									</div>
									
								</div>	<!-- END CONTENT BOX #3 -->

								<!-- CONTENT BOX #4 -->
								<div class="cbox-2 process-step">
									
									<!-- Icon -->
									<div class="ico-wrap">
										<div class="cbox-2-ico bg--theme color--white">4</div>
									</div>
	
									<!-- Text -->
									<div class="cbox-2-txt">
										<h5 class="s-22 w-700">Analyze & Optimize</h5>
										<p class="mb-0">Use our advanced analytics tools to monitor performance, identify opportunities for improvement, and optimize your campaigns for better results.
										</p>
									</div>
									
								</div>	<!-- END CONTENT BOX #3 -->


			 				</div>
					 	</div>	<!-- END TEXT BLOCK -->		


						<!-- IMAGE BLOCK -->	
						<div class="col-md-6 order-first order-md-2">
							<div class="img-block wow fadeInLeft">
								<img class="img-fluid" src="{{ asset('publicassets/images/tablet-01.png') }}" alt="content-image">
							</div>	
						</div>


					</div>	<!-- END SECTION CONTENT (ROW) -->	


				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->




			<!-- FEATURES-12
			============================================= -->
			<section id="features-12" class="shape--bg shape--white-400 pt-100 features-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-md-5">
							<div class="txt-block left-column wow fadeInRight">

								<!-- Section ID -->	
						 		<span class="section-id">Advertiser Resources</span>

								<!-- Title -->	
								<h2 class="s-46 w-500">Empowering Your Campaigns with Comprehensive Resources</h2>

								<!-- Text -->	
								<p>We believe in providing our advertisers with all the tools and resources needed to create, 
									manage, and optimize successful marketing campaigns. Our extensive range of resources is 
									designed to help you reach your target audience effectively, maximize your ROI, and stay 
									ahead of the competition. Explore the powerful resources we offer to elevate your advertising strategies.
								</p>

							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- FEATURES-12 WRAPPER -->
						<div class="col-md-7">
							<div class="fbox-12-wrapper wow fadeInLeft">	
								<div class="row">


				 					<div class="col-md-6">

				 						<!-- FEATURE BOX #1 -->
				 						<div id="fb-12-1" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">

											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">

													<!-- Vector Icon -->
													<span class="flaticon-layers-1"></span>

													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													 <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>

												</div>
											</div>	<!-- End Icon -->

											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700">Targeted Campaigns</h5>
												<p>Customize your campaigns to target specific demographics, geographic locations, and user behaviors. Our advanced targeting options allow you to reach your ideal audience with precision, ensuring that your ads are seen by those most likely to convert.</p>
											</div>

				 						</div>

				 						<!-- FEATURE BOX #2 -->
				 						<div id="fb-12-2" class="fbox-12 bg--white-100 block-shadow r-12">

											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">

													<!-- Vector Icon -->
													<span class="flaticon-click-1"></span>

													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>

												</div>
											</div>	<!-- End Icon -->

											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700">Performance-Based Marketing</h5>
												<p>Only pay for results. Our performance-based model ensures that you get the best value for your marketing budget, paying only for the actions that matter to you, such as clicks, leads, or sales.</p>
											</div>

				 						</div>


				 					</div>


				 					<div class="col-md-6">


				 						<!-- FEATURE BOX #3 -->
				 						<div id="fb-12-3" class="fbox-12 bg--white-100 block-shadow r-12 mb-30">

											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">

													<!-- Vector Icon -->
													<span class="flaticon-prioritize"></span>

													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>

												</div>
											</div>	<!-- End Icon -->

											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700">Fraud Prevention</h5>
												<p>Protect your investment with our robust fraud prevention measures. We use advanced technology and manual reviews to ensure the integrity of your campaigns, safeguarding against fraudulent activity and ensuring that your budget is spent on genuine, high-quality traffic.</p>
											</div>

				 						</div>

				 						<!-- FEATURE BOX #4 -->
				 						<div id="fb-12-4" class="fbox-12 bg--white-100 block-shadow r-12">

											<!-- Icon -->
											<div class="fbox-ico ico-50">
												<div class="shape-ico color--theme">

													<!-- Vector Icon -->
													<span class="flaticon-analytics"></span>

													<!-- Shape -->
													<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
													  <path d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z" transform="translate(100 100)" />
													</svg>

												</div>
											</div>	<!-- End Icon -->

											<!-- Text -->
											<div class="fbox-txt">
												<h5 class="s-20 w-700">Conversion Tracking</h5>
												<p>Implement conversion tracking to measure the effectiveness of your campaigns accurately. Our tools help you identify which ads and channels are driving conversions, allowing you to allocate your budget more effectively.</p>
											</div>

				 						</div>


				 					</div>


				 				</div>
							</div>	<!-- End row -->
						</div>	<!-- END FEATURES-12 WRAPPER -->


					</div>    <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END FEATURES-12 -->
			<!-- BANNER-13
			============================================= -->
			<section id="banner-13" class="pt-100 banner-section">
				<div class="container">


					<!-- BANNER-13 WRAPPER -->
					<div class="banner-13-wrapper bg--05 bg--scroll r-16 block-shadow">
						<div class="banner-overlay">
							<div class="row d-flex align-items-center">


								<!-- BANNER-5 TEXT -->
								<div class="col-md-7">
									<div class="banner-13-txt color--white">

										<!-- Title -->	
										<h2 class="s-46 w-700">Ready to Drive Results?</h2>

										<!-- Text -->
										<p class="p-lg">Partner with DealsIntel today and take your advertising to the next level. Enjoy high-quality traffic, scalable solutions, and dedicated support. Sign up now and start achieving your marketing goals!
										</p>

										<!-- Button -->
										<a href="{{ route('advertiserreg') }}" class="btn r-04 btn--theme hover--tra-white">Start Now</a>

									</div>
								</div>	<!-- END BANNER-13 TEXT -->


								<!-- BANNER-13 IMAGE -->
								<div class="col-md-5">
									<div class="banner-13-img text-center">
										<img class="img-fluid" src="{{ asset('publicassets/images/img-04.png') }}" alt="advertiser-cta">
									</div>	
								</div>


							</div>   <!-- End row -->	
						</div>   <!-- End banner overlay -->	
					</div>    <!-- END BANNER-13 WRAPPER -->


				</div>     <!-- End container -->	
			</section>	<!-- END BANNER-13 -->



@include('frontpages.components.blogsection')
<hr class="divider">
@endsection