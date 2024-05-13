@extends('layouts.guest')
@section('title',  'Lists' )
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
<!-- BLOG POSTS LISTING
			============================================= -->
			<section id="blog-page" class="pb-60 inner-page-hero blog-page-section">
				<div class="container">
                    <!-- BLOG POSTS CATEGORY --> 
					<div class="row">
						<div class="col">
							<div class="posts-category ico-20 wow fadeInUp">
								<h4 class="s-34 w-700">Featured articles <span class="flaticon-next"></span></h4>
							</div>
						</div>
					</div>


                    <!-- WIDE BLOG POST -->
					<div class="blog-post wide-post wow fadeInUp">
                        <div class="row d-flex align-items-center">

                                   
                           <!-- BLOG POST IMAGE -->
                            <div class="col-md-6">
                                <div class="blog-post-img">
                                   <img class="img-fluid r-16" src="{{ asset('publicassets/images/blog/post-11-img.jpg') }}" alt="blog-post-image">
                               </div>	
                           </div>


                           <!-- BLOG POST TEXT -->
                           <div class="col-md-6">
                               <div class="blog-post-txt">

                                   <!-- Post Tag -->
                                   <span class="post-tag color--blue-400">Social Media Marketing</span>	

                                   <!-- Post Link -->
                                   <h3 class="s-38 w-700">
                                       <a href="single-post.html">Congue magna tempor and ipsum Martex sapien turpis 
                                          laoreet augue
                                       </a>
                                   </h3>

                                   <!-- Text -->
                                   <p>Aliqum mullam blandit vitae and tempor sapien and donec lipsum gravida porta undo 
                                       velna dolor libero a risus aliquet tempus posuere a tempor velna tempus posuere dolor
                                   </p>

                                   <!-- Post Meta -->
                                   <div class="blog-post-meta mt-30">
                                       <ul class="post-meta-list ico-10">
                                           <li><p class="w-500">By Martex Team</p></li>
                                           <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
                                           <li><p>Apr 28, 2023</p></li>
                                       </ul>
                                   </div>

                               </div>
                           </div>	<!-- END BLOG POST TEXT -->


                       </div>   <!-- End row -->
                    </div>	<!-- END WIDE BLOG POST -->

                   <!-- BLOG POSTS CATEGORY --> 
					<div class="row">
						<div class="col">
							<div class="posts-category ico-20 wow fadeInUp">
								<h4 class="s-34 w-700">Articles <span class="flaticon-next"></span></h4>
							</div>
						</div>
					</div>


					<!-- POSTS WRAPPER -->
					<div class="posts-wrapper">
						<div class="row">

							@forelse ($blogs as $blog )
								<!-- BLOG POST #7 -->
								<div class="col-md-6 col-lg-4">
									<div class="blog-post mb-40 wow fadeInUp clearfix">	
   
   
										<!-- BLOG POST IMAGE -->
										<div class="blog-post-img mb-35">
											<a href="{{ route('blogsingle', ['cat'=> $blog->cat->category , 'slug'=>$blog->slug]) }}">
										   <img class="img-fluid r-16" src="{{ asset('blogimages/'.$blog->banner) }}" alt="{{ $blog->slug }}">
											</a>
									   </div>	
   
   
									   <!-- BLOG POST TEXT -->
									   <div class="blog-post-txt">
   
										   <!-- Post Tag -->
										   <span class="post-tag color--red-400">{{ $blog->cat->category }}</span>	
   
										   <!-- Post Link -->
										   <h6 class="s-20 w-700">
											   <a href="{{ route('blogsingle', ['cat'=> $blog->cat->slug , 'slug'=>$blog->slug]) }}">{{$blog->title}}
											   </a>
										   </h6>
   
										   <!-- Text -->
										   <p>{{  Str::limit(strip_tags($blog->desc, 100))  }}
										   </p>
   
										   <!-- Post Meta -->
										   <div class="blog-post-meta mt-20">
											   <ul class="post-meta-list ico-10">
												   <li><p class="p-sm w-500">{{ $blog->user->name }}</p></li>
												   <li class="meta-list-divider"><p><span class="flaticon-minus"></span></p></li>
												   <li><p class="p-sm">{{$blog->created_at->format("M d,Y")}}</p></li>
											   </ul>
										   </div>
   
									   </div>	<!-- END BLOG POST TEXT -->
   
   
									</div>
								</div>	<!-- END BLOG POST #7 -->
							@empty
								
							@endforelse
							
						</div>  <!-- End row -->
					</div>	<!-- END POSTS WRAPPER -->


				</div>	   <!-- End container -->	
			</section>	<!-- END BLOG POSTS LISTING -->

            <!-- PAGE PAGINATION
			============================================= -->
			<div class="pb-100 page-pagination theme-pagination">
				<div class="container">
					<div class="row">	
						<div class="col-md-12">
							<nav aria-label="Page navigation">
								<ul class="pagination ico-20 justify-content-center">
							    	<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><span class="flaticon-back"></span></a>
							    	</li>
								    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
								    <li class="page-item"><a class="page-link" href="#">2</a></li>
								    <li class="page-item"><a class="page-link" href="#">3</a></li>
								    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span class="flaticon-next"></span></a></li>
								</ul>
							</nav>
						</div>
					</div>  <!-- End row -->	
				</div> <!-- End container -->
			</div>	<!-- END PAGE PAGINATION -->
            
			<!-- DIVIDER LINE -->
			<hr class="divider">




			<!-- NEWSLETTER-1
			============================================= -->
			<section id="newsletter-1" class="newsletter-section">
				<div class="newsletter-overlay">
					<div class="container">
						<div class="row d-flex align-items-center row-cols-1 row-cols-lg-2">


							<!-- NEWSLETTER TEXT -->	
							<div class="col">
								<div class="newsletter-txt">	
									<h4 class="s-34 w-700">Stay up to date with our news, ideas and updates</h4>	
								</div>								
							</div>


							<!-- NEWSLETTER FORM -->
							<div class="col">
								<form class="newsletter-form">
											
									<div class="input-group">
										<input type="email" autocomplete="off" class="form-control" placeholder="Your email address" required id="s-email">								
										<span class="input-group-btn">
											<button type="submit" class="btn btn--theme hover--theme">Subscribe Now</button>
										</span>										
									</div>

									<!-- Newsletter Form Notification -->	
									<label for="s-email" class="form-notification"></label>
												
								</form>							
							</div>	  <!-- END NEWSLETTER FORM -->


						</div>	  <!-- End row -->
					</div>    <!-- End container -->	
				</div>     <!-- End newsletter-overlay -->
			</section>	<!-- END NEWSLETTER-1 -->




			<!-- DIVIDER LINE -->
			<hr class="divider">
@endsection