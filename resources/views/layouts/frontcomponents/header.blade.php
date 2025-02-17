<!-- HEADER
			============================================= -->
			<header id="header" class="tra-menu navbar-dark light-hero-header white-scroll">
				<div class="header-wrapper">


					<!-- MOBILE HEADER -->
				    <div class="wsmobileheader clearfix">	  	
				    	<span class="smllogo"><img src="{{ asset('assets/media/logos/tracklia_black_logo.png') }}" alt="mobile-logo"></span>
				    	<a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>	
				 	</div>


				 	<!-- NAVIGATION MENU -->
				  	<div class="wsmainfull menu clearfix">
	    				<div class="wsmainwp clearfix">


	    					<!-- HEADER BLACK LOGO -->
	    					<div class="desktoplogo">
	    						<a href="{{route('home')}}" class="logo-black">
	    							<img class="light-theme-img" src="{{ asset('assets/media/logos/tracklia_black_logo.png') }}" alt="logo">
	    							<img class="dark-theme-img" src="{{ asset('assets/media/logos/tracklia_white_logo.png') }}" alt="logo">
	    						</a>
	    					</div>

	    					<!-- HEADER WHITE LOGO -->
	    					<div class="desktoplogo">
	    						<a href="{{route('home')}}" class="logo-white"><img src="{{ asset('assets/media/logos/tracklia_white_logo.png') }}" alt="logo"></a>
	    					</div>


	    					<!-- MAIN MENU -->
	      					<nav class="wsmenu clearfix">
	        					<ul class="wsmenu-list nav-theme">

							    	<li class="nl-simple" aria-haspopup="true"><a href="{{ route('home') }}#how_it_works" class="h-link">How it works</a></li>

							    	<li class="nl-simple" aria-haspopup="true"><a href="{{ route('home') }}#tracklia_features" class="h-link">Features</a></li>

									<li class="nl-simple" aria-haspopup="true"><a href="{{ route('app.support', ['integrations']) }}" class="h-link">Integrations</a></li>

							    	<li class="nl-simple" aria-haspopup="true"><a href="{{ route('pricing') }}" class="h-link">Pricing</a></li>

                                    <li class="nl-simple" aria-haspopup="true"><a href="{{ route('blogs') }}" class="h-link">Blogs</a></li>

									@guest()
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="{{route('start')}}" class="btn r-04 btn--theme hover--theme last-link">Sign up</a>
								    </li> 
									@else
									<!-- SIGN UP BUTTON -->
								    <li class="nl-simple" aria-haspopup="true">
								    	<a href="{{route('dashboard')}}" class="btn r-04 btn--theme hover--theme last-link">Dashboard</a>
								    </li> 
									@endguest

	        					</ul>
	        				</nav>	<!-- END MAIN MENU -->


	    				</div>
	    			</div>	<!-- END NAVIGATION MENU -->


				</div>     <!-- End header-wrapper -->
			</header>	<!-- END HEADER -->
