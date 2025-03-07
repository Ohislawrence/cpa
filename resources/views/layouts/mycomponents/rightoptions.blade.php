<!--begin::Wrapper-->
							<div class="d-flex d-lg-none align-items-center ms-n3 me-2">
								<!--begin::Aside mobile toggle-->
								<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
									<i class="ki-duotone ki-abstract-14 fs-1 mt-1">
										<span class="path1"></span>
										<span class="path2"></span>
									</i>
								</div>
								<!--end::Aside mobile toggle-->
								<!--begin::Logo-->
								
							@if(isset(tenant()->id))
								@if (settings()->get('logo') != null)
									<a href="{{ route('dashboard') }}">
									<img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="theme-light-show h-20px" />
									<img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="theme-dark-show h-20px" />
									</a>
								@else
									<h1>{{ settings()->get('site_name') ? settings()->get('site_name') : ucfirst(tenant()->id) }}</h1>
								@endif
							@endif
								<!--end::Logo-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Topbar-->
							<div class="d-flex align-items-center flex-shrink-0 mb-0 mb-lg-0">
								<!--begin::Search-->
								<div id="kt_header_search" class="header-search d-flex align-items-center w-lg-250px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="lg" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
									<!--begin::Tablet and mobile search toggle-->
									
									<!--end::Tablet and mobile search toggle-->
								</div>
								
								
							</div>
							<!--end::Topbar-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->