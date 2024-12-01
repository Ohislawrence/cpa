<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('layouts.frontcomponents.meta')
            
    <!-- SITE TITLE -->
    <title>Login | {{ config('app.name') }}</title>
                        
    @include('layouts.auth.header')

    @section('title',  'Login' )
    @section('type',  '' )
    @section('url',  '' )
    @section('card',  '' )
    @section('description',  '' )
    @section('imagealt',  '' )
    @section('card',  '' )



</head>




<body> 




		<!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">




			<!-- LOGIN PAGE
			============================================= -->
			<div id="login" class="bg--scroll login-section division">
				<div class="container">
					<div class="row justify-content-center">


						<!-- REGISTER PAGE WRAPPER -->
						<div class="col-lg-11">
							<div class="register-page-wrapper r-16 bg--fixed">	
								<div class="row">


									<!-- LOGIN PAGE TEXT -->
									<div class="col-md-6">
										<div class="register-page-txt color--white">

											<!-- Logo -->
											<img class="img-fluid" src="{{ asset('assets/media/logos/logo-dealsintel-light.png') }}" alt="logo-image">		

											<!-- Title -->
											<h2 class="s-42 w-700">Welcome</h2>
											<h2 class="s-42 w-700">back to DealsIntel</h2>

											<!-- Text -->
											<p class="p-md mt-25">Ready to take your affiliate marketing efforts to the next level?
											</p>

											<!-- Copyright -->
											<div class="register-page-copyright">
												<p class="p-sm">&copy; {{ date('Y') }} DealsIntel. <span>All Rights Reserved</span></p>
											</div>

										</div>
									</div>	<!-- END LOGIN PAGE TEXT -->


									<!-- LOGIN FORM -->
									<div class="col-md-6">
										<div class="register-page-form">

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.check.post') }}" class="row sign-in-form">
            
            @csrf

            <!-- Google Button -->	
            <div class="col-md-12">
                <a  href="#" class="btn btn-google ico-left">
                    <img src="{{ asset('publicassets/images/png_icons/google.png') }}" alt="google-icon"> Sign in with Google
                </a>
            </div>  

            <!-- Login Separator -->
            <div class="col-md-12 text-center">	
                <div class="separator-line">Or, sign in with your email</div>
            </div>

            <div class="col-md-12">
                <p class="p-sm input-header">Email address</p>
                <input id="email" class="form-control email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="col-md-12">
                <p class="p-sm input-header">Password</p>
                <div class="wrap-input">
                    <span class="btn-show-pass ico-20"><span class="flaticon-visibility eye-pass"></span></span>
                <input id="password" class="form-control password" type="password" name="password" required autocomplete="current-password" />
            </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="col-md-12">
                <div class="reset-password-link">
                @if (Route::has('password.request'))
                    <a class="p-sm" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
            </div>

                <!-- Form Submit Button -->	
                <div class="col-md-12">
                    <button type="submit" class="btn btn--theme hover--theme submit">Log In</button>
                </div>
            <!-- Sign Up Link -->	
            <div class="col-md-12">
                <p class="create-account text-center">
                    Don't have an account? <a href="{{ route('affiliatereg') }}" class="color--theme">Sign up as an Affiliate</a>
                </p>
            </div> 
        </form>
    </div>
									</div>	<!-- END LOGIN FORM -->


								</div>  <!-- End row -->
							</div>	<!-- End register-page-wrapper -->
						</div>	<!-- END REGISTER PAGE WRAPPER -->


			 		</div>	   <!-- End row -->	
			 	</div>	   <!-- End container -->		
			</div>	<!-- END LOGIN PAGE -->




		</div>	<!-- END PAGE CONTENT -->	
        @include('layouts.auth.footer')

	</body>
</html>
