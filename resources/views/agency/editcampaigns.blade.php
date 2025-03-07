@extends('layouts.app')
@section('headername',  'Edit '.$offer->name )
@section('bread1',  'Campaign' )
@section('bread2',  'Edit '.$offer->name )


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
        <form class="form" action="{{ route('merchant.update.campaign.post',[$offer->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Campaign ID</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->offerid }}" readonly/>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Campaign Name</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" maxlength="66" value="{{ $offer->name }}"/>
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
                    <input type="url" name="actionurl" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->actionurl }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Base Cost in {{ $currency->currency }}({{ $currency->symbol }})-the cost of the service/product</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="basecost" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->basecost }}" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Product ID(an identifier from the product/service page)</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" name="product_id" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->product_id }}" />
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
                            <option value="{{ $payout->id }}" {{ ($offer->payout_id == $payout->id) ? 'selected' : '' }}>{{ $payout->name }}</option>
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
                            <option value="{{ $category->id }}" {{ ($offer->category_id == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
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
                            <input name="desktopurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','Windows')->first()->url }}" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Desktop {{ $currency->symbol }}/%:</label>
                            <input name="desktop" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','Windows')->first()->payout }}"/>
                        </div>

                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">iOS URL:</label>
                            <input name="iosurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','iOS')->first()->url }}"/>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">iOS {{ $currency->symbol }}/%:</label>
                            <input name="ios" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','iOS')->first()->payout }}"/>
                        </div>
                    </div>

                    <div class="form-group row mb-5">
                        <div class="col-md-9">
                            <label class="form-label">Android URL:</label>
                            <input name="androidurl" type="url" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','Android')->first()->url }}" />
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Android {{ $currency->symbol }}/%:</label>
                            <input name="android" type="number" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Leave blank to exclude" value="{{ $offer->targets->where('target','Android')->first()->payout }}"/>
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

                    <select name="location[]" multiple="" aria-label="Select a Role" data-control="select2" class="form-select form-select-solid" disabled="true">
                        <option value="0">All Locations</option>
                        @foreach ( $locations as $location )
                            @foreach ( $offer->geos as $geos)
                                <option value="{{ $location->id }}" {{ ($location->id == $geos->country_id) ? 'selected' : '' }}>{{ $location->name }}</option>
                            @endforeach  
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
                    <textarea name="desc" class="form-control form-control-solid mb-3 mb-lg-0">{{ $offer->desc }}</textarea>
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
                        <option value="Active" {{ $offer->status == 'Active' ? 'selected' : ''}}>Active</option>
                        <option value="Wait" {{ $offer->status == 'Wait' ? 'selected' : ''}}>Wait</option>
                        <option value="Pending" {{ $offer->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Input group-->

                <div class="form-group row mb-5">
                    <div class="col-md-6">
                        <label class="form-label">Start date:</label>
                        <input name="start" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->start }}" />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End date:(Leave blank if no end date)</label>
                        <input name="end" type="date" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $offer->expiry }}" />
                    </div>
                </div>

            </div>
            <!--end::Scroll-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Edit Campaign</button>
            </div>
            <!--end::Actions-->

        </form>
        </div>
    </div>
</div>


@endsection
