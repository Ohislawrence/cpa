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
			<div id="login" class="bg--fixed login-1 login-section division">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-6 offset-md-2 offset-lg-3">	
							<div class="register-page-form">


                                <!-- TITLE -->
								<div class="col-md-12">
									<div class="register-form-title">
										<h3 class="s-32 w-700">Forgot your password?</h3>
										<p class="p-md">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</br> Remember your password? <a href="{{ route('login') }}" class="color--theme">Log in</a></p>
									</div>
								</div>

                                
                                    @if (session('status'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}" class="row sign-in-form">
            @csrf

            <div class="col-md-12">
                <p class="p-sm input-header">Enter your email address</p>
                <x-input id="email" class="form-control email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn--theme hover--theme submit">Log In</button>
            </div>
        </form>
    </div>	<!-- END PAGE CONTENT -->	
    @include('layouts.auth.footer')

</body>
</html>