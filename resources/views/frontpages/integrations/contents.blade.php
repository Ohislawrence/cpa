@extends('layouts.guest')
@section('title',  'Integrate with '.$integration->appname )
@section('type',  'website' )
@section('url',  Request::url() )
@section('image',  url('images/integration/fimages/'.$integration->fImage) )
@section('description',  'Tracklia has been built to integrate with your favourite apps and even custom ones.' )
@section('imagealt',  'Tracklia integrates with '.$integration->appname )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')

<section id="project-1" class="gr--whitesmoke inner-page-hero single-project">
    <div class="container">
        <div class="row justify-content-center">	


            <!-- PROJECT DISCRIPTION -->
            <div class="col-lg-11 col-xl-10">
                <div class="project-description">


                    <!-- PROJECT TITLE -->
                    <div class="project-title">
                        
                        <!-- Title -->	
                        <h2 class="s-52 w-700">{{ $integration->appname }}</h2>

                        <!-- Project Data -->
                        <div class="project-data">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

                                <div class="col">
                                    <p class="p-lg"><span>Category:</span> {{ $integration->appcategory->name }}</p>
                                </div>

                                <div class="col">
                                    <p class="p-lg"><span>Type:</span> {{ $integration->apptype->name }}</p>
                                </div>

                                <div class="col">
                                    <p class="p-lg"><span>Updated:</span> {{ $integration->updated_at->format('Y-m-d') }}</p>
                                </div>

                                

                            </div>
                        </div>

                    </div>	<!-- END PROJECT TITLE -->


                    <!-- PROJECT PREVIEW IMAGE  -->
                     <div class="project-priview-img mb-50">
                        <img class="img-fluid r-16" src="{{ url('images/integration/fimages/'.$integration->fImage) }}" alt="{{ $integration->appname }} image">	
                    </div>


                    <!-- PROJECT TEXT -->
                    <div class="project-txt">

                        {!! $integration->desc !!}


                    </div>	<!-- END PROJECT TEXT -->


                    <!-- MORE PROJECTS BUTTON -->
                    <div class="more-projects ico-25 text-end pb-100">
                        <a href="{{ route('support') }}">
                            <h3 class="s-38 w-700">See Support Areas</h3><span class="flaticon-next"></span>
                        </a>
                    </div>


                </div>
            </div>	<!-- END PROJECT DISCRIPTION -->


        </div>	  <!-- End row -->
    </div>	   <!-- End container -->	
</section>	<!-- END SINGLE PROJECT-1 -->
@include('frontpages.components.cta2')
@endsection