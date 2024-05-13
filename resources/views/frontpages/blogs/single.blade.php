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
                                <li><p class="p-md w-500">By Melissa McClone</p></li>
                                <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                <li><p class="p-md">April 29, 2023</p></li>
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




<!-- BLOG-1
============================================= -->
<section id="blog-1" class="bg--white-300 py-100 blog-section division">
    <div class="container">


        <!-- SECTION TITLE -->	
        <div class="row justify-content-center">	
            <div class="col-md-10 col-lg-9">
                <div class="section-title mb-70">	

                    <!-- Title -->	
                    <h2 class="s-50 w-700">Keep Reading...</h2>	
                        
                </div>	
            </div>
        </div>


        <div class="row">


            <!-- BLOG POST #1 -->
            <div class="col-md-6 col-lg-4">
                <div id="bp-1-1" class="blog-post wow fadeInUp">	

                    <!-- BLOG POST IMAGE -->
                    <div class="blog-post-img mb-35">
                        <img class="img-fluid r-16" src="images/blog/post-8-img.jpg" alt="blog-post-image">
                    </div>	

                    <!-- BLOG POST TEXT -->
                    <div class="blog-post-txt">

                        <!-- Post Tag -->
                        <span class="post-tag color--pink-400">Product News</span>	

                        <!-- Post Link -->
                        <h6 class="s-20 w-700">
                            <a href="single-post.html">Aliqum mullam porta blandit: tempor sapien and gravida</a>
                        </h6>

                        <!-- Text -->
                        <p>Egestas luctus vitae augue and ipsum ultrice quisque in cursus lacus feugiat congue 
                            diam ultrice laoreet sagittis
                        </p>

                        <!-- Post Meta -->
                        <div class="blog-post-meta mt-20">
                            <ul class="post-meta-list ico-10">
                                <li><p class="p-sm w-500">By Helen J.</p></li>
                                <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                <li><p class="p-sm">Apr 28, 2023</p></li>
                            </ul>
                        </div>

                    </div>	<!-- END BLOG POST TEXT -->

                </div>
            </div>	<!-- END BLOG POST #1 -->


            <!-- BLOG POST #2 -->
            <div class="col-md-6 col-lg-4">
                <div id="bp-1-2" class="blog-post wow fadeInUp">	

                    <!-- BLOG POST IMAGE -->
                    <div class="blog-post-img mb-35">
                        <img class="img-fluid r-16" src="images/blog/post-2-img.jpg" alt="blog-post-image">
                    </div>	

                    <!-- BLOG POST TEXT -->
                    <div class="blog-post-txt">

                        <!-- Post Tag -->
                        <span class="post-tag color--green-400">Community</span>	

                        <!-- Post Link -->
                        <h6 class="s-20 w-700">
                            <a href="single-post.html">Porttitor cursus fusce egestas CEO cursus at magna sapien 
                                suscipit and egestas ipsum
                            </a>
                        </h6>

                        <!-- Text -->
                        <p>Aliqum mullam ipsum vitae and blandit vitae tempor sapien and donec lipsum</p>

                        <!-- Post Meta -->
                        <div class="blog-post-meta mt-20">
                            <ul class="post-meta-list ico-10">
                                <li><p class="p-sm w-500">By Martex Team</p></li>
                                <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                <li><p class="p-sm">Apr 14, 2023</p></li>
                            </ul>
                        </div>

                    </div>	<!-- END BLOG POST TEXT -->
                    
                </div>
            </div>	<!-- END BLOG POST #2 -->


            <!-- BLOG POST #3 -->
            <div class="col-md-12 col-lg-4">
                <div id="bp-1-3" class="blog-post wow fadeInUp">	

                    <!-- BLOG POST IMAGE -->
                    <div class="blog-post-img mb-35">
                        <img class="img-fluid r-16" src="images/blog/post-5-img.jpg" alt="blog-post-image">
                    </div>	

                    <!-- BLOG POST TEXT -->
                    <div class="blog-post-txt">

                        <!-- Post Tag -->
                        <span class="post-tag color--purple-400">Freelancer Tips</span>	

                        <!-- Post Link -->
                        <h6 class="s-20 w-700">
                            <a href="single-post.html">Cubilia laoreet augue egestas and Martex magna impedit</a>
                        </h6>

                        <!-- Text -->
                        <p>Luctus vitae egestas augue and ipsum ultrice quisque in cursus lacus feugiat egets 
                            congue ultrice sagittis laoreet 
                        </p>

                        <!-- Post Meta -->
                        <div class="blog-post-meta mt-20">
                            <ul class="post-meta-list ico-10">
                                <li><p class="p-sm w-500">By Miranda Green</p></li>
                                <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                <li><p class="p-sm">Mar 27, 2023</p></li>
                            </ul>
                        </div>

                    </div>	<!-- END BLOG POST TEXT -->
                    
                </div>
            </div>	<!-- END BLOG POST #3 -->

        </div>    <!-- End row -->
        </div>    <!-- End container -->
</section>	<!-- END BLOG-1 -->


@endsection