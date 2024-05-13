@extends('layouts.app')
@section('headername',  'Edit User' )
@section('bread1',  'User' )
@section('bread2',  'Edit' )


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

        @if($user->getRoleNames()->first() == 'affiliate')
        @include('admin.viewuser')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Update - {{ $user->name }}</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
        
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.updateuser', ['id'=> $user->id]) }}" method="POST">
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
        <!--end::Basic info-->
        @endif

        @if($user->getRoleNames()->first() == 'agency')
        @include('admin.viewagency')
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Update - {{ $user->name }}</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
        
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.updateuseragency', ['id'=> $user->id]) }}" method="POST">
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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company Email</label>
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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company Name</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="companyname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->companyname) ? $user->agencydetails->companyname : '' }}" />
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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Perferred Alias</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="brandname" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->brandname) ? $user->agencydetails->brandname : '' }}" />
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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Company Website</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="brandproductlandingurl" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->brandproductlandingurl) ? $user->agencydetails->brandproductlandingurl : '' }}" />
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
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                <span class="required">Contact Phone</span>
        
                                
        <span class="ms-1"  data-bs-toggle="tooltip" title="Phone number must be active" >
            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                            <!--end::Label-->
                            
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <input type="tel" name="phonenumber" class="form-control form-control-lg form-control-solid" value="{{ isset($user->agencydetails->phonenumber) ?  $user->agencydetails->phonenumber :'' }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Description</label>
                        <!--end::Label-->
    
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <textarea name="branddesc" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->branddesc) ? $user->agencydetails->branddesc : '' }}">{{ isset($user->agencydetails->branddesc) ? $user->agencydetails->branddesc : '' }}</textarea>
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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
                        <!--end::Label-->
    
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <textarea name="brandaddress" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->brandaddress) ? $user->agencydetails->brandaddress : '' }}">{{ isset($user->agencydetails->brandaddress) ? $user->agencydetails->brandaddress : '' }}</textarea>
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
                                        @isset($user->agencydetails->country)
                                            <option value="{{ $user->agencydetails->place->id }}" {{ $countr->id == $user->agencydetails->country  ? 'selected' : ''  }}>{{ $user->agencydetails->place->name }}</option>
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
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Category</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Country of origination" >
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>                    </label>
                            <!--end::Label-->
        
                        <!--begin::Col-->
                        <div class="col-lg-8 fv-row">
                            <select name="category" aria-label="Select a Category" data-control="select2" class="form-select form-select-solid form-select-lg fw-semibold">
                                <option value="">Select a Category...</option>
                                    @foreach ( $categories as $category)
                                        @isset($user->agencydetails->category_id)
                                            <option value="{{ $category->id == $user->agencydetails->category_id  ? 'selected' : ''  }}">{{ $user->agencydetails->category_id }}</option>
                                            @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        @isset($user->agencydetails->status )
                                        <option value="{{ 1 == $user->agencydetails->active  ? 'selected' : ''  }}">Active</option>
                                        <option value="{{ 2 == $user->agencydetails->active  ? 'selected' : ''  }}">Rejected</option>
                                        <option value="{{ 3 == $user->agencydetails->active  ? 'selected' : ''  }}">Pending</option>
                                        @else
                                        <option value="1">Active</option>
                                        <option value="2">Rejected</option>
                                        <option value="3">Pending</option>
                                        @endisset
                                        
                                    </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Instant Messager</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Input-->
                                <select name="brandinstantmessager" aria-label="Select a Language" data-control="select2" class="form-select form-select-solid form-select-lg">
                                    <option value="">Select a One...</option>
                                        @isset($user->agencydetails->brandinstantmessager )
                                        <option value="{{ $user->agencydetails->brandinstantmessager  ? 'selected' : ''  }}">{{ $user->agencydetails->brandinstantmessager }}</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="InstaGram">InstaGram</option>
                                        @else
                                        <option value="Twitter">Twitter</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="InstaGram">InstaGram</option>
                                        @endisset
                                        
                                    </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
        
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Instant Messager ID</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="brandinstantmessageid" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->brandinstantmessageid) ? $user->agencydetails->brandinstantmessageid : '' }}" />
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
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Monthly Budget ($)</label>
                            <!--end::Label-->
        
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="brandmonthlybudget" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->brandmonthlybudget) ? $user->agencydetails->brandmonthlybudget : '' }}" />
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
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Note</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <textarea name="note" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ isset($user->agencydetails->note) ? $user->agencydetails->note : '' }}">{{ isset($user->agencydetails->note) ? $user->agencydetails->note : '' }}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
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
        <!--end::Basic info-->
        @endif

    </div>
</div>
@endsection