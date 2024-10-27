@extends('layouts.app')
@section('headername',  'Create Blogs' )
@section('bread1',  'Blogs' )
@section('bread2',  'Create Blogs' )


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
                <form id="kt_account_profile_details_form" class="form" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Title</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input name="title" class="form-control form-control-lg form-control-solid" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                        

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Category</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select name="category" class="form-select form-select-lg form-select-solid">
                            <option></option>
                            @foreach ($cat as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label required">Featured Image</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" name="image" class="form-control form-control-lg form-control-solid" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10">
                            <!--end::Label-->
                            <label class="form-label">Content</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="content" id="body" class="form-control form-control-lg form-control-solid" rows="15"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


                    </div>
                    <!--end::Card body-->

                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Create Blog Post</button>
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