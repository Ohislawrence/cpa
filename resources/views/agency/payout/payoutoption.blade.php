@extends('layouts.app')
@section('headername',  'Payout Option' )
@section('bread1',  'Payout' )
@section('bread2',  'Payout Option' )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
	@include('admin.components.alert')


@if($payoutType == 'Paypal')




<!--paypal-->
<div class="card mb-9">
    <div class="card-header pt-7 ">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800 ">Set Paypal Credentials</span>
            <span class="text-gray-500 mt-1 fw-semibold fs-6">Use merchant credentials only</span>
        </h3>
    </div>
    <!--begin::Body-->
    <div class="card-body p-lg-17">
<!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row mb-3">

    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-0 me-lg-20">
        <p class="mb-9">paypal/batch/process/webhook</p>

        <!--begin::Form-->
        <form action="{{ route('merchant.payout.option.storePaypalDetails') }}" class="form mb-9" method="post" id="kt_careers_form">
            @csrf
        <!--begin::Input group-->
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Email</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{ $agencyDetails->paypal_email }}" name="email"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Client ID</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{ $agencyDetails->client_id }}" name="client_id"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Secret</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{  $agencyDetails->secret }}" name="secret"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Webhook ID</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{  $agencyDetails->paypal_webhook_id }}" name="webhookID"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>


        <!--begin::Submit-->
        <button type="submit" class="btn btn-primary" id="">

        <!--begin::Indicator label-->
        <span class="indicator-label">
        Save Credentials</span>
        <!--end::Indicator label-->

        <!--begin::Indicator progress-->
        <span class="indicator-progress">
        Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
        <!--end::Indicator progress-->    </button>
        <!--end::Submit-->
        </form>
<!--end::Form-->
    </div>
</div>
    </div>
</div>


@elseif($payoutType == 'Payoneer')

    <!--payoneer-->
    <div class="card mb-9">
        <div class="card-header pt-7 ">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800 ">Set Payoneer Credentials</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Use merchant credentials only</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

            <!--begin::Form-->
            <form action="{{ route('merchant.payout.option.storePayoneerDetails') }}" class="form mb-9" method="post" id="kt_careers_form">
                @csrf
            <!--begin::Input group-->
            <div class="row mb-5">

                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Payoneer Mechant ID</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" value="{{ $agencyDetails->payoneer_merchant_id }}" name="payoneer_merchant_id"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-5">

                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">Payoneer API Token</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" value="{{ $agencyDetails->payoneer_api_token }}" name="payoneer_api_token"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>

            <div class="row mb-10">
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-semibold mb-2">PayPal Secret</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" value="{{ old('secret') }}" name="secret"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>


            <!--begin::Submit-->
            <button type="submit" class="btn btn-primary" id="">

            <!--begin::Indicator label-->
            <span class="indicator-label">
            Save Credentials</span>
            <!--end::Indicator label-->

            <!--begin::Indicator progress-->
            <span class="indicator-progress">
            Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            <!--end::Indicator progress-->    </button>
            <!--end::Submit-->
            </form>
<!--end::Form-->
        </div>
    </div>
        </div>
    </div>
@elseif($payoutType == 'Wise')

<!--wise payment-->
<div class="card mb-9">
    <div class="card-header pt-7 ">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800 ">Set Wise Payment Credentials</span>
            <span class="text-gray-500 mt-1 fw-semibold fs-6">Use merchant credentials only</span>
        </h3>
    </div>
    <!--begin::Body-->
    <div class="card-body p-lg-17">
<!--begin::Layout-->
<div class="d-flex flex-column flex-lg-row mb-3">

    <!--begin::Content-->
    <div class="flex-lg-row-fluid me-0 me-lg-20">

        <!--begin::Form-->
        <form action="{{ route('merchant.payout.option.storewiseDetails') }}" class="form mb-9" method="post" id="kt_careers_form">
            @csrf
        <!--begin::Input group-->
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Email</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{ old('email') }}" name="email"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>
        <div class="row mb-5">

            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Client ID</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{ old('client_id') }}" name="client_id"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-10">
            <!--begin::Col-->
            <div class="col-md-12 fv-row">
                <!--begin::Label-->
                <label class="required fs-5 fw-semibold mb-2">PayPal Secret</label>
                <!--end::Label-->

                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" value="{{ old('secret') }}" name="secret"/>
                <!--end::Input-->
            </div>
            <!--end::Col-->
        </div>


        <!--begin::Submit-->
        <button type="submit" class="btn btn-primary" id="">

        <!--begin::Indicator label-->
        <span class="indicator-label">
        Save Credentials</span>
        <!--end::Indicator label-->

        <!--begin::Indicator progress-->
        <span class="indicator-progress">
        Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
        </span>
        <!--end::Indicator progress-->    </button>
        <!--end::Submit-->
        </form>
<!--end::Form-->
    </div>
</div>
    </div>
</div>

        
@endif
</div>
</div>

<!--gen setting-->
@endsection
