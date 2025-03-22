<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('layouts.mycomponents.meta')
		@if (isset(tenant()->id))
		<title>@yield('headername') | {{ (settings()->get('site_name')) ? settings()->get('site_name') : ucfirst(tenant()->id) }}</title>
			@if (settings()->get('favicon') !== null)
				<link rel="icon" href="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('favicon')) }}" type="image/x-icon">
			@else
				<link rel="icon" href="{{ url('assets/media/logos/icon-for-tracklia.png') }}" type="image/x-icon">
			@endif
		@else
		<title>@yield('headername') | {{ env('APP_NAME') }}</title>
		<link rel="icon" href="{{ url('assets/media/logos/icon-for-tracklia.png') }}" type="image/x-icon">
		@endif
        

        <!-- Fonts -->
		
        <!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ url('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ url('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
		<script>// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }</script>


        <!-- Scripts -->

		@yield('header')
		<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		@paddleJS
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
						@if(isset(tenant()->id))
							@if (settings()->get('logo') != null)
							<a href="{{ route('dashboard') }}">
							<img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="h-20px logo theme-light-show" />
							<img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="h-20px logo theme-dark-show" />
							</a>
							@else
							<h1>{{ settings()->get('site_name') ? settings()->get('site_name') : ucfirst(tenant()->id) }}</h1>
							@endif
						@endif
							
							
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
										<a href="" class="text-muted text-hover-primary">@yield('bread1')</a>
									</li>
									<li class="breadcrumb-item text-gray-900">@yield('bread2')</li>

								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Page title=-->
                            @include('layouts.mycomponents.rightoptions')
							
							@yield('slot')

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
