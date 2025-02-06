@extends('layouts.app')
@section('headername',  'Add New Campaign' )
@section('bread1',  'Campaign' )
@section('bread2',  'Add New Campaign' )


@section('header')

@endsection




@section('footer')

@endsection



@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body">
        @include('admin.components.alert')
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">

        <!--begin::Form-->
        <form class="form" action="{{ route('merchant.store.campaign.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Campaign Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" maxlength="66" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Campaign Image</label>
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
                    <select name="payout" aria-label="Select a Role" data-control="select" data-dropdown-parent="" data-placeholder="Role" class="form-select form-select-sm form-select-solid">
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
                    <select name="category" aria-label="Select a Category" data-control="select" data-dropdown-parent="" data-placeholder="Category" class="form-select form-select-sm form-select-solid">
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
                    <label class="required fw-semibold fs-6 mb-2">Targeting device & Payout</label>
                    <!--end::Label-->
                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">Desktop URL:</label>
                            <input name="desktopurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Desktop $/%:</label>
                            <input name="desktop" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>

                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">iOS URL:</label>
                            <input name="iosurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">iOS $/%:</label>
                            <input name="ios" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">Android URL:</label>
                            <input name="andriodurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Android $/%:</label>
                            <input name="andriod" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" />
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

                    <select name="location[]" multiple="" aria-label="Select a Role" data-control="select2" class="form-select form-select-solid">
                        <option value="0">All Locations</option>
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

                <div class="form-group row mb-5">
                    <div class="col-md-6">
                        <label class="form-label">Start date:</label>
                        <input name="start" type="date" class="form-control form-control-solid mb-3 mb-lg-0"  />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End date:(Leave blank if no end date)</label>
                        <input name="end" type="date" class="form-control form-control-solid mb-3 mb-lg-0"  />
                    </div>
                </div>

            </div>
            <!--end::Scroll-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Create Campaign</button>
            </div>
            <!--end::Actions-->

        </form>
        </div>
    </div>
</div>


@endsection
