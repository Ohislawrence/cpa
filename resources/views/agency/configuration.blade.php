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
                <span class="card-label fw-bold text-gray-800 ">My Sales in Details</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Avg. 57 orders per day</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

<!--begin::Form-->
<form action="m-0" class="form mb-9" method="post" id="kt_careers_form">
<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Minimum Payout</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="first_name"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">Allow Affiliate Sign Up</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="last_name"/>
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
        <label class="required fs-5 fw-semibold mb-2">Allow Multi tier affiliate program</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input class="form-control form-control-solid" placeholder="" name="email"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="fs-5 fw-semibold mb-2">Commission Percentage for Multi tier affiliate program</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="mobileno"/>
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
        <label class="required fs-5 fw-semibold mb-2">Commission for Multi tier affiliate program Duration(lifetime or First sale only)</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="age"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">City</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="city"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-5 fv-row">
    <!--begin::Label-->
    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
        <span class="required">Position</span>

        <span class="ms-1" data-bs-toggle="tooltip" title="Your payment statements may very based on selected position">
            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>            </span>
    </label>
    <!--end::Label-->

    <!--begin::Select-->
    <select name="position" data-control="select2" data-placeholder="Select a position..." class="form-select form-select-solid">
        <option value="Web Developer">Web Developer</option>
        <option value="Web Designer">Web Designer</option>
        <option value="Art Director">Art Director</option>
        <option value="Finance Manager">Finance Manager</option>
        <option value="Project Manager">Project Manager</option>
        <option value="System Administrator">System Administrator</option>
    </select>
    <!--end::Select-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Expected Salary</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="salary"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--end::Label-->
        <label class="required fs-5 fw-semibold mb-2">Start Date</label>
        <!--end::Label-->

        <!--end::Input-->
        <input type="text" class="form-control form-control-solid" placeholder="" name="start_date"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-5 fv-row">
    <!--begin::Label-->
    <label class="fs-5 fw-semibold mb-2">Website (If Any)</label>
    <!--end::Label-->

    <!--begin::Input-->
    <input class="form-control form-control-solid" placeholder="" name="website"/>
    <!--end::Input-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-5">
    <label class="fs-6 fw-semibold mb-2">Experience (Optional)</label>

    <textarea class="form-control form-control-solid" rows="2" name="experience" placeholder="">
    </textarea>
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-8">
    <label class="fs-6 fw-semibold mb-2">Application</label>

    <textarea class="form-control form-control-solid" rows="4" name="application" placeholder="">
    </textarea>
</div>
<!--end::Input group-->

<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

<!--begin::Submit-->
<button type="submit" class="btn btn-primary" id="kt_careers_submit_button">

<!--begin::Indicator label-->
<span class="indicator-label">
Apply Now</span>
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
