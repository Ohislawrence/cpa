@extends('layouts.app')
@section('headername',  'Dashboard' )
@section('bread1',  'Dashboard' )
@section('bread2',  'Dashboard' )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Col-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Engage widget 9-->
            <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #2503ac70 0%, #E96922 100%)">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row align-items-center">
                        <!--begin::Col-->
                        <div class="col-sm-7 pe-0 mb-5 mb-sm-0">
                            <!--begin::Wrapper-->
                            <div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
                                <!--begin::Container-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <div class="mb-6">
                                        <h3 class="fs-2x fw-semibold text-white">Upgrade Your Plan</h3>
                                        <span class="fw-semibold text-white opacity-75">Flat cartoony and illustrations with vivid color</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label" style="background: rgba(255, 255, 255, 0.15);">
                                                    <i class="ki-duotone ki-abstract-41 fs-4 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <a href="pages/user-profile/projects.html" class="text-white text-opacity-75 fs-8">Projects</a>
                                                <span class="fw-bold text-white fs-7 d-block">Up to 500</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label" style="background: rgba(255, 255, 255, 0.15);">
                                                    <i class="ki-duotone ki-abstract-26 fs-4 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <a href="apps/user-management/users/list.html" class="text-white text-opacity-75 fs-8">Tasks</a>
                                                <span class="fw-bold text-white fs-7 d-block">Unlimited</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-5">
                            <!--begin::Illustration-->
                            <img src="{{ asset('assets/media/svg/illustrations/easy/7.svg') }}" class="h-200px h-lg-250px my-n6" alt="" />
                            <!--end::Illustration-->
                        </div>
                        <!--begin::Col-->
                    </div>
                    <!--begin::Row-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 9-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 19-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">Payout</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6"></span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-6">
                    <!--begin::Row-->
                    <div class="row align-items-center mx-0 w-100">
                        <!--begin::Col-->
                        <div class="col-7 px-0">
                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">Today:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{$currency->value}} {{ $earnedToday }}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">Yesterday:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{$currency->value}} {{ $earnedYesterday }}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">This Month:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">{{$currency->value}} {{ $earnedThisMonth }}</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 19-->
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->



    <!--begin::Col-->
    <div class="row g-5 g-xl-8">
        <div class="col-xl-3">

    <!--begin::Statistics Widget 5-->
    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
        <!--begin::Body-->
        <div class="card-body">
            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                {{$currency->value}} 34343
            </div>

            <div class="fw-semibold text-gray-400">
               Balance       </div>
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
                {{$currency->value}} 34343
            </div>

            <div class="fw-semibold text-gray-100">
              Today       </div>
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
                {{$currency->value}} 45445
            </div>

            <div class="fw-semibold text-white">
               Yesterday        </div>
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
                {{$currency->value}} 4454
            </div>

            <div class="fw-semibold text-white">
            Month To Date     </div>
        </div>
        <!--end::Body-->
    </a>
    <!--end::Statistics Widget 5-->    </div>
    </div>
    <!--end::Row-->



    <!--begin::Col-->
    <div class="col-xl-12">
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
@endsection
