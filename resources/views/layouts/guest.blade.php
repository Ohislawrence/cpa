<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
		<!-- Google tag (gtag.js) -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-WCEE48XWJ7"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-WCEE48XWJ7');
		</script>
		
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>
        <!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/icon-for-tracklia.png') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('assets/media/logos/logo_fade.png') }}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/media/logos/logo_fade.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/media/logos/logo_fade.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/media/logos/logo_fade.png') }}">
		<link rel="apple-touch-icon" href="{{ asset('assets/media/logos/logo_fade.png') }}">
		<link rel="icon" href="{{ asset('assets/media/logos/logo_fade.png') }}" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
		
		<!-- BOOTSTRAP CSS -->
		<link href="{{ asset('publicassets/css/bootstrap.min.css') }}" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="{{ asset('publicassets/css/flaticon.css') }}" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="{{ asset('publicassets/css/menu.css') }}" rel="stylesheet">	
		<link id="effect" href="{{ asset('publicassets/css/dropdown-effects/fade-down.css') }}" media="all" rel="stylesheet">
			
		<link href="{{ asset('publicassets/css/owl.carousel.min.css') }}" rel="stylesheet">
		<link href="{{ asset('publicassets/css/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('publicassets/css/lunar.css') }}" rel="stylesheet">
        <!-- RESPONSIVE CSS -->
		<link href="{{ asset('publicassets/css/responsive.css') }}" rel="stylesheet">
        <!-- ON SCROLL ANIMATION -->
		<link href="{{ asset('publicassets/css/animate.css') }}" rel="stylesheet">
		<!-- TEMPLATE CSS -->
		<link href="{{ asset('publicassets/css/crocus-theme.css') }}" rel="stylesheet">
		<link href="{{ asset('publicassets/css/buttondown.css') }}" rel="stylesheet">

        @yield('header')
        @include('layouts.frontcomponents.meta')
		{!! CookieConsent::styles() !!}
    </head>
    <body>
        <!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">

            @include('layouts.frontcomponents.header')
            @yield('slot')
            @include('layouts.frontcomponents.footer')
        </div>


	@include('components.cookie-notice')

	@if(session('cookie_success'))
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			alert('{{ session('cookie_success') }}');
		});
	</script>
	@endif
		
	@include('layouts.mycomponents.buttonDown')
	<script type="text/javascript">
		// Select elements
		const contactBtn = document.getElementById('contact-btn');
		const contactPanel = document.getElementById('contact-panel');

		// Toggle the panel visibility
		contactBtn.addEventListener('click', () => {
		contactPanel.classList.toggle('active');
		});
	</script>
	{!! CookieConsent::scripts() !!}
    </body>
</html>
