@if(!empty($errors->first()))
    <!--begin::Alert-->
    <div class="alert alert-danger d-flex align-items-center p-5">
        <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
        <!--end::Icon-->
    
        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
            <h4 class="mb-1 text-dark">Check!</h4>
            <!--end::Title-->
    
            <!--begin::Content-->
                <span>{{ $errors->first() }}</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-dark"><span class="path1"></span><span class="path2"></span></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->
@endif


@if(session()->has('message'))
    <!--begin::Alert-->
    <div class="alert alert-primary d-flex align-items-center p-5">
        <!--begin::Icon-->
        <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
        <!--end::Icon-->
    
        <!--begin::Wrapper-->
        <div class="d-flex flex-column">
            <!--begin::Title-->
            <h4 class="mb-1 text-dark">Message</h4>
            <!--end::Title-->
    
            <!--begin::Content-->
                <span>{{ session()->get('message') }}</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-light"><span class="path1"></span><span class="path2"></span></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->
@endif

