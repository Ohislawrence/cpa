@extends('layouts.auth.layouts')

@section('headername',  'Create your Tracklia App')
@section('title',  'Sign Up' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image', asset("images/sign-up-page.jpg")  )
@section('description',  'Get full access to Tracklia with our free trial! Explore every feature designed
to help your business grow and see how our platform simplifies affiliate management.' )
@section('imagealt',  'Manage Affiliates for MAX profit' )


@section('header')

@endsection




@section('footer')

@endsection





@section('slot')

<div class="d-flex flex-column flex-root">
	<!--begin::Page bg image-->
	<style>body { background-image: url('assets/media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('assets/media/auth/bg10-dark.jpeg'); }</style>
	<!--end::Page bg image-->
	<!--begin::Authentication - Sign-in -->
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Aside-->
		<div class="d-flex flex-lg-row-fluid">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
				<!--begin::Image-->
				<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency.png" alt="" />
				<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="assets/media/auth/agency-dark.png" alt="" />
				<!--end::Image-->
				<!--begin::Title-->
				<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Start FREE for {{ \App\Models\plan::where('name','pro')->first()->free_days }} days</h1>
				<!--end::Title-->
				<!--begin::Text-->
				<div class="text-gray-600 fs-base text-center fw-semibold">Get full access to Tracklia with our {{ \App\Models\plan::where('name','pro')->first()->free_days }}-day free trial! 
				Explore every feature designed <br />to help your business grow and 
				see how our platform simplifies affiliate management. 
				<br />Start your free trial today—no commitment required!</div>
				<!--end::Text-->
			</div>
			<!--end::Content-->
		</div>
		<!--begin::Aside-->
		<!--begin::Body-->
		<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
			<!--begin::Wrapper-->
			<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
					<!--begin::Wrapper-->
					<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
						<!--begin::Form-->
							<!--begin::Heading-->
							<div class="text-center mb-11">
								<!--begin::Title-->
								<h1 class="text-gray-900 fw-bolder mb-3">Try Our {{ \App\Models\plan::where('name','pro')->first()->free_days }}-days Free Trial</h1>
								<!--end::Title-->
								<!--begin::Subtitle-->
								<div class="text-gray-500 fw-semibold fs-6">You're moments away from your shiny new affiliate program!</div>
								<!--end::Subtitle=-->
								@include('agency.errormessage')
							</div>
							<!--begin::Heading-->
							
							<!--end::Separator-->
							<!--begin::Input group=-->
							<form name="contactform" id="signupForm" method="POST" action="{{ route('start.post') }}" class="row contact-form">
								@csrf	
								<input type="text" name="username" style="display:none;">
							<div class="fv-row mb-8">
								<!--begin::Email--> 
								<input type="text" placeholder="Contact Name" name="name" class="form-control bg-transparent name" value="{{ old('name') }}" autocomplete="off"> 
								<!--end::Email-->
							</div>
							<div class="fv-row mb-8">
								<!--begin::Email-->
								<input type="text" placeholder="Business Name" name="business_name" class="form-control bg-transparent name" value="{{ old('business_name') }}" autocomplete="off"> 
								<!--end::Email-->
							</div>
							
							<div class="fv-row mb-8">
								<!--begin::Email-->
								<input type="email" placeholder="Business Email" name="business_email" class="form-control bg-transparent name" value="{{ old('business_email') }}" autocomplete="off"> 
								<!--end::Email-->
							</div>

							<div class="fv-row mb-8">
								<!--begin::Email-->
								<input type="url" placeholder="Your business website" name="website" class="form-control bg-transparent name" value="{{ old('website') }}" autocomplete="off"> 
								<!--end::Email-->
							</div>

							<!--end::Input group=-->
							<div class="fv-row mb-8">
								<!--begin::Site Name Input-->
								<div class="input-group">
									<input type="text" placeholder="Site Name" name="subdomain" class="form-control bg-transparent" 
										   value="{{ old('subdomain') }}" autocomplete="off" aria-describedby="appname">
									<span class="input-group-text" id="appname">.{{ env('TENANT_ROOT_URL') }}</span>
								</div>
								<!--end::Site Name Input-->
							</div>
							<!--end::Input group=-->

							<div class="fv-row mb-8">
								<!--begin::Email-->
								
								<select class="form-control bg-transparent" name="country" aria-label="">
									<option>Select country</option>
									@foreach (\App\Models\Country::all() as $country)
										<option value="{{ $country->id }}">{{ $country->name }}</option>
									@endforeach
									
								</select>
							</div>
							
							<!--begin::Submit button-->
							<div class="d-grid mb-10">
								<button type="submit" class="btn btn-primary">
									<!--begin::Indicator label-->
									<span class="indicator-label">Create your FREE Account</span>
								</button>
							</div>
							<!--end::Submit button-->
							
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Footer-->
					<div class="d-flex flex-stack">
						<!--begin::Languages-->
						<div class="me-10">
							
						</div>
						<!--end::Languages-->
						<!--begin::Links-->
						<div class="d-flex fw-semibold text-primary fs-base gap-5">
							<a href="{{ route('tos') }}" target="_blank">Terms</a>
							<a href="{{ route('pricing') }}" target="_blank">Pricing</a>
							<a href="{{ route('contactus') }}" target="_blank">Contact Us</a>
						</div>
						<!--end::Links-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Body-->
	</div>
	<!--end::Authentication - Sign-in-->
</div>
@endsection
