@extends('layouts.app')
@section('headername',  $user->name )
@section('bread1',  'Users' )
@section('bread2',  'View User' )


@section('header')

@endsection

@section('footer')

@endsection



@section('slot')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        @if ($user->getRoleNames()->first() == 'affiliate')
            @include('admin.viewuser')
        @else
            @include('admin.viewagency')
        @endif
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
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">$
                    <span data-kt-countup="true" data-kt-countup-value="63,240.00">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-success pb-1 px-2">Balance</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">$
                    <span data-kt-countup="true" data-kt-countup-value="8,530.00">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-danger pb-1 px-2">Avg Deal Size</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">$
                    <span data-kt-countup="true" data-kt-countup-value="2,600">0</span></span>
                </div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col">
                <div class="card card-dashed flex-center min-w-175px my-3 p-6">
                    <span class="fs-4 fw-semibold text-primary pb-1 px-2">Referral Signups</span>
                    <span class="fs-lg-2tx fw-bold d-flex justify-content-center">$
                    <span data-kt-countup="true" data-kt-countup-value="783&quot;">0</span></span>
                </div>
            </div>
            <!--end::Col-->
        </div>
        <!--end::Stats-->
        <!--begin::Info-->
        <p class="fs-5 fw-semibold text-gray-600 py-6">Writing headlines for blog posts is as much an art as it is a science, and probably warrants its own post, but for now, all I’d advise is experimenting with what works for your audience, especially if it’s not resonating with your audience</p>
        <!--end::Info-->
        <!--begin::Notice-->
        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
            <!--begin::Icon-->
            <i class="ki-duotone ki-bank fs-2tx text-primary me-4">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                <!--begin::Content-->
                <div class="mb-3 mb-md-0 fw-semibold">
                    <h4 class="text-gray-900 fw-bold">Withdraw Your Money to a Bank Account</h4>
                    <div class="fs-6 text-gray-700 pe-7">Withdraw money securily to your bank account. Commision is $25 per transaction under $50,000</div>
                </div>
                <!--end::Content-->
                <!--begin::Action-->
                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap">Withdraw Money</a>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
    </div>
    <!--end::Body-->
</div>
<!--end::Referral program-->
    </div>
</div>
@endsection