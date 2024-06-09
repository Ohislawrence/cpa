<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>
        <!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}" type="image/x-icon">
		<link rel="icon" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}">
		<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}">
		<link rel="apple-touch-icon" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}">
		<link rel="icon" href="{{ asset('publicassets/images/logo-favicon-dealsintel.png') }}" type="image/x-icon">

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
		<link href="{{ asset('publicassets/css/magnific-popup.css') }}" rel="stylesheet">	
		<link href="{{ asset('publicassets/css/owl.carousel.min.css') }}" rel="stylesheet">
		<link href="{{ asset('publicassets/css/owl.theme.default.min.css') }}" rel="stylesheet">
		<link href="{{ asset('publicassets/css/lunar.css') }}" rel="stylesheet">
        <!-- RESPONSIVE CSS -->
		<link href="{{ asset('publicassets/css/responsive.css') }}" rel="stylesheet">
        <!-- ON SCROLL ANIMATION -->
		<link href="{{ asset('publicassets/css/animate.css') }}" rel="stylesheet">
		<!-- TEMPLATE CSS -->
		<link href="{{ asset('publicassets/css/crocus-theme.css') }}" rel="stylesheet">

        @yield('header')
        @include('layouts.frontcomponents.meta')

    </head>
    <body>
        <!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">

            @include('layouts.frontcomponents.header')
            @yield('slot')
            @include('layouts.frontcomponents.footer')
        </div>
    </body>
</html>
