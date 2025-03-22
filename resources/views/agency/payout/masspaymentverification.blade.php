<!--begin::Modal - Add task-->
<div class="modal fade" id="massPayoutOption" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800 ">Pay Affiliates that have made a request</span><br/>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6">{{ $info }}</span>
                </h3>
                <!--end::Modal title-->
                <!--begin::Close-->
                <!--begin::Close-->
						<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
                <form id="kt_modal_add_user_form" class="form" action="{{ route('merchant.payout.option.processMassPayment') }}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Enter your Password</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="password" name="password" class="form-control form-control-solid mb-3 mb-lg-0" {{ $readonly }}/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <div class="fv-row mb-7">
                            <div class="col-md-12 mb-3">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" class="form-control form-control-solid mb-3 mb-lg-0" id="start_date" name="start_date" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" class="form-control form-control-solid mb-3 mb-lg-0" id="end_date" name="end_date" required>
                            </div>
                        </div>
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            Process Payment
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
