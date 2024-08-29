@extends('layouts.app')
@section('headername',  'Configuration' )
@section('bread1',  'View Stats' )
@section('bread2',  'Configuration' )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Col-->
        <div class="row g-5 g-xl-8">
            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                    $ 34343
                </div>

                <div class="fw-semibold text-gray-400">
                   Balance       </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                    $ 34343
                </div>

                <div class="fw-semibold text-gray-100">
                  Today       </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">

                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    $ 45445
                </div>

                <div class="fw-semibold text-white">
                   Yesterday        </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>

            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    $ 4454
                </div>

                <div class="fw-semibold text-white">
                Month To Date     </div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->    </div>
        </div>
        <!--end::Row-->
    </div>
</div>
@endsection
