@extends('layouts.guest')
@section('title',  $blog->title )
@section('type',  '' )
@section('url',  '' )
@section('card',  '' )
@section('description',  '' )
@section('imagealt',  '' )
@section('card',  '' )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<section id="blog-page" class="pb-60 inner-page-hero blog-page-section">
				<div class="container">
        <div class="row justify-content-center">	


            <!-- SINGLE POST CONTENT -->
            <div class="col-xl-10">
                <div class="post-content">


                    <!--  SINGLE POST TITLE -->
                    <div class="single-post-title text-center">

                        <!-- Post Tag -->
                        <span class="post-tag color--green-400">{{ $blog->cat->category }}</span>	

                        <!-- Title -->
                        <h2 class="s-46 w-700">{{$blog->title}}</h2>

                        <!-- Post Meta -->
                        <div class="blog-post-meta mt-35">
                            <ul class="post-meta-list ico-10">
                                <li><p class="p-md w-500">By {{ $blog->user->name }}</p></li>
                                <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                <li><p class="p-md">{{$blog->created_at->format("M d,Y")}}</p></li>
                            </ul>
                        </div>

                    </div>	<!-- END SINGLE POST TITLE -->


                    <!-- SINGLE POST IMAGE -->
                    <div class="blog-post-img py-50">
                        <img class="img-fluid r-16" src="{{ asset('blogimages/'.$blog->banner) }}" alt="{{ $blog->slug }}">	
                    </div>


                    <!-- SINGLE POST TEXT -->
                    <div class="single-post-txt">

                        {!! $blog->desc !!}  

                    </div>	<!-- END SINGLE POST TEXT -->


                    <!-- SINGLE POST SHARE LINKS -->
                    <div class="row">
                        <div class="col post-share-list">
                            <ul class="share-social-icons ico-20 text-center clearfix">						
                                <li><a href="#" class="share-ico"><span class="flaticon-twitter"></span></a></li>
                                <li><a href="#" class="share-ico"><span class="flaticon-facebook"></span></a></li>
                                <li><a href="#" class="share-ico"><span class="flaticon-bookmark"></span></a></li>
                            </ul>
                        </div>
                    </div>	<!-- END SINGLE POST SHARE -->
                </div>
            </div>	<!-- END  SINGLE POST CONTENT -->


        </div>    <!-- End row -->
    </div>    <!-- End container -->
</section>	<!-- END SINGLE POST -->


    @include('frontpages.components.keepreading')


@endsection