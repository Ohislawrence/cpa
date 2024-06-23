@extends('layouts.app')
@section('headername',  'My Profile' )
@section('bread1',  'Users' )
@section('bread2',  auth()->user()->name )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
                            <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center mb-2">
                                    <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ auth()->user()->name }}</a>
                                    <a href="#">
                                        <i class="ki-duotone ki-verify fs-1 text-primary">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </a>
                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>{{ auth()->user()->getRoleNames()->first() }}</a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-geolocation fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>@isset(auth()->user()->affiliatedetails->place->name)
                                    {{ auth()->user()->affiliatedetails->place->name }}
                                    @endisset</a>
                                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                    <i class="ki-duotone ki-sms fs-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>{{ auth()->user()->email }}</a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->

                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column flex-grow-1 pe-8">
                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bold">$ {{ auth()->user()->balanceFloat }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500 center">Balance</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="80">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Projects</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <i class="ki-duotone ki-arrow-up fs-3 text-success me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Success Rate</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Progress-->
                            <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                                    <span class="fw-bold fs-6">50%</span>
                                </div>
                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                    <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::details View-->
							<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
								<!--begin::Card header-->
								<div class="card-header cursor-pointer">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bold m-0">Profile Details</h3>
									</div>
									<!--end::Card title-->
									<!--begin::Action-->
									<a href="account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
									<!--end::Action-->
								</div>
								<!--begin::Card header-->
								<!--begin::Card body-->
								<div class="card-body p-9">
									<!--begin::Row-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Full Name</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->name }}</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Row-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Company</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<span class="fw-semibold text-gray-800 fs-6">Keenthemes</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Contact Phone 
										<span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
											<i class="ki-duotone ki-information fs-7">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8 d-flex align-items-center">
											<span class="fw-bold fs-6 text-gray-800 me-2">044 3276 454 935</span>
											<span class="badge badge-success">Verified</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Company Site</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">keenthemes.com</a>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Country 
										<span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
											<i class="ki-duotone ki-information fs-7">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
											</i>
										</span></label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">Germany</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-7">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Communication</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<span class="fw-bold fs-6 text-gray-800">Email, Phone</span>
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="row mb-10">
										<!--begin::Label-->
										<label class="col-lg-4 fw-semibold text-muted">Allow Changes</label>
										<!--begin::Label-->
										<!--begin::Label-->
										<div class="col-lg-8">
											<span class="fw-semibold fs-6 text-gray-800">Yes</span>
										</div>
										<!--begin::Label-->
									</div>
									<!--end::Input group-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::details View-->
    </div>
    <!--end::Container-->
</div>
<!--end::Content-->

@endsection
