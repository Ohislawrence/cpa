@extends('layouts.app')
@section('headername',  $offer->name )
@section('bread1',  'Merchant' )
@section('bread2',  $offer->name )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
<!--begin::Referral program-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Body-->
    <div class="card-body py-10">
        <h2 class="d-flex flex-column text-gray-900 fw-bold my-0 fs-1 mb-9">{{ $offer->name }}</h2>
        <!--begin::Overview-->
        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-xl-6 mb-15 mb-xl-0 pe-5">
                <p class="fs-6 fw-semibold text-gray-600 py-4 m-0">
                    {{ $offer->desc }}
                </p>

                <h3 class="text-dark-800 mb-3 mt-6">Statistics</h3>

                <a href="{{ route('merchant.details.campaigndestats', ['id' =>  $offer->id ]) }}" class="btn btn-primary">
                    <i class="ki-duotone ki-view fs-2"></i>View Statistics</a>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6">
                <!--begin::Image-->
					<div class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-250px" style="background-image:url('{{ asset("images/offer/".$offer->image) }}')"></div>
				<!--end::Image-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Overview-->


    </div>
    <!--end::Body-->
</div>

        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bold">Details</h2>
                </div>
                <!--begin::Card title-->

            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-3">
                <!--begin::Section-->
                <div class="mb-10">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap py-5">
                        <!--begin::Row-->
                        <div class="flex-equal me-5">
                            <!--begin::Details-->
                            <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500 min-w-175px w-175px">Landing Page:</td>
                                    <td class="text-gray-800 min-w-200px">
                                        <a href="{{ $offer->actionurl }}" target="_blank" class="text-gray-800 text-hover-primary">Click here to view</a>
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Category:</td>
                                    <td class="text-gray-800">{{ $offer->category->name }}</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Pay Out Type:</td>
                                    <td class="text-gray-800">
                                        {{ $offer->payouttype->name }}</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Commission:</td>
                                    <td class="text-gray-800">@php
                                        foreach ($offer->targets as $loc) {
                                            $payout = $loc->payout;
                                            $payys[] = $payout;
                                        }
                                    @endphp
                                   ${{ round(array_sum($payys)/count($payys),2)}}</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Countries Allowed:</td>
                                    <td class="text-gray-800">@foreach ($offer->geos as $loc )
                                        {{ $loc->country->name }} |
                                    @endforeach</td>
                                </tr>
                                <!--end::Row-->
                            </table>
                            <!--end::Details-->
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="flex-equal">
                            <!--begin::Details-->
                            <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500 min-w-175px w-175px">Device OS allowed:</td>
                                    <td class="text-gray-800 min-w-200px">
                                        @foreach ($offer->targets as $loc )
                                        {{ $loc->target }} |
                                    @endforeach
                                    </td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Network EPC:</td>
                                    <td class="text-gray-800">Total earning/total clicks</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Status/Expiry Date:</td>
                                    <td class="text-gray-800">{{ $offer->status }}</td>
                                </tr>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <tr>
                                    <td class="text-gray-500">Currency:</td>
                                    <td class="text-gray-800">USD - US Dollar</td>
                                </tr>
                                <!--end::Row-->
                            </table>
                            <!--end::Details-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Section-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->




<!--end::Referral program-->
    </div>
</div>

@endsection
