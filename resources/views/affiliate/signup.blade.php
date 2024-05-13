<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('layouts.frontcomponents.meta')
            
    <!-- SITE TITLE -->
    <title>Affiliate Sign Up | {{ config('app.name') }}</title>
                        
    @include('layouts.auth.header')
    @section('title',  'Sign Up' )
    @section('type',  '' )
    @section('url',  '' )
    @section('card',  '' )
    @section('description',  'Sign up as an affiliate on DealsINtel' )
    @section('imagealt',  '' )
    @section('card',  '' )
    @livewireStyles
</head>


	<body> 

		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">




			<!-- SIGN UP PAGE
			============================================= -->
			<div id="signup" class="bg--scroll login-section division">
				<div class="container">
					<div class="row justify-content-center">


						<!-- REGISTER PAGE WRAPPER -->
						<div class="col-lg-11">
							<div class="register-page-wrapper r-16 bg--fixed">	
								<div class="row">

                                    


									<!-- SIGN UP FORM -->
									<div class="col-md-6">
										<div class="register-page-form">
                                            <livewire:registration>
										</div>
                                        <!-- Log In Link -->	
												<div class="col-md-12">
													<p class="create-account text-center">
														Already have an account? <a href="{{ route('login') }}" class="color--theme">Log in</a>
													</p>
												</div> 
									</div>	<!-- END SIGN UP FORM -->


									<!-- SIGN UP PAGE TEXT -->
									<div class="col-md-6">
										<div class="register-page-txt color--white">


											<!-- Logo -->
											<img class="img-fluid" src="{{ asset('assets/media/logos/logo-dealsintel-light.png') }}" alt="logo-image">	

											<!-- Title -->
											<h2 class="s-48 w-700">Join as</h2>
											<h2 class="s-48 w-700">an Affiliate</h2>

											<!-- Text -->
											<p class="p-md mt-25">Unlock unlimited earning potential with access to a wide range of lucrative offers.
											</p>

											<!-- Copyright -->
											<div class="register-page-copyright">
												<p class="p-sm">&copy; {{ date('Y') }} Dealsintel. <span>All Rights Reserved</span></p>
											</div>

										</div>
									</div>	<!-- END SIGN UP PAGE TEXT -->


								</div>  <!-- End row -->
							</div>	<!-- End register-page-wrapper -->
						</div>	<!-- END REGISTER PAGE WRAPPER -->


			 		</div>	   <!-- End row -->	
			 	</div>	   <!-- End container -->		
			</div>	<!-- END SIGN UP PAGE -->




		</div>	<!-- END PAGE CONTENT -->	



        @include('layouts.auth.footer')
        @livewireScripts
	</body>
</html>