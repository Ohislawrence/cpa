<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name') }}</title>
        <!-- FAVICON AND TOUCH ICONS -->
		<link rel="shortcut icon" href="publicassets/images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="apple-touch-icon" sizes="152x152" href="publicassets/images/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="120x120" href="publicassets/images/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="publicassets/images/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" href="publicassets/images/apple-touch-icon.png">
		<link rel="icon" href="publicassets/images/apple-touch-icon.png" type="image/x-icon">

		<!-- GOOGLE FONTS -->
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
		
		<!-- BOOTSTRAP CSS -->
		<link href="publicassets/css/bootstrap.min.css" rel="stylesheet">
				
		<!-- FONT ICONS -->
		<link href="publicassets/css/flaticon.css" rel="stylesheet">

		<!-- PLUGINS STYLESHEET -->
		<link href="publicassets/css/menu.css" rel="stylesheet">	
		<link id="effect" href="publicassets/css/dropdown-effects/fade-down.css" media="all" rel="stylesheet">
		<link href="publicassets/css/magnific-popup.css" rel="stylesheet">	
		<link href="publicassets/css/owl.carousel.min.css" rel="stylesheet">
		<link href="publicassets/css/owl.theme.default.min.css" rel="stylesheet">
		<link href="publicassets/css/lunar.css" rel="stylesheet">
        <!-- RESPONSIVE CSS -->
		<link href="publicassets/css/responsive.css" rel="stylesheet">
        <!-- ON SCROLL ANIMATION -->
		<link href="publicassets/css/animate.css" rel="stylesheet">
		<!-- TEMPLATE CSS -->
		<link href="publicassets/css/crocus-theme.css" rel="stylesheet">

        @yield('header')
        @include('layouts.frontcomponents.meta')

    </head>
    <body class="theme--dark">
        <!-- PAGE CONTENT
		============================================= -->	
		<div id="page" class="page font--jakarta">

            @include('layouts.frontcomponents.header')
            @yield('slot')
            @include('layouts.frontcomponents.footer')
        </div>
    </body>
</html>
