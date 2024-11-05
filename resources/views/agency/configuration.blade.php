@extends('layouts.app')
@section('headername',  'Configuration' )
@section('bread1',  'Setting' )
@section('bread2',  'Configuration' )


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


    <div class="card mb-9">
        <div class="card-header pt-7 ">
            <!--begin::Title-->
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800 ">Common Settings</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">Check carefully before clicking on save.</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

<!--begin::Form-->
<form action="{{ route('merchant.configuration.update') }}" class="form mb-9" method="post">
    @csrf
<!--begin::Input group-->

<div class="row mb-5">
    @foreach ($configs as $config)
    <!--begin::Col-->
    <div class="col-md-6 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">{{ ucfirst(str_replace('_', ' ', $config->key)) }}</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="settings[{{ $config->key }}]" value="{{ $config->value }}"/>
        <!--end::Input-->
    </div>
    <!--end::Col-->
    @endforeach

</div>
<!--end::Input group-->


<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

<!--begin::Submit-->
<button type="submit" class="btn btn-primary">

<!--begin::Indicator label-->
<span class="indicator-label">
Save</span>
</button>
<!--end::Submit-->
</form>
<!--end::Form-->
        </div>
    </div>
</div>
</div>

<!--gen setting-->
    </div>
@endsection
