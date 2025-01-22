@extends('layouts.app')
@section('headername',  'Pending Account' )
@section('bread1',  'Account' )
@section('bread2',  'Pending' )


@section('header')
@endsection




@section('footer')
@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        @include('admin.components.alert')

        <!--begin::Referral program-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Body-->
            <div class="card-body py-10">
                <h2 class="mb-9">Issue from our end!</h2>
                <!--begin::Overview-->
                <div class="row mb-10">
                    <!--begin::Col-->
                    <div class="col-xl-12 mb-15 mb-xl-0 pe-5">
                        <h4 class="mb-0">Sorry that your are seeing this.</h4>
                        <p class="fs-6 fw-semibold text-gray-600 py-4 m-0">We are currently working on our systems and will be available shortly.
                        </p>
                        
                    </div>
                    <!--end::Col-->
                    
                </div>
                <!--end::Overview-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Referral program-->
        
    </div>
</div>
@endsection