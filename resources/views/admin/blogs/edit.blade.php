@extends('layouts.app')
@section('headername',  'Create Blogs' )
@section('bread1',  'Blogs' )
@section('bread2',  'Create Blogs' )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
 <!--begin::Content-->
 <div id="kt_account_settings_profile_details" class="collapse show">
    <!--begin::Form-->
    <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.blogs.store', ['id'=> $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $user->name }}" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" name="email" class="form-control form-control-lg form-control-solid" value="{{ $user->email }}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                    <span class="required">Contact Phone</span>

                    
<span class="ms-1"  data-bs-toggle="tooltip" title="Phone number must be active" >
<i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                <!--end::Label-->
                
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="tel" name="phone" class="form-control form-control-lg form-control-solid" value="{{ isset($user->affiliatedetails->phonenumber) ?  $user->affiliatedetails->phonenumber :'' }}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                    <span class="required">Country</span>

                    
<span class="ms-1"  data-bs-toggle="tooltip" title="Country of origination" >
<i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <select name="country" aria-label="Select a Country" data-control="select2" class="form-select form-select-solid form-select-lg fw-semibold">
                        <option value="">Select a Country...</option>
                            @foreach ( $country as $countr)
                                @isset($user->affiliatedetails->country)
                                    <option value="{{ $countr->id == $user->affiliatedetails->country  ? 'selected' : ''  }}">{{ $countr->name }}</option>
                                    @else
                                    <option value="{{ $countr->id }}">{{ $countr->name }}</option>
                                @endisset
                            
                            @endforeach   
                        </select>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Status</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <!--begin::Input-->
                    <select name="status" aria-label="Select a Language" data-control="select2" class="form-select form-select-solid form-select-lg">
                        <option value="">Select a One...</option>
                            @isset($user->affiliatedetails->status )
                            <option value="{{ 'Active' == $user->affiliatedetails->status  ? 'selected' : ''  }}">Active</option>
                            <option value="{{ 'Rejected' == $user->affiliatedetails->status  ? 'selected' : ''  }}">Rejected</option>
                            <option value="{{ 'Pending' == $user->affiliatedetails->status  ? 'selected' : ''  }}">Pending</option>
                            @else
                            <option value="Active">Active</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Pending">Pending</option>
                            @endisset
                            
                        </select>
                    <!--end::Input-->

                    <!--begin::Hint-->
                    <div class="form-text">
                        Active , pend and reject users
                    </div>
                    <!--end::Hint-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Whatsapp ID</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Row-->
                    <div class="row">
                        <!--begin::Col-->
                        <div class="col-lg-12 fv-row">
                            <input type="text" name="instantmessageid" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->affiliatedetails->instantmessageid) ? $user->affiliatedetails->instantmessageid : '' }}" />
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-semibold fs-6">Communication</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <!--begin::Options-->
                    <div class="d-flex align-items-center mt-3">
                        <!--begin::Option-->
                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                            <input class="form-check-input" name="communication[]" type="checkbox" value="1"/>
                            <span class="fw-semibold ps-2 fs-6">
                                Email
                            </span>
                        </label>
                        <!--end::Option-->

                        <!--begin::Option-->
                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                            <input class="form-check-input" name="communication[]" type="checkbox" value="2"/>
                            <span class="fw-semibold ps-2 fs-6">
                                Phone
                            </span>
                        </label>
                        <!--end::Option-->
                    </div>
                    <!--end::Options-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-0">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                <!--begin::Label-->

                <!--begin::Label-->
                <div class="col-lg-8 d-flex align-items-center">
                    <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked />
                        <label class="form-check-label" for="allowmarketing"></label>
                    </div>
                </div>
                <!--begin::Label-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Card body-->

        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
            <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Form-->
</div>
<!--end::Content-->
</div>
@endsection