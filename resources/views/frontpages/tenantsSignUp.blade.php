@extends('layouts.guest')
@section('title',  'Sign Up for AffiliateFuse' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  '' )
@section('description',  '' )
@section('imagealt',  'Manage Affiliates for MAX profit' )


@section('header')

@endsection




@section('footer')


@endsection



@section('slot')
<!-- CONTACTS-1
			============================================= -->
			<section id="contacts-1" class="pb-50 inner-page-hero contacts-section division">				
				<div class="container">

					@include('agency.errormessage')
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title text-center mb-80">
									

								<!-- Title -->	
								<h2 class="s-52 w-700">Try Our {{ \App\Models\plan::where('name','pro')->first()->free_days }}-days Free Trial</h2>	
								<!-- Text -->	
								<p class="p-lg">You're moments away from your shiny new affiliate program!
								</p>
									
							</div>	
						</div>
					</div>

					<!-- CONTACT FORM -->
				 	<div class="row justify-content-center">	
				 		<div class="col-md-11 col-lg-10 col-xl-8">
				 			<div class="form-holder">
								<form name="contactform" id="signupForm" method="POST" action="{{ route('start.post') }}" class="row contact-form">
										@csrf	
										<input type="text" name="username" style="display:none;">		
									<!-- Contact Form Input -->
									<div class="col-md-12">
										<p class="p-lg">Company Name:
                                            * </p>
										<span>Full company name: </span>
										<input type="text" name="business_name" class="form-control name" value="{{ old('business_name') }}" > 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Site Name:
                                            * </p>
										<span>This is usually your business name: </span>
                                        <div class="input-group mb-3">
										<input type="text" name="subdomain" class="form-control" value="{{ old('subdomain') }}" > 
                                        <span class="input-group-text">.{{ env('TENANT_ROOT_URL') }}</span>
                                        </div>
									</div>

                                    

                                    <div class="col-md-12">
										<p class="p-lg">Contact Name:
                                            * </p>
										<span>The name of the contact person: </span>
										<input type="text" name="name" class="form-control name"> 
									</div>

                                    <div  class="col-md-12">
										<p class="p-lg">Business Email: </p>
										<span>Please carefully check your email address for accuracy, your sign in details will be sent to it</span>
										<input type="text" name="business_email" class="form-control email"> 
									</div>

                                    <div class="col-md-12">
										<p class="p-lg">Business Website:
                                            * </p>
										<span>The url of the business: </span>
										<input type="url" name="website" class="form-control name" > 
									</div>



                                    <div class="col-md-12 input-subject">
										<p class="p-lg">Country:
                                        </p>
										<span>Where your business operates: </span>
										<select class="form-select subject" name="country" aria-label="">
												<option>Select country</option>
											@foreach (\App\Models\Country::all() as $country)
												<option value="{{ $country->id }}">{{ $country->name }}</option>
											@endforeach
									    	
									    </select>
									</div>
				
									<!-- Contact Form Button -->
									<div class="col-md-12 mt-15 form-btn text-right">	
										<button type="submit" class="btn btn--theme hover--theme submit">
										Sign Up</button>	
									</div>

									<div class="contact-form-notice">
										<p class="p-sm">At {{ env('APP_NAME') }}, we are dedicated to your success. Our team of experts is always ready to provide the support and guidance you need to achieve your goals. Don't hesitate to reach out – we're here to help you every step of the way. <a href="{{ route('privacy') }}">Privacy Policy</a>.
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