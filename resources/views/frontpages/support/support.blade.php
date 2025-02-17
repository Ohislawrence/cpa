@extends('layouts.guest')
@section('title',  'Supports' )
@section('type',  'webiste' )
@section('url',  Request::url() )
@section('image',  asset("images/tracklia-page.jpg") )
@section('description',  '' )
@section('imagealt',  ' Tracklia support' )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<section class="gr--whitesmoke ct-08 inner-page-hero content-section division">
    <div class="container">
<!-- SECTION TITLE -->	
<div class="row justify-content-center">	
    <div class="col-md-10 col-lg-9">
        <div class="section-title mb-70">	

            <!-- Title -->	
            <h2 class="s-52 w-700">We are here for you</h2>	

            <!-- Text -->	
            <p class="s-21 color--grey">Tracklia Support: Helping You Grow, One Affiliate at a Time!</p>
                
        </div>	
    </div>
</div>


<!-- INTEGRATIONS-1 WRAPPER -->
<div class="integrations-1-wrapper">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 rows-2">


        <!-- TOOL #1 -->
        @foreach ( $supports as $support)
        <div class="col">
            <a href="{{ route('app.support',[$support->slug]) }}" class="in_tool it-1 r-12 mb-30 wow fadeInUp">

               
               <!-- Text -->
               <div class="in_tool-txt">
                   <h6 class="s-20 w-700">{{ $support->name }}</h6>
                   <p class="p-sm"></p>
               </div>

            </a>
        </div>	<!-- END FEATURE BOX #1 -->	
        @endforeach
</div>     <!-- End container -->
</section>	<!-- END INTEGRATIONS-1 -->
@include('frontpages.components.cta2')
@endsection