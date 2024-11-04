@extends('layouts.app')
@section('headername',  'Send Email' )
@section('bread1',  'Emails' )
@section('bread2',  'Send Email' )


@section('header')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection




@section('footer')
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ),{
            ckfinder: {
                uploadUrl: '{{route("admin.ckeditor.upload")."?_token=".csrf_token() }}',
            }
        });
</script>
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
                <span class="card-label fw-bold text-gray-800 ">Email Settings</span>
                <span class="text-gray-500 mt-1 fw-semibold fs-6">You can use any email sender you want.</span>
            </h3>
        </div>
        <!--begin::Body-->
        <div class="card-body p-lg-17">



    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row mb-3">

        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-0 me-lg-20">

<!--begin::Form-->
<form action="{{ route('merchant.email.sendEmail') }}" class="form mb-9" method="post">
    @csrf
<!--begin::Input group-->
<div class="d-flex flex-column mb-5 fv-row">
    <!--begin::Label-->
    <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
        <span class="required">Select User</span>

        <span class="ms-1" data-bs-toggle="tooltip" title="Your payment statements may very based on selected position">
            <i class="ki-duotone ki-information fs-7"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>            </span>
    </label>
    <!--end::Label-->

    <!--begin::Select-->
    <select name="user_id" data-control="select2" data-placeholder="Select a position..." class="form-select form-select-solid">
        <option value="Web Developer">Select one</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
        @endforeach
    </select>
    <!--end::Select-->
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="row mb-5">
    <!--begin::Col-->
    <div class="col-md-12 fv-row">
        <!--begin::Label-->
        <label class="required fs-5 fw-semibold mb-2">Email Title</label>
        <!--end::Label-->

        <!--begin::Input-->
        <input type="text" class="form-control form-control-solid" name="title" id="title" required/>
        <!--end::Input-->
    </div>
    <!--end::Col-->

    
</div>
<!--end::Input group-->

<!--begin::Input group-->
<div class="d-flex flex-column mb-8">
    <label class="fs-6 fw-semibold mb-2">Message:</label>

    <textarea class="form-control form-control-solid" id="body" rows="4" name="message" id="message" rows="5">
    </textarea>
</div>
<!--end::Input group-->



<!--begin::Separator-->
<div class="separator mb-8"></div>
<!--end::Separator-->

<!--begin::Submit-->
<button type="submit" class="btn btn-primary" id="kt_careers_submit_button">

<!--begin::Indicator label-->
<span class="indicator-label">
Save Email</span>
<!--end::Indicator label-->

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
