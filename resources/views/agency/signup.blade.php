@extends('layouts.guest')
@section('title',  'Sign Up as an Advertiser' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  '' )
@section('description',  'Unlock the full potential of your marketing campaigns by joining DealsIntel, the premier affiliate network trusted by top brands. Our platform connects you with high-performing affiliates, advanced tracking technology, and dedicated support to help you achieve your advertising goals. Ready to boost your ROI and scale your business? Sign up now to get started' )
@section('imagealt',  'advertiser sign up on dealsintel' )


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
								<h2 class="s-52 w-700">Advertiser Sign Up</h2>	
								<!-- Text -->	
								<p class="p-lg">Unlock the full potential of your marketing campaigns by joining DealsIntel, the premier affiliate network trusted by top brands. Our platform connects you with high-performing affiliates, advanced tracking technology, and dedicated support to help you achieve your advertising goals. Ready to boost your ROI and scale your business? Sign up now to get started!
								</p>
									
							</div>	
						</div>
					</div>


					<!-- CONTACT FORM -->
				 	<div class="row justify-content-center">	
				 		<div class="col-md-11 col-lg-10 col-xl-8">
				 			<div class="form-holder">
								<form name="contactform" class="row contact-form">
													
									<!-- Contact Form Input -->
									<div class="col-md-12">
										<p class="p-lg">Company/Business Name:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="text" name="companyname" class="form-control name" placeholder="Your Name*"> 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Website:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="url" name="brandurl" class="form-control name" placeholder="Your Name*"> 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Address:
                                            *</p>
										<span>Please enter your full name: </span>
										<input type="text" name="brandaddress" class="form-control name" placeholder="Your Name*"> 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">City:</p>
										<span>Please enter your full name: </span>
										<input type="text" name="city" class="form-control name" placeholder="Your Name*"> 
									</div>

                                    <div class="col-md-12 input-subject">
										<p class="p-lg">Country:
                                        </p>
										<span>Choose a topic, so we know who to send your request to: </span>
										<select class="form-select subject" name="country" aria-label="Default select example">
									    	<option selected>This question is about...</option>	
											<option>Registering/Authorising</option>
											<option>Using Application</option>
											<option>Troubleshooting</option>
											<option>Backup/Restore</option>
											<option>Other</option>
									    </select>
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Phone:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="text" name="phonenumber" class="form-control name" placeholder="Your Name*"> 
									</div>
											
                                    <hr class="divider">
                                    
                                    <div class="col-md-12">
										<p class="p-lg">Title:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="text" name="name" class="form-control name" placeholder="Your Name*"> 
									</div>
                                    <div class="col-md-12">
										<p class="p-lg">Contact Name:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="text" name="name" class="form-control name" placeholder="Your Name*"> 
									</div>

									<div  class="col-md-12">
										<p class="p-lg">Business Email: </p>
										<span>Please carefully check your email address for accuracy</span>
										<input type="text" name="email" class="form-control email" placeholder="Email Address*"> 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Password:
                                            * </p>
										<span>Please enter your full name: </span>
										<input type="password" name="password" class="form-control name" placeholder="Your Name*"> 
									</div>

                                    <hr class="divider">

                                    <div class="col-md-12">
										<p class="p-lg">What is the name of the brand(s) you'd like us to promote?:
                                            *</p>
										<span>Please enter your full name: </span>
										<input type="text" name="brandname" class="form-control name" placeholder="Your Name*"> 
									</div>

									<div class="col-md-12">
										<p class="p-lg">Please provide a short description of the brand(s).:
                                            * </p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="branddesc" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 

                                    <div class="col-md-12">
										<p class="p-lg">Please provide URLs in order for us to preview the brand(s):
                                            *</p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="brandproductlandingurl" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 

                                    <div class="col-md-12 input-subject">
										<p class="p-lg">What category (vertical) do(es) your products belong to?:
                                            *
                                        </p>
										<span>Choose a topic, so we know who to send your request to: </span>
										<select class="form-select subject" name="category_id" aria-label="Default select example">
									    	<option selected>This question is about...</option>	
											<option>Registering/Authorising</option>
											<option>Using Application</option>
											<option>Troubleshooting</option>
											<option>Backup/Restore</option>
											<option>Other</option>
									    </select>
									</div>

                                    <div class="col-md-12 input-subject">
										<p class="p-lg">Is this brand exclusive to or owned by your company? :
                                            *
                                        </p>
										<span>Choose a topic, so we know who to send your request to: </span>
										<select class="form-select subject" aria-label="Default select example">
									    	<option selected>This question is about...</option>	
											<option>Registering/Authorising</option>
											
									    </select>
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">What countries/geos are you targeting?:
                                            *</p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="brandtargetgeos" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 

                                    <div class="col-md-12 input-subject">
										<p class="p-lg">Do you support S2S Postbacks?:
                                            *
                                        </p>
										<span>Note that we only use server-to-server tracking: </span>
										<select class="form-select subject" name="brandtracking" aria-label="Default select example">
									    	<option selected>Yes</option>	
											<option>No</option>
											
									    </select>
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Please provide your Telegram username:
                                            *
                                        </p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="brandinstantmessageid" rows="3" placeholder="I have a problem with..."></textarea>
									</div> 

                                    <div class="col-md-12">
										<p class="p-lg">What is your monthly budget?:
                                            *</p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="brandmonthlybudget" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 

                                    <div class="col-md-12">
										<p class="p-lg">Feel free to include any other information you want to share:
                                        </p>
										<span>We will get back to you via email.</span>
										<textarea class="form-control message" name="note" rows="6" placeholder="I have a problem with..."></textarea>
									</div> 
																						
									<!-- Contact Form Button -->
									<div class="col-md-12 mt-15 form-btn text-right">	
										<button type="submit" class="btn btn--theme hover--theme submit">Sign Up</button>	
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

@endsection