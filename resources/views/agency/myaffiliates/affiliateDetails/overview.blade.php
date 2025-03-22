@extends('layouts.app')
@section('headername',  'Overview for '.$user->name )
@section('bread1',  'Affiliates' )
@section('bread2',  'Overview for '.$user->name )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.clicksTableUser2').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            stateSave: true,
            ajax: "{{ route('merchant.viewuserTopClicks', isset($user) ? $user->id : 0) }}",
            columns: [
                {data: 'offer'},
                {data: 'clicks', name: 'clicks', title: 'Click Count'},
                {data: 'conversions', name: 'conversions', title: 'Conversions'},
                {data: 'epc', name: 'epc', title: 'EPC($)'}
            ]
        });
    });
</script>
@endsection






@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        @include('agency.myaffiliates.affiliateDetails.topPageAffiliate')
<!--begin::Referral program-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Body-->
    <div class="card-body py-10">
        <!--begin::Stats-->
        <div class="row">
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-info pb-1 px-2">Net Earnings</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">{{ $currency->symbol }}
                    <span data-kt-countup="true" data-kt-countup-value="{{ $netEarning }}">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral Earning</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">{{ $currency->symbol }}
                    <span data-kt-countup="true" data-kt-countup-value="{{ number_format($user->clicks->where('status', 'Approved')->sum('refcommission') ,2) }}">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">Conversions</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                    <span data-kt-countup="true" data-kt-countup-value="{{ $conversion }}">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral Count</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">
                    <span data-kt-countup="true" data-kt-countup-value="{{ $numberOfReferral }}">0</span></span>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Stats-->
        
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <h3>Top 5 Campaigns</h3>
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">

                <!--end::Toolbar-->
            </div>
        </div>
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 clicksTableUser2" id="kt_datatable_dom_positioning">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800 px-7">
                                <th>Offer</th>
                                <th>Click Count</th>
                                <th>Conversions</th>
                                <th>EPC({{ $currency->symbol }})</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">

                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Body-->
</div>
<!--end::Referral program-->
    </div>
</div>
@endsection
