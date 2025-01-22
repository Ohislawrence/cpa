@extends('layouts.app')
@section('headername',  'Configuration' )
@section('bread1',  'Setting' )
@section('bread2',  'Configuration' )


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
                <span class="card-label fw-bold text-gray-800 ">Common Settings</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Check carefully before clicking on save.</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

<!--begin::Form-->
<form action="{{ route('merchant.configuration.update') }}" class="form mb-9" method="post" enctype="multipart/form-data">
    @csrf

    <!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Logo</label>
        <!--end::Label-->
        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" name="logo" accept="image/png, image/jpeg"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Favicon</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="file" class="form-control form-control-solid" name="favicon" accept="image/png, image/jpeg"/>
        <!--end::Input-->
    </div>
</div>
<!--end::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Site Name</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="site_name" value="{{ settings()->get('site_name') }}"/>
        <!--end::Input-->
    </div> 

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Gdpr compliance(URL)</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="url" class="form-control form-control-solid" name="gdpr_compliance" value="{{ settings()->get('gdpr_compliance') }}"/>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Contact email</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="email" class="form-control form-control-solid" name="contact_email" value="{{ settings()->get('contact_email') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Support email</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="email" class="form-control form-control-solid" name="support_email" value="{{ settings()->get('support_email') }}"/>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Default currency</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="default_currency" />
            <option>Select Currency</option>
            @foreach ($countries as $currency)
                <option value="{{ $currency->id }}" {{ ($currency->id ==  settings()->get('default_currency')) ? 'selected' : '' }}>{{ $currency->country }}, {{ $currency->symbol }}</option>
            @endforeach
            
        </select>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allow Affiliate Referral</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid" name="allow_affiliate_referral" >
            <option value="">Select one</option>
            <option value="1" {{ ('1' ==  settings()->get('allow_affiliate_referral')) ? 'selected' : '' }} >Yes</option>
            <option value="0" {{ ('0' ==  settings()->get('allow_affiliate_referral')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Commission rate</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="commission_rate" value="{{ settings()->get('commission_rate') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Cookie lifetime days</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="cookie_lifetime_days" value="{{ settings()->get('cookie_lifetime_days') }}"/>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Minimum payout amount</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="minimum_payout_amount" value="{{ settings()->get('minimum_payout_amount') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Payout frequency</label>
        <!--end::Label-->
        <!--begin::Input-->
        <select class="form-control form-control-solid" name="payout_frequency" />
            <option value="">Select one</option>
            <option value="weekly" {{ ('weekly'==  settings()->get('payout_frequency')) ? 'selected' : '' }}>Weekly</option>
            <option value="bimonthly" {{ ('bimonthly'==  settings()->get('payout_frequency')) ? 'selected' : '' }}>Bimonthly</option>
            <option value="monthly" {{ ('monthly'==  settings()->get('payout_frequency')) ? 'selected' : '' }}>Monthly</option>
            <option value="on-request" {{ ('on-request'==  settings()->get('payout_frequency')) ? 'selected' : '' }}>On-request</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Payout methods</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="payout_methods[]" multiple="" aria-label="" data-control="select2">
            <option value="">Select all you support</option>
            <option value="paypal" {{ ('paypal'==  settings()->get('payout_methods[]')) ? 'selected' : '' }}>Paypal</option>
            <option value="payoneer"{{ ('payoneer'==  settings()->get('payout_methods[]')) ? 'selected' : '' }}>Payoneer</option>
        </select>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Affiliate auto approval</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="affiliate_auto_approval" />
            <option value="">Select one</option>
            <option value="yes" {{ ('yes'==  settings()->get('affiliate_auto_approval')) ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ ('no'==  settings()->get('affiliate_auto_approval')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->



<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">New affiliate notification</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="new_affiliate_notification">
            <option value="">Select one</option>
            <option value="yes" {{ ('yes'==  settings()->get('new_affiliate_notification')) ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ ('no'==  settings()->get('new_affiliate_notification')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Require tax info</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="require_tax_info">
            <option value="">Select one</option>
            <option value="yes" {{ ('yes'==  settings()->get('require_tax_info')) ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ ('no'==  settings()->get('require_tax_info')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Payout notification</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="payout_notification" />
            <option value="">Select one</option>
            <option value="yes" {{ ('yes'==  settings()->get('payout_notification')) ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ ('no'==  settings()->get('payout_notification')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">New conversion notification</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="new_conversion_notification" />
            <option value="">Select one</option>
            <option value="yes" {{ ('yes'==  settings()->get('new_conversion_notification')) ? 'selected' : '' }} >Yes</option>
            <option value="no" {{ ('no'==  settings()->get('new_conversion_notification')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->



<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allowed countries</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="allowed_countries[]" multiple="" aria-label="" data-control="select2">
            <option>Select Currency</option>
            <option value="0" {{ (0  ==  settings()->get('allowed_countries')) ? 'selected' : '' }}>Allow All</option>
            @foreach ($countries as $country)
                <option value="{{ $country->id }}" {{ ($country->id  ==  settings()->get('allowed_countries[]')) ? 'selected' : '' }}>{{ $country->country }}</option>
            @endforeach
        </select>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Admin notification email</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="admin_notification_email" />
        <option value="">Select one</option>
        <option value="yes" {{ ('yes'==  settings()->get('admin_notification_email')) ? 'selected' : '' }} >Yes</option>
        <option value="no" {{ ('no'==  settings()->get('admin_notification_email')) ? 'selected' : '' }}>No</option>
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Webhook Secret</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="secret" value="{{ settings()->get('secret') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Terms and conditions(URL)</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="url" class="form-control form-control-solid" name="terms_and_conditions" value="{{ settings()->get('terms_and_conditions') }}"/>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->

<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allowed affiliate referral payout percentage</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="allowed_affiliate_referral_payout_percentage" value="{{ settings()->get('allowed_affiliate_referral_payout_percentage') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allowed affiliate referral duration months</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="allowed_affiliate_referral_duration_months" value="{{ settings()->get('allowed_affiliate_referral_duration_months') }}">
            <option value="">Select one</option>
            <option value="1" {{ ('1'==  settings()->get('allowed_affiliate_referral_duration_months')) ? 'selected' : '' }}>1 Month</option>
            <option value="3" {{ ('3'==  settings()->get('allowed_affiliate_referral_duration_months')) ? 'selected' : '' }}>3 Month</option>
            <option value="6" {{ ('6'==  settings()->get('allowed_affiliate_referral_duration_months')) ? 'selected' : '' }}>6 Monthly</option>
            
        </select>
        <!--end::Input-->
    </div> 
</div>
<!--end::Input group-->
<!--begin::Input group-->

<div class="row mb-5">
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Signup bonus(Percentage)</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="url" class="form-control form-control-solid" name="signup_bonus" value="{{ settings()->get('signup_bonus') }}"/>
        <!--end::Input-->
    </div>

    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allow Affiliate Registration</label>
        <!--end::Label-->

        <!--begin::Input-->
        <select class="form-control form-control-solid" name="allow_affiliate_registration">
            <option value="">Select one</option>
            <option value="1" {{ (1==  settings()->get('allow_affiliate_registration')) ? 'selected' : '' }}>Yes</option>
            <option value="2" {{ (2==  settings()->get('allow_affiliate_registration')) ? 'selected' : '' }}>No</option>
            
        </select>
        <!--end::Input-->
    </div>

    
</div>
<!--end::Input group-->


<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

<!--begin::Submit-->
<button type="submit" class="btn btn-primary">

<!--begin::Indicator label-->
<span class="indicator-label">
Update Settings</span>
</button>
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
