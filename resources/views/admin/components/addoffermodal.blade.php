@extends('layouts.app')
@section('headername',  'Add New Offer' )
@section('bread1',  'Agency' )
@section('bread2',  'Add New Offer' )


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
        <form id="user_form" class="form" action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Scroll-->
            <div class="d-flex flex-column scroll-y px-5 px-lg-10"  >
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Offer Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Offer Image</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="file" accept="image/*" name="image" class="form-control form-control-solid mb-3"  />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Business Page(that contains more info about the service/product)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="url" name="actionurl" class="form-control form-control-solid mb-3 mb-lg-0" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Payout type(Action)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="payout" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="Role" class="form-select form-select-sm form-select-solid">
                        @foreach ( $payouts as $payout )
                            <option value="{{ $payout->id }}">{{ $payout->name }}</option>
                        @endforeach

                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Category</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="category" aria-label="Select a Category" data-control="select2" data-dropdown-parent="" data-placeholder="Category" class="form-select form-select-sm form-select-solid">
                        @foreach ( $categories as $category )
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Owner/Agency</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="owner" aria-label="Select a Category" data-control="select2" data-dropdown-parent="" data-placeholder="Owner" class="form-select form-select-sm form-select-solid">
                        @foreach ( $agencies as $agency )
                            <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                        @endforeach

                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->


                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Targeting device & Payout</label>
                    <!--end::Label-->
                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">Desktop URL:</label>
                            <input name="desktopurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Desktop $/%:</label>
                            <input name="desktop" type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>

                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">iOS URL:</label>
                            <input name="iosurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">iOS $/%:</label>
                            <input name="ios" type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">Android URL:</label>
                            <input name="andriodurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Android $/%:</label>
                            <input name="andriod" type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                    </div>

                </div>
                <!--end::Input group-->



                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Locations</label>
                    <!--end::Label-->
                    <!--begin::Input-->

                    <select name="location[]" multiple="" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="location" class="form-select form-select-solid">
                        <option value="all">All Locations</option>
                        @foreach ( $locations as $location )
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
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