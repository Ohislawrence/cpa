@extends('layouts.app')
@section('headername',  'Edit'. $integration->appname . ' Integration' )
@section('bread1',  'Integration' )
@section('bread2',  'Edit'. $integration->appname  )


@section('header')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection




@section('footer')
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ),{
            ckfinder: {
                uploadUrl: "{{route('admin.ckedit.upload.integration').'?_token='.csrf_token() }}",
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
                <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.update.integrations',[$integration->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        
                        <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Support Area</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="support_id" class="form-select form-select-lg form-select-solid">
                            <option></option>
                            @foreach ($supports as $support)
                            <option value="{{ $support->id }}" {{  $integration->support_id == $support->id ? 'selected' : '' }}>{{ $support->name }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Name</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input name="appname" class="form-control form-control-lg form-control-solid" value="{{ $integration->appname }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                        

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Category</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="appcategory_id" class="form-select form-select-lg form-select-solid">
                            <option></option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{  $integration->appcategory_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Type</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="apptype_id" class="form-select form-select-lg form-select-solid">
                            <option></option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{  $integration->apptype_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Icon</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" name="icon" class="form-control form-control-lg form-control-solid" accept="image/*"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Featured Image</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" name="fImage" class="form-control form-control-lg form-control-solid" accept="image/*"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--end::Label-->
                            <label class="form-label">Short Decription</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="shortDesc" class="form-control form-control-lg form-control-solid" maxlength="30">{{ $integration->shortDesc }}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--end::Label-->
                            <label class="form-label">Long Decription</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="desc" id="body" class="form-control form-control-lg form-control-solid" rows="15">{{ $integration->desc }}</textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Card body-->

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Update Integration</button>
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