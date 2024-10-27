@extends('layouts.app')
@section('headername',  'Email Settings' )
@section('bread1',  'Emails' )
@section('bread2',  'Email Settings' )


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


    <div class="card mb-9">
        <div class="card-header pt-7 ">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800 ">Email Settings</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">You can use any email sender you want.</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

<!--begin::Form-->
<form action="{{ route('merchant.email.updateEmailSettings') }}" class="form mb-9" method="post">
    @csrf
<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Mailer</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_mailer" value="{{ $settings->mail_mailer ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">Host</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_host" value="{{ $settings->mail_host ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Port</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_port" value="{{ $settings->mail_port ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="fs-5 fw-semibold mb-2">Username</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_username" value="{{ $settings->mail_username ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Password</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="password" class="form-control form-control-solid" name="mail_password" value="{{ $settings->mail_password ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">Encryption</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_encryption" value="{{ $settings->mail_encryption ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->



<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">From Address</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_from_address" value="{{ $settings->mail_from_address ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">From Name</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" name="mail_from_name" value="{{ $settings->mail_from_name ?? '' }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->


<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

<!--begin::Submit-->
<button type="submit" class="btn btn-primary" id="kt_careers_submit_button">

<!--begin::Indicator label-->
<span class="indicator-label">
Save Email Settings</span>
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

<!--gen setting-->
    </div>
@endsection
