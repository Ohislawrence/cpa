<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.mycomponents.meta')

        <title>@yield('headername') | {{ config('app.name') }}</title>

        <!-- Fonts -->

        <!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
		@yield('header')
		<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body id="kt_body" class="header-fixed">
        <div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside py-9" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto px-9 mb-9" id="kt_aside_logo">
						<!--begin::Logo-->
						<a href="index.html">
							<img alt="Logo" src="{{ asset('assets/media/logos/logo-dealsintel.png') }}" class="h-20px logo theme-light-show" />
							<img alt="Logo" src="{{ asset('assets/media/logos/logo-dealsintel-light.png') }}" class="h-20px logo theme-dark-show" />
						</a>
						<!--end::Logo-->
					</div>
					<!--end::Brand-->
                    @include('layouts.mycomponents.aside')
                    <!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header mt-0 mt-lg-0 pt-lg-0" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{lg: '300px'}">
						<!--begin::Container-->
						<div class="container d-flex flex-stack flex-wrap gap-4" id="kt_header_container">
							<!--begin::Page title-->
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<!--begin::Heading-->
								<h1 class="d-flex flex-column text-gray-900 fw-bold my-0 fs-1">@yield('headername')</h1>
								<!--end::Heading-->
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
									<li class="breadcrumb-item text-muted">
										<a href="index.html" class="text-muted text-hover-primary">@yield('bread1')</a>
									</li>
									<li class="breadcrumb-item text-gray-900">@yield('bread2')</li>

								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
                            @include('layouts.mycomponents.rightoptions')
							@role('affiliate')
							@isset(Auth::user()->affiliatedetails->status)
								@if(Auth::user()->affiliatedetails->status == 'Active')
									@yield('slot')
								@else
									<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
										<div class="container-xxl" id="kt_content_container">
											<p>You account is not active, reach out to us via our social media handle or email hello@dealsintel.com</p>
										</div>
									</div>
								@endif
							@endisset
                            
							@endrole
							@role('admin')
								@yield('slot')
							@endrole
							@role('agency')
							@isset(Auth::user()->agencydetails->active)
								@if(Auth::user()->agencydetails->active == 1)
									@yield('slot')
								@elseif(Auth::user()->agencydetails->active != 1)
								<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
									<div class="container-xxl" id="kt_content_container">
										<p>You account is not active yet, reach out to us on social media or via email hello@dealsintel.com</p>
									</div>
								</div>
								@endif
							@else
								<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
									<div class="container-xxl" id="kt_content_container">
										<h3>You account is not active yet, kindly reach out to us on social media or via email hello@dealsintel.com</h3>
									</div>
								</div>
							@endisset
							@endrole

							@include('layouts.mycomponents.footer')
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		
                        </div>
						
                    </div>
					
			</div>

        @livewireScripts
        @include('layouts.mycomponents.code')
		@yield('footer')
    </body>
</html>
