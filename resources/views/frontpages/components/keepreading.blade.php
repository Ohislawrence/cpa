 <!-- BLOG-1
			============================================= -->
			<section id="blog-1" class="py-100 blog-section division">
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

						<!-- POSTS WRAPPER -->
					<div class="posts-wrapper">
						<div class="row">

							@forelse (\App\Models\Blog::where('category', $blog->category)->take(3)->get() as $blog )
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
					</div>
				</div>    <!-- End container -->
				</div>
			</section>	<!-- END BLOG-1 -->