@extends('layouts.guest')
@section('title',  'Contact Us' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  'We value our partners and are committed to providing exceptional support and service. Whether you have a question, need assistance with your campaigns, or want to learn more about our network, our team is here to help.' )
@section('imagealt',  'contact us image' )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<!-- CONTACTS-1
			============================================= -->
			<section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">				
				<div class="container">


					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title text-center mb-80">	

								<!-- Title -->	
								<h2 class="s-52 w-700">Questions? Let's Talk</h2>	

								<!-- Text -->	
								<p class="p-lg">We value our partners and are committed to providing exceptional support and service. Whether you have a question, need assistance with your campaigns, or want to learn more about our network, our team is here to help.
								</p>
									
							</div>	
						</div>
					</div>


					<!-- CONTACT FORM -->
				 	<div class="row justify-content-center">	
				 		<div class="col-md-11 col-lg-10 col-xl-8">
				 			<div class="form-holder">
								<form name="contactform" class="row contact-form">

									<!-- Form Select -->
									<div class="col-md-12 input-subject">
										<p class="p-lg">This question is about: </p>
										<span>Choose a topic, so we know who to send your request to: </span>
										<select class="form-select subject" aria-label="Default select example">
									    	<option selected>This question is about...</option>	
											<option>Registering/Authorising</option>
											<option>Using Application</option>
											<option>Troubleshooting</option>
											<option>Backup/Restore</option>
											<option>Other</option>
									    </select>
									</div>
																						
									<!-- Contact Form Input -->
									<div class="col-md-12">
										<p class="p-lg">Your Name: </p>
										<span>Please enter your full name: </span>
										<input type="text" name="name" class="form-control name" placeholder="Your Name*"> 
									</div>
												
									<div  class="col-md-12">
										<p class="p-lg">Your Email Address: </p>
										<span>Please carefully check your email address for accuracy</span>
										<input type="text" name="email" class="form-control email" placeholder="Email Address*"> 
									</div>
		
									<div class="col-md-12">
										<p class="p-lg">Explain your question in details: </p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="message" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 
																						
									<!-- Contact Form Button -->
									<div class="col-md-12 mt-15 form-btn text-right">	
										<button type="submit" class="btn btn--theme hover--theme submit">Submit Request</button>	
									</div>

									<div class="contact-form-notice">
										<p class="p-sm">At DealsIntel, we are dedicated to your success. Our team of experts is always ready to provide the support and guidance you need to achieve your goals. Don't hesitate to reach out – we're here to help you every step of the way. <a href="{{ route('privacy') }}">Privacy Policy</a>.
										</p>
									</div>
																															
									<!-- Contact Form Message -->
									<div class="col-lg-12 contact-form-msg">
										<span class="loading"></span>
									</div>	
																							
								</form>	
				 			</div>	
				 		</div>	
				 	</div>	   <!-- END CONTACT FORM -->


				</div>	   <!-- End container -->	
			</section>	<!-- END CONTACTS-1 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">




			@include('frontpages.components.blogsection')
			@include('frontpages.components.cta2')




			<!-- DIVIDER LINE -->
			<hr class="divider">

@endsection