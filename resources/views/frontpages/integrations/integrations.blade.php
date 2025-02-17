@extends('layouts.guest')
@section('title',  'Integrations' )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  asset("images/tracklia-page.jpg") )
@section('description',  'Streamline your affiliate program management with Tracklia! Seamlessly integrate your favorite apps, automate workflows, and optimize your affiliate marketing strategy—all in one powerful platform.' )
@section('imagealt',  'See to Tracklia integrates with various apps' )


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
            <h2 class="s-52 w-700">Explore </h2>	

            <!-- Text -->	
            <p class="s-21 color--grey">Streamline your affiliate program management with Tracklia! Seamlessly integrate your favorite apps, automate workflows, and optimize your affiliate marketing strategy—all in one powerful platform.</p>
                
        </div>	
    </div>
</div>


<!-- INTEGRATIONS-1 WRAPPER -->
<div class="integrations-1-wrapper">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 rows-2">


        <!-- TOOL #1 -->
        @foreach ( $supportareas as $supportarea)
        <div class="col">
            <a href="{{ route('support.content',[$supportarea->support->slug,$supportarea->slug]) }}" class="in_tool it-1 r-12 mb-30 wow fadeInUp">

                <!-- Icon -->
                <div class="in_tool-logo-wrap">
                    <div class="in_tool-logo ico-60">
                       <img class="img-fluid" src="{{ url('images/integration/icons/'.$supportarea->icon) }}" alt="brand-logo">
                   </div>
               </div>
               <!-- Text -->
               <div class="in_tool-txt">
                   <h6 class="s-20 w-700">{{ $supportarea->appname }}</h6>
                   <p class="p-sm">{{ $supportarea->shortDesc }}</p>
               </div>

            </a>
        </div>	<!-- END FEATURE BOX #1 -->	
        @endforeach
</div>     <!-- End container -->
</section>	<!-- END INTEGRATIONS-1 -->
@include('frontpages.components.cta2')
@endsection