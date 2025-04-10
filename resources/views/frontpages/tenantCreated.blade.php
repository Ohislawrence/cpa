@extends('layouts.guest')
@section('title',  'Congratulations, your web app is ready!' )
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
					<!-- SECTION TITLE -->	
					<div class="row justify-content-center">	
						<div class="col-md-10 col-lg-9">
							<div class="section-title text-center mb-80">
									

								<!-- Title -->	
								<h2 class="s-52 w-700">Your request has been successfully received!</h2>	
								<!-- Text -->	
								<p class="p-lg">Hang tight! We’re creating your affiliate dashboard on {{ $sub }}.tracklia.com, you’ll get an email shortly.
								</p>
									
							</div>	
						</div>
					</div>

					


				</div>	   <!-- End container -->	
			</section>	<!-- END CONTACTS-1 -->






			<!-- DIVIDER LINE -->
			<hr class="divider">

@endsection