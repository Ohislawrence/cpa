@extends('layouts.app')
@section('headername',  'See stats for '.$offer->name )
@section('bread1',  'View Stats' )
@section('bread2',  $offer->name )


@section('header')

@endsection




@section('footer')

@endsection





@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Col-->
        <div class="row g-5 g-xl-8">
            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                    $ 34343
                </div>

                <div class="fw-semibold text-gray-400">
                   Clicks       </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                    $ 34343
                </div>

                <div class="fw-semibold text-gray-100">
                  Sales      </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">

                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    $ 45445
                </div>

                <div class="fw-semibold text-white">
                    Sales Value        </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    $ 4454
                </div>

                <div class="fw-semibold text-white">
                Engaged Affiliates     </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>
        </div>
        <!--end::Row-->


        <!--begin::Row-->
							<div class="row g-5 g-xl-8">
								<div class="col-xl-6">
									<!--begin::Charts Widget 1-->
									<div class="card card-xl-stretch mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-3 mb-1">Clicks & Sales</span>
												<span class="text-muted fw-semibold fs-7">clicks and sales</span>
											</h3>
											<!--end::Title-->
											<!--begin::Toolbar-->
											<div class="card-toolbar">
												<!--begin::Menu-->
												<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<i class="ki-duotone ki-category fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</button>
												<!--begin::Menu 1-->
												<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_65a109148ad80">
													<!--begin::Header-->
													<div class="px-7 py-5">
														<div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
													</div>
													<!--end::Header-->
													<!--begin::Menu separator-->
													<div class="separator border-gray-200"></div>
													<!--end::Menu separator-->
													<!--begin::Form-->
													<div class="px-7 py-5">
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-semibold">Status:</label>
															<!--end::Label-->
															<!--begin::Input-->
															<div>
																<select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_65a109148ad80" data-allow-clear="true">
																	<option></option>
																	<option value="1">Approved</option>
																	<option value="2">Pending</option>
																	<option value="2">In Process</option>
																	<option value="2">Rejected</option>
																</select>
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-semibold">Member Type:</label>
															<!--end::Label-->
															<!--begin::Options-->
															<div class="d-flex">
																<!--begin::Options-->
																<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
																	<input class="form-check-input" type="checkbox" value="1" />
																	<span class="form-check-label">Author</span>
																</label>
																<!--end::Options-->
																<!--begin::Options-->
																<label class="form-check form-check-sm form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox" value="2" checked="checked" />
																	<span class="form-check-label">Customer</span>
																</label>
																<!--end::Options-->
															</div>
															<!--end::Options-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="mb-10">
															<!--begin::Label-->
															<label class="form-label fw-semibold">Notifications:</label>
															<!--end::Label-->
															<!--begin::Switch-->
															<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
																<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
																<label class="form-check-label">Enabled</label>
															</div>
															<!--end::Switch-->
														</div>
														<!--end::Input group-->
														<!--begin::Actions-->
														<div class="d-flex justify-content-end">
															<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
															<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
														</div>
														<!--end::Actions-->
													</div>
													<!--end::Form-->
												</div>
												<!--end::Menu 1-->
												<!--end::Menu-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Chart-->
											<div id="kt_charts_widget_1_chart" style="height: 350px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Charts Widget 1-->
								</div>
								<div class="col-xl-6">
									<!--begin::Charts Widget 2-->
									<div class="card card-xl-stretch mb-5 mb-xl-8">
										<!--begin::Header-->
										<div class="card-header border-0 pt-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-3 mb-1">Commision by status</span>
												<span class="text-muted fw-semibold fs-7">pending, declined, approved</span>
											</h3>
											<!--begin::Toolbar-->
											<div class="card-toolbar" data-kt-buttons="true">
												<a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_2_year_btn">Year</a>
												<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_2_month_btn">Month</a>
												<a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_2_week_btn">Week</a>
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body">
											<!--begin::Chart-->
											<div id="kt_charts_widget_2_chart" style="height: 350px"></div>
											<!--end::Chart-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Charts Widget 2-->
								</div>
							</div>
							<!--end::Row-->

        

        <!--begin::Row-->
							<div class="row g-5 g-xl-10">
								<!--begin::Col-->
								<div class="col-xl-4">
									<!--begin::Mixed Widget 5-->
									<div class="card card-xl-stretch mb-xl-8">
										<!--begin::Beader-->
										<div class="card-header border-0 py-5">
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold fs-3 mb-1">Trends</span>
												<span class="text-muted fw-semibold fs-7">Latest trends</span>
											</h3>
											<div class="card-toolbar">
												<!--begin::Menu-->
												<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<i class="ki-duotone ki-category fs-6">
														<span class="path1"></span>
														<span class="path2"></span>
														<span class="path3"></span>
														<span class="path4"></span>
													</i>
												</button>
												<!--begin::Menu 3-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
													<!--begin::Heading-->
													<div class="menu-item px-3">
														<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
													</div>
													<!--end::Heading-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Create Invoice</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link flex-stack px-3">Create Payment 
														<span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
															<i class="ki-duotone ki-information fs-6">
																<span class="path1"></span>
																<span class="path2"></span>
																<span class="path3"></span>
															</i>
														</span></a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Generate Bill</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
														<a href="#" class="menu-link px-3">
															<span class="menu-title">Subscription</span>
															<span class="menu-arrow"></span>
														</a>
														<!--begin::Menu sub-->
														<div class="menu-sub menu-sub-dropdown w-175px py-4">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Plans</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Billing</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3">Statements</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu separator-->
															<div class="separator my-2"></div>
															<!--end::Menu separator-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<div class="menu-content px-3">
																	<!--begin::Switch-->
																	<label class="form-check form-switch form-check-custom form-check-solid">
																		<!--begin::Input-->
																		<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
																		<!--end::Input-->
																		<!--end::Label-->
																		<span class="form-check-label text-muted fs-6">Recuring</span>
																		<!--end::Label-->
																	</label>
																	<!--end::Switch-->
																</div>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu sub-->
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3 my-1">
														<a href="#" class="menu-link px-3">Settings</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu 3-->
												<!--end::Menu-->
											</div>
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div class="card-body d-flex flex-column">
											<!--begin::Chart-->
											<div class="mixed-widget-5-chart card-rounded-top" data-kt-chart-color="primary" style="height: 150px"></div>
											<!--end::Chart-->
											<!--begin::Items-->
											<div class="mt-5">
												<!--begin::Item-->
												<div class="d-flex flex-stack mb-5">
													<!--begin::Section-->
													<div class="d-flex align-items-center me-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-50px me-3">
															<div class="symbol-label bg-light">
																<img src="assets/media/svg/brand-logos/plurk.svg" class="h-50" alt="" />
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Top Authors</a>
															<div class="fs-7 text-muted fw-semibold mt-1">Ricky Hunt, Sandra Trepp</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Section-->
													<!--begin::Label-->
													<div class="badge badge-light fw-semibold py-4 px-3">+82$</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex flex-stack mb-5">
													<!--begin::Section-->
													<div class="d-flex align-items-center me-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-50px me-3">
															<div class="symbol-label bg-light">
																<img src="assets/media/svg/brand-logos/figma-1.svg" class="h-50" alt="" />
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div>
															<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Top Sales</a>
															<div class="fs-7 text-muted fw-semibold mt-1">PitStop Emails</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Section-->
													<!--begin::Label-->
													<div class="badge badge-light fw-semibold py-4 px-3">+82$</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
												<!--begin::Item-->
												<div class="d-flex flex-stack">
													<!--begin::Section-->
													<div class="d-flex align-items-center me-2">
														<!--begin::Symbol-->
														<div class="symbol symbol-50px me-3">
															<div class="symbol-label bg-light">
																<img src="assets/media/svg/brand-logos/vimeo.svg" class="h-50" alt="" />
															</div>
														</div>
														<!--end::Symbol-->
														<!--begin::Title-->
														<div class="py-1">
															<a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Top Engagement</a>
															<div class="fs-7 text-muted fw-semibold mt-1">KT.com</div>
														</div>
														<!--end::Title-->
													</div>
													<!--end::Section-->
													<!--begin::Label-->
													<div class="badge badge-light fw-semibold py-4 px-3">+82$</div>
													<!--end::Label-->
												</div>
												<!--end::Item-->
											</div>
											<!--end::Items-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-xl-8">
									<!--begin::Table Widget 4-->
									<div class="card card-flush h-xl-100">
										<!--begin::Card header-->
										<div class="card-header pt-7">
											<!--begin::Title-->
											<h3 class="card-title align-items-start flex-column">
												<span class="card-label fw-bold text-gray-800">My Sales in Details</span>
												<span class="text-gray-500 mt-1 fw-semibold fs-6">Avg. 57 orders per day</span>
											</h3>
											<!--end::Title-->
											<!--begin::Actions-->
											<div class="card-toolbar">
												<!--begin::Filters-->
												<div class="d-flex flex-stack flex-wrap gap-4">
													<!--begin::Destination-->
													<div class="d-flex align-items-center fw-bold">
														<!--begin::Label-->
														<div class="text-gray-500 fs-7 me-2">Cateogry</div>
														<!--end::Label-->
														<!--begin::Select-->
														<select class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
															<option></option>
															<option value="Show All" selected="selected">Show All</option>
															<option value="a">Category A</option>
															<option value="b">Category A</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Destination-->
													<!--begin::Status-->
													<div class="d-flex align-items-center fw-bold">
														<!--begin::Label-->
														<div class="text-gray-500 fs-7 me-2">Status</div>
														<!--end::Label-->
														<!--begin::Select-->
														<select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
															<option></option>
															<option value="Show All" selected="selected">Show All</option>
															<option value="Shipped">Shipped</option>
															<option value="Confirmed">Confirmed</option>
															<option value="Rejected">Rejected</option>
															<option value="Pending">Pending</option>
														</select>
														<!--end::Select-->
													</div>
													<!--end::Status-->
													<!--begin::Search-->
													<div class="position-relative my-1">
														<i class="ki-duotone ki-magnifier fs-2 position-absolute top-50 translate-middle-y ms-4">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
														<input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" />
													</div>
													<!--end::Search-->
												</div>
												<!--begin::Filters-->
											</div>
											<!--end::Actions-->
										</div>
										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-2">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
												<!--begin::Table head-->
												<thead>
													<!--begin::Table row-->
													<tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
														<th class="min-w-100px">Order ID</th>
														<th class="text-end min-w-100px">Created</th>
														<th class="text-end min-w-125px">Customer</th>
														<th class="text-end min-w-100px">Total</th>
														<th class="text-end min-w-100px">Profit</th>
														<th class="text-end min-w-50px">Status</th>
														<th class="text-end"></th>
													</tr>
													<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fw-bold text-gray-600">
													<tr data-kt-table-widget-4="subtable_template" class="d-none">
														<td colspan="2">
															<div class="d-flex align-items-center gap-3">
																<a href="#" class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
																	<img src="" data-kt-src-path="assets/media/stock/ecommerce/" alt="" data-kt-table-widget-4="template_image" />
																</a>
																<div class="d-flex flex-column text-muted">
																	<a href="#" class="text-gray-800 text-hover-primary fw-bold" data-kt-table-widget-4="template_name">Product name</a>
																	<div class="fs-7" data-kt-table-widget-4="template_description">Product description</div>
																</div>
															</div>
														</td>
														<td class="text-end">
															<div class="text-gray-800 fs-7">Cost</div>
															<div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_cost">1</div>
														</td>
														<td class="text-end">
															<div class="text-gray-800 fs-7">Qty</div>
															<div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_qty">1</div>
														</td>
														<td class="text-end">
															<div class="text-gray-800 fs-7">Total</div>
															<div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_total">name</div>
														</td>
														<td class="text-end">
															<div class="text-gray-800 fs-7 me-3">On hand</div>
															<div class="text-muted fs-7 fw-bold" data-kt-table-widget-4="template_stock">32</div>
														</td>
														<td></td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#XGY-346</a>
														</td>
														<td class="text-end">7 min ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Albert Flores</a>
														</td>
														<td class="text-end">$630.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$86.70</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#YHD-047</a>
														</td>
														<td class="text-end">52 min ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Jenny Wilson</a>
														</td>
														<td class="text-end">$25.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$4.20</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-primary">Confirmed</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SRR-678</a>
														</td>
														<td class="text-end">1 hour ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Robert Fox</a>
														</td>
														<td class="text-end">$1,630.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$203.90</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#PXF-534</a>
														</td>
														<td class="text-end">3 hour ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Cody Fisher</a>
														</td>
														<td class="text-end">$119.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$12.00</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#XGD-249</a>
														</td>
														<td class="text-end">2 day ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Arlene McCoy</a>
														</td>
														<td class="text-end">$660.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$52.26</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SKP-035</a>
														</td>
														<td class="text-end">2 day ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Eleanor Pena</a>
														</td>
														<td class="text-end">$290.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$29.00</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
													<tr>
														<td>
															<a href="apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">#SKP-567</a>
														</td>
														<td class="text-end">7 min ago</td>
														<td class="text-end">
															<a href="#" class="text-gray-600 text-hover-primary">Dan Wilson</a>
														</td>
														<td class="text-end">$590.00</td>
														<td class="text-end">
															<span class="text-gray-800 fw-bolder">$50.00</span>
														</td>
														<td class="text-end">
															<span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
														</td>
														<td class="text-end">
															<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px" data-kt-table-widget-4="expand_row">
																<i class="ki-duotone ki-plus fs-4 m-0 toggle-off"></i>
																<i class="ki-duotone ki-minus fs-4 m-0 toggle-on"></i>
															</button>
														</td>
													</tr>
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Table Widget 4-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->




    </div>
</div>
@endsection
