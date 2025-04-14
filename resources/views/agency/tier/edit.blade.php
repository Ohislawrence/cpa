@extends('layouts.app')
@section('headername',  'Edit Affiliate Tier' )
@section('bread1',  'Edit Tier' )
@section('bread2',  'Edit Affiliate Tier' )


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
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					<h2 class="fw-bold">Edit {{ $tier->level }}</h2>
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
						
						
					</div>
                </div>
            </div>
            <form id="kt_modal_add_user_form" class="form" action="{{ route('merchant.tier.update',[$tier->id]) }}" method="POST">
                
                @csrf
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Level Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="level" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $tier->level }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Commision Rate(%)</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="commission_rate" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $tier->commission_rate }}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="required fw-semibold fs-6 mb-2">Mininum Sales</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="number" name="min_sales" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ $tier->min_sales }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Scroll-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                        Edit {{ $tier->level }}
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
                    <!--end::Card-->
    </div>
</div>
 

@endsection
