@extends('layouts.app')
@section('headername',  'Main' )
@section('bread1',  'Dashboard' )
@section('bread2',  'Main' )


@section('header')

@endsection




@section('footer')
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container1">
    @include('admin.components.alert')



<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Users</span>

            <span class="text-muted fw-semibold fs-7">See records</span>
        </h3>
        
        
        <!--begin::Toolbar-->
        <div class="card-toolbar" data-kt-buttons="true">
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <select name="timeframe" class="form-select form-select-solid" aria-label="Select Last Days" id="floatingSelect" onchange="this.form.submit()">
                    <option value="7" {{ $timeframe == 7 ? 'selected' : '' }}>Last 7 Days</option>
                    <option value="30" {{ $timeframe == 30 ? 'selected' : '' }}>Last 30 Days</option>
                    <option value="90" {{ $timeframe == 90 ? 'selected' : '' }}>Last 90 Days</option>
                </select>
                
            </form>
            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a>

            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>

            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Chart-->
        {!! $chart->container() !!}
        <!--end::Chart-->
    </div>
    <!--end::Body-->
</div>



    </div>
</div>
@endsection