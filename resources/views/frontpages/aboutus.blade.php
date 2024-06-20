@extends('layouts.guest')
@section('title',  'About Us' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  'Welcome to DealsIntel, your go-to platform for uncovering the best deals, discounts, and promotions across a wide range of products and services.' )
@section('imagealt',  'Learn about what we do' )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<!-- ABOUT-2
			============================================= -->
			<section id="about-2" class="rel inner-page-hero about-section division">


				<!-- ABOUT-2 TITLE -->
				<div class="container">
					<div class="row">
						<div class="col-md-11 col-lg-10 col-xl-9">
							<div class="about-2-title mb-60">

								<!-- Title -->
								<h2 class="s-52 w-700 mb-30">Welcome to DealsIntel, </h2>

								<!-- Text -->	
								<p class="mb-0">Your go-to platform for uncovering the best deals, discounts, and promotions across a wide range of products and services. Our mission is to help you save money and time by providing comprehensive and up-to-date information on the latest offers available in the market.
								</p>

							</div>
						</div>
					</div>
				</div>	  <!-- END ABOUT-2 TITLE -->	


				<!-- ABOUT-2 IMAGES -->
				<div class="container-fluid">
					<div class="row">


						<!-- IMAGES-1 -->
						<div class="col-md-5">
							<div class="text-end">


								<!-- IMAGE-1 -->
								<div class="about-2-img a-2-1 r-12">
									<img class="img-fluid" src="{{ asset('publicassets/images/a2-1.jpg') }}" alt="about-image">
								</div>


								<!-- IMAGE-2 -->
								<div class="about-2-img a-2-2 r-12">
									<img class="img-fluid" src="{{ asset('publicassets/images/a2-2.jpg') }}" alt="about-image">
								</div>


							</div>
						</div>	<!-- END IMAGES-1 -->


						<!-- IMAGES-2 -->
						<div class="col-md-7">


							<!-- IMAGE-3 -->
							<div class="about-2-img a-2-3 r-12">
								<img class="img-fluid" src="{{ asset('publicassets/images/a2-3.jpg') }}" alt="about-image">
							</div>


							<div class="row">

								<!-- TEXT -->
								<div class="col-md-7 col-lg-6">
									<div class="a2-txt bg--black-400 pattern-01 bg--fixed color--white r-12">

										<!-- Icon -->
										<div class="a2-txt-quote ico-40 o-20">
											<span class="flaticon-quote"></span>
										</div>

										<!-- Text -->
										<p>I am delighted to welcome you to DealsIntel, where our mission is to help you save money and time by uncovering the best deals available. As we continue to grow and evolve, our commitment to providing you with comprehensive, reliable, and up-to-date deal information remains unwavering.
										</p>

										<!-- Author -->
										<p class="a2-txt-author">Lawrence Ohis <span>CEO</span></p>

									</div>
								</div>

								<!-- IMAGE-4 -->
								<div class="col-md-5 col-lg-6">
									<div class="about-2-img a-2-4 r-12">
										<img class="img-fluid" src="{{ asset('publicassets/images/a2-4.jpg') }}" alt="about-image">
									</div>
								</div>

							</div>	 <!-- End row -->	


						</div>	<!-- END IMAGES-2 -->


					</div>	 <!-- End row -->	
				</div>	  <!-- END ABOUT-2 IMAGES -->


			</section>	<!-- END ABOUT-2 -->

            <!-- ABOUT-3
			============================================= -->
			<div id="about-3" class="pt-100 about-section division">
				<div class="container">
					<div class="row">	


						<!-- ABOUT-3 TEXT -->
						<div class="col-md-6">
							<div id="a3-1" class="txt-block">	

								<!-- Title -->
								<h5 class="s-24 w-700 mb-20">Our Mission</h5>

								<!-- Text -->	
								<p>At DealsIntel, our mission is to empower consumers by making it easier to find and take advantage of the best deals. We believe that everyone should have access to affordable products and services without compromising on quality. We strive to be your trusted source for reliable, accurate, and timely deal information.
								</p>
							</div>	
						</div>	<!-- END ABOUT-3 TEXT -->


						<!-- ABOUT-3 TEXT -->
						<div class="col-md-6">
							<div id="a3-2" class="txt-block">	

								<!-- Title -->
								<h5 class="s-24 w-700 mb-20">What We Offer</h5>

								<!-- Text -->	
								<p>We curate and verify deals from various categories, including electronics, fashion, travel, home goods, and more. Our team of experts works diligently to ensure that all deals listed on our platform are valid and provide real value to our users.
								</p>
							</div>	
						</div>	<!-- END ABOUT-3 TEXT -->


					</div>    <!-- End row -->	
				</div>	   <!-- End container -->	
			</div>	<!-- END ABOUT-3 -->




			


            
			<!-- TEXT CONTENT
			============================================= -->
			<section class="bg--04 bg--fixed py-100 ct-01 content-section division">
				<div class="container">
					<div class="row d-flex align-items-center">


						<!-- TEXT BLOCK -->	
						<div class="col-md-6 order-last order-md-2">
							<div class="txt-block left-column wow fadeInRight">

								<!-- Title -->	
								<h2 class="s-50 w-700">Why Choose DealsIntel?</h2>

								<!-- Text -->	
								<p class="p-lg"><h5>Expert Curation</h5> Our team of deal hunters and analysts are passionate about finding the best offers. We thoroughly research and vet each deal to ensure it meets our high standards of quality and value.
								</p>
								<p class="p-lg"><h5>Community-Driven Insights</h5>We value the input of our community. User reviews and ratings help us maintain the quality of our listings and provide you with real-life feedback on the deals you're interested in.</p>
								<p class="p-lg"><h5>Exclusive Offers</h5> partnerships with leading brands and retailers, we often secure exclusive deals that you won't find anywhere else. Sign up for our newsletter to get these special offers delivered straight to your inbox.</p>
							</div>
						</div>	<!-- END TEXT BLOCK -->	


						<!-- IMAGE BLOCK -->
						<div class="col-md-6 order-first order-md-2">
							<div class="img-block j-img video-preview right-column wow fadeInLeft">
								<!-- Preview Image --> 
			 					<img class="img-fluid r-20" src="{{ asset('publicassets/images/img-17.jpg') }}" alt="video-preview">
							</div>
						</div>

					</div>    <!-- End row -->
				</div>	   <!-- End container -->
			</section>	<!-- END TEXT CONTENT -->

			<!-- DIVIDER LINE -->
			<hr class="divider">

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


@endsection