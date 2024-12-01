@extends('layouts.app')
@section('headername',  'Add New Tenant' )
@section('bread1',  'Tenant' )
@section('bread2',  'Add New Tenant' )


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
    <div class="card mb-5 mb-xl-10">
        
        <!--begin::Form-->
        <form id="user_form" class="form" action="{{ route('admin.createTenant.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Scroll-->
            <div class="d-flex flex-column scroll-y px-5 px-lg-10"  >
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Subdomain</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="subdomain" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('domain') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">password</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0"  />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">website</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="website" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('domain') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">business_name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="business_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('business_email') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">business_email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" name="business_email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('business_email') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">contact_email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" name="contact_email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('contact_email') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">business_phone</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="business_phone" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('business_phone') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">contact_phone</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="contact_phone" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('contact_phone') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">contact_name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="contact_name" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ old('contact_phone') }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Pricing plan</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="current_plan" aria-label="Select a Plan" data-control="select2" data-dropdown-parent="" data-placeholder="current_plan" class="form-select form-select-sm form-select-solid">
                        @foreach ( $plans as $plan )
                            <option value="{{ $plan->id }}">{{ $plan->name }}</option>
                        @endforeach

                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->



                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">country</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <select name="country" aria-label="Select a country"  class="form-select form-select-solid">
                        <option value="all">All Locations</option>
                        @foreach ( $countries as $location )
                            <option value="{{ $location->id }}">{{ $location->country }}</option>
                        @endforeach

                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Description</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <textarea name="desc" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Status</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="status" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="status" class="form-select form-select-sm form-select-solid">
                        <option value="Active">Active</option>
                        <option value="Wait">Wait</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <!--end::Scroll-->
            <!--begin::Actions-->
            <div class="text-center pt-10 mb-10">
                <button type="reset" class="btn btn-light me-3">Discard</button>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
            
        </form> 
        </div>  
    </div>
</div>
   

@endsection