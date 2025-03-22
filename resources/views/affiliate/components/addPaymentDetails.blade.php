<!--begin::Modal - Add task-->
<div class="modal fade" id="edit_payment_details" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Payment Deatails for {{ $payoutType }}</h2>
                <!--end::Modal title-->
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
                <form id="kt_modal_add_user_form" class="form" action="{{ route('affiliate.payment.details') }}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        @if($payoutType == 'Payoneer')
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Payoneer ID</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="payoneer_ID" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ auth()->user()->affiliatedetails->payoneer_ID }} " {{ auth()->user()->affiliatedetails->payoneer_ID == null ? '':'readonly' }}/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        @elseif ($payoutType == 'Wise')

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Wise Payment email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="wise_ID" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ auth()->user()->affiliatedetails->wise_email }}" {{ auth()->user()->affiliatedetails->wise_email == null ? '':'readonly' }} />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        @elseif ($payoutType == 'Paypal')
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Paypal Email</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" name="paypal_email" class="form-control form-control-solid mb-3 mb-lg-0" value="{{ auth()->user()->affiliatedetails->paypal_email }}" {{ auth()->user()->affiliatedetails->paypal_email == null ? '':'readonly' }}/>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        @endif
                    </div>
                    <!--end::Scroll-->
                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            Add Now
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

