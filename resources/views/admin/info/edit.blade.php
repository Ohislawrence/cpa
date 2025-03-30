@extends('layouts.app')
@section('headername',  'Edit Information' )
@section('bread1',  'Information' )
@section('bread2',  'Edit Information' )


@section('header')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection




@section('footer')
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ),{
            ckfinder: {
                uploadUrl: "{{route('admin.ckeditor.upload').'?_token='.csrf_token() }}",
            }
        });
</script>
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
                <form method="POST" id="kt_account_profile_details_form" class="form" action="{{ route('admin.info.update', $info->id) }}">
                    @csrf
                    @method('PUT')
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Information Type</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" name="info_type" class="form-control form-control-lg form-control-solid" value="{{ $info->info_type }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--end::Label-->
                            <label class="form-label">Information</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="information" id="body" class="form-control form-control-lg form-control-solid" rows="15">{{ $info->information }}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Card body-->

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save information</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
</div>
<!--end::Content-->
</div>
        </div>
    </div>

@endsection