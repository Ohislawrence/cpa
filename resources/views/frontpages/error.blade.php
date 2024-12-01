@extends('layouts.guest')
@section('title',  'Error' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("publicassets/images/ogimg.jpg") )
@section('description',  'An error has occured' )
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


					


				</div>	   <!-- End container -->	
			</section>	<!-- END CONTACTS-1 -->

            <div class="col-md-12 text-center">
                <h1>404</h1>
                <h2>Error has occured</h2>
                <p>
                    Sorry, that this happened, kindly try again, contact us if it happens again.
                </p>
            </div>


			<!-- DIVIDER LINE -->
			<hr class="divider">

@endsection