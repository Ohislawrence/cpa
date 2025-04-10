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
								<p class="p-lg">At Tracklia, we believe in being accessible, transparent, and helpful. Whether you’re a customer, a curious visitor, or a future partner, we’re here to assist you.</p>
								
							</div>	
						</div>
					</div>

			<!-- SECTION TITLE -->	
			<div class="row justify-content-center">	
				<div class="col-md-10 col-lg-9">
					<div class="section-title text-center mb-80">
					<h2 class="s-30 w-700">📱 Follow & Connect</h2>
						<p>Stay in the loop, get updates, and connect with us on social:</p>
						<ul>
							<li><a href='https://x.com/tracklia' target="_blank">x.com/tracklia</a></li>
							<li><a href='https://www.linkedin.com/company/tracklia' target="_blank">linkedin.com/tracklia</a></li>
							<li><a href='https://www.facebook.com/tracklia' target="_blank">FB.com/tracklia</a></li>
						</ul>
					</div>	
				</div>
			</div>

			<!-- SECTION TITLE -->	
			<div class="row justify-content-center">	
				<div class="col-md-10 col-lg-9">
					<div class="section-title text-center mb-80">
					<h2 class="s-30 w-700">📞 Get in Touch</h2>
						<p>Email us directly</p>
						<p><a href='mailto:business@tracklia.com'>📩 business@tracklia.com</a></p>
						<p>We typically respond within 1 business day.</p>
					</div>	
				</div>
			</div>


					


				</div>	   <!-- End container -->	
			</section>	<!-- END CONTACTS-1 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">




			@include('frontpages.components.blogsection')
			@include('frontpages.components.cta2')




			<!-- DIVIDER LINE -->
			<hr class="divider">

@endsection