@extends('layouts.guest')
@section('title',  'Maximize Your Earnings with DealsIntel' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('description',  'Join the Leading Affiliate Network for Performance-Based Marketing today and unlock endless opportunities for growth and prosperity' )
@section('imagealt',  'homepage image' )
@section('image',  url("public/publicassets/images/ogimg.jpg") )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')

<!-- HERO-19
			============================================= -->	
			<section id="hero-19" class="blur--purple gr--ghost hero-section">
				<div class="container text-center">


					<!-- HERO TEXT -->
					<div class="row justify-content-center">
						<div class="col-md-10 col-lg-9">
							<div class="hero-19-txt">
						
								<!-- Title -->
								<h2 class="s-56 w-700">Maximize Your Earnings with DealsIntel.</h2>	

								<!-- Text -->
								<p class="p-xl">Ready to take your affiliate marketing efforts to the next level? Join the Leading Affiliate Network for Performance-Based Marketing today and unlock endless opportunities for growth and prosperity. 
								</p>

								<!-- Buttons -->	
								<div class="btns-group">
									<a href="{{ route('affiliatereg') }}" class="btn r-04 btn--theme hover--theme">I'm an Affiliate</a>
									<a href="{{ route('advertiserreg') }}" class="video-popup1 btn r-04 btn--tra-black hover--theme ico-20 ico-right">I'm an Advertiser</span>
									</a> 
								</div>	

							</div>
						</div>
					</div>	<!-- END HERO TEXT -->	

					<!-- HERO IMAGE -->
					<div class="row">
						<div class="col">
							<div class="hero-19-img wow fadeInUp">
								<img class="img-fluid" src="{{ asset('publicassets/images/dealsintel-dash.png') }}" alt="hero-image">	
							</div>
						</div>	
					</div>	<!-- END HERO IMAGE --> 	


				</div>    <!-- End container --> 
			</section>	<!-- END HERO-19 -->	

		
<!-- FEATURES-6
			============================================= -->
			<section id="features-6" class="py-100 features-section division">
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title mb-70">	

								<!-- Title -->	
								<h2 class="s-50 w-700">Why Choose DealsIntel?</h2>	

								<!-- Text -->	
								<p class="s-21 color--grey">At DealsIntel, we connect top-tier affiliates with high-converting offers from premium advertisers. Whether you're an affiliate looking to boost your revenue or an advertiser seeking quality traffic, DealsIntel has the tools and expertise to help you succeed.</p>
									
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
			<section id="lnk-1" class="pt-100 ct-02 content-section division">
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
						 		<span class="section-id">For Affiliates</span>

								<!-- Title -->	
								<h2 class="s-46 w-700">Earn while you engage your viewers</h2>

								<!-- Text -->	
								<p>Do you have contents that your viewers love? Why not earn while they click and make sign up or purchase why you recommend?
								</p>

								<!-- Small Title -->	
								<h5 class="s-24 w-700">Grow with Dealsintel</h5>

								<!-- List -->	
								<ul class="simple-list">

									<li class="list-item">
										<p>Partner with DealsIntel and gain access to high-paying offers that convert. Our dedicated affiliate managers are here to support you every step of the way.
										</p>
									</li>

									<li class="list-item">
										<p>Get paid on time, every time. We offer multiple payment options to ensure you receive your earnings in the most convenient way possible.
										</p>
									</li>
									<li class="list-item">
										<p class="mb-0">From marketing materials to one-on-one support, we provide all the resources you need to succeed. Our team of experts is always available to help you navigate and optimize your campaigns.
										</p>
									</li>

								</ul>
								<a href="{{ route('affiliates') }}" class="color--theme"> >> See More</a>
							</div>
						</div>	<!-- END TEXT BLOCK -->	


					</div>	<!-- END SECTION CONTENT (ROW) -->	


				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->




			<!-- TEXT CONTENT
			============================================= -->
			<section class="pt-100 ct-01 content-section division">
				<div class="container">


					<!-- SECTION CONTENT (ROW) -->	
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-md-6 order-last order-md-2">
							<div class="txt-block left-column wow fadeInRight">
								<span class="section-id">For Advertisers</span>

								<!-- TEXT BOX -->	
								<div class="txt-box mb-0">

									<!-- Title -->	
									<h2 class="s-46 w-700">Data, Sales, Profit !</h2>

									<!-- Text -->	
									<p>By partnering with us, you gain access to a network of top-performing affiliates, cutting-edge technology, and unparalleled support. Whether you're looking to increase brand visibility, drive sales, or generate leads, DealsIntel is here to help you succeed.  
									</p>

									<!-- List -->	
									<ul class="simple-list">

										<li class="list-item">
											<p>Reach your target audience with precision. Our network of vetted affiliates ensures that your offers are promoted to high-quality traffic that converts.
											</p>
										</li>

										<li class="list-item">
											<p>Scale your campaigns with confidence. Our platform supports large volumes of traffic and provides the tools you need to manage and optimize your campaigns effectively.
											</p>
										</li>

										<li class="list-item">
											<p class="mb-0">Track the performance of your campaigns with detailed reports and analytics. Make data-driven decisions to maximize your ROI and achieve your marketing goals.
											</p>
										</li>

									</ul>
									<a href="{{ route('advertisers') }}" class="color--theme"> >> See More</a>
								</div>	<!-- END TEXT BOX -->	

	
							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- IMAGE BLOCK -->
						<div class="col-md-6 order-first order-md-2">
							<div class="img-block right-column wow fadeInLeft">
								<img class="img-fluid" src="publicassets/images/img-06.png" alt="content-image">
							</div>
						</div>


					</div>	<!-- END SECTION CONTENT (ROW) -->	


				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->







			<!-- DIVIDER LINE -->
			<hr class="divider">
			@include('frontpages.components.blogsection')
			@include('frontpages.components.cta2')



			

            
@endsection