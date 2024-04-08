<!--begin::Modal - Add task-->
<div class="modal fade" id="kt_modal_add_offer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Offer</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Offer Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Offer Image</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" accept="image/*" name="image" class="form-control form-control-solid mb-3 mb-lg-0"  />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Landing Page(that contains more info about the service/product)</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="url" name="actionurl" class="form-control form-control-solid mb-3 mb-lg-0" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Payout type(Action)</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="payout" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="Role" class="form-select form-select-sm form-select-solid">
                                @foreach ( $payouts as $payout )
                                    <option value="{{ $payout->id }}">{{ $payout->name }}</option>
                                @endforeach

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Category</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="category" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="Role" class="form-select form-select-sm form-select-solid">
                                @foreach ( $categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Owner/Agency</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="owner" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="Role" class="form-select form-select-sm form-select-solid">
                                @foreach ( $agencies as $agency )
                                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                @endforeach

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->


                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Targeting device & Payout</label>
                            <!--end::Label-->
                            <div class="form-group row mb-5">
                                <div class="col-md-9">
                                    <label class="form-label">Desktop URL:</label>
                                    <input name="desktopurl" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Desktop ($):</label>
                                    <input name="desktop" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>

                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-9">
                                    <label class="form-label">iOS URL:</label>
                                    <input name="iosurl" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">iOS ($):</label>
                                    <input name="ios" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-9">
                                    <label class="form-label">Android URL:</label>
                                    <input name="andriodurl" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Android ($):</label>
                                    <input name="andriod" type="text" class="form-control mb-2 mb-md-0" placeholder="Leave blank to exclude" />
                                </div>
                            </div>

                        </div>
                        <!--end::Input group-->



                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Locations</label>
                            <!--end::Label-->
                            <!--begin::Input-->

                            <select name="location[]" multiple="" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="location" class="form-select form-select-solid">
                                <option value="all">All Locations</option>
                                @foreach ( $locations as $location )
                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                @endforeach

                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea name="desc" class="form-control form-control-solid mb-3 mb-lg-0"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select name="status" aria-label="Select a Role" data-control="select2" data-dropdown-parent="" data-placeholder="status" class="form-select form-select-sm form-select-solid">
                                <option value="Active">Active</option>
                                <option value="Wait">Wait</option>
                                <option value="Pending">Pending</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            Submit
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add task-->
</div>
<!--end::Card toolbar-->
</div>
<!--end::Card header-->
