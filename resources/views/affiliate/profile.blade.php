@extends('layouts.app')
@section('headername',  'My Profile' )
@section('bread1',  'Users' )
@section('bread2',  auth()->user()->name )


@section('header')

@endsection




@section('footer')
@include('affiliate.components.addTrafficSource')
@include('affiliate.components.addPaymentDetails')
<script src="{{ url('assets/js/custom/account/settings/profile-details.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.yajra-datatable').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('affiliate.gettrafficsource')}}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'source', name: 'source'},
			{data: 'address', name: 'address'},
			{data: 'followers', name: 'followers'},
            {data: 'monthlyvisit', name: 'monthlyvisit'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
            
		]
	}).ajax.reload();

	});
</script>
@endsection






@section('slot')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Navbar-->
        @include('admin.components.alert')
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
                                    </i>{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</a>
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
                                            <div class="fs-2 fw-bold">{{ $currency->symbol }}{{ $earnings['paid'] }}</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500 center">Paid Commissions</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-prefix="{{ $currency->symbol }}" data-kt-countup-value="{{ $earnings['unpaid'] }}">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Unpaid Commissions</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            
                                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-prefix="{{ $currency->symbol }}" data-kt-countup-value="{{ $earnings['net'] }}">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Net Earning</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                    <!--begin::Stat-->
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <!--begin::Number-->
                                        <div class="d-flex align-items-center">
                                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $earnings['conversion'] }}">0</div>
                                        </div>
                                        <!--end::Number-->
                                        <!--begin::Label-->
                                        <div class="fw-semibold fs-6 text-gray-500">Net Conversions</div>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Stat-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Wrapper-->
                            
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
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800 ">Your Info</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">Check and edit.</span>
                            </h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                        <a href="{{ route('affiliate.edit') }}" class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
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
                                <span class="fw-bold fs-6 text-gray-800 me-2">{{ auth()->user()->affiliatedetails->phonenumber }}</span>
                                
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Unique Affiliate ID</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->referral_id }}</span>
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
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->city }}, {{ auth()->user()->affiliatedetails->thiscountry->name }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--end::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Join Date</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->created_at->format('F j, Y') }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        
                        
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->

                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800 ">Payment details for {{ $payoutType }}</span>
                                <span class="text-gray-500 mt-1 fw-semibold fs-6">You can only add this once, be sure before you add this detail.</span>
                            </h3>
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                        <a href="#" class="btn btn-sm btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#edit_payment_details">Edit Payment details</a>
                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        @if($payoutType == 'Payoneer')
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Payoneer ID</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->payoneer_ID ?? 'Not set' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        @elseif ($payoutType == 'Wise')
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Wise Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->wise_email ?? 'Not set'}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                        @elseif ($payoutType == 'Paypal')
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Paypal Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->affiliatedetails->paypal_email ?? 'Not set'}}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

                        @endif
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::details View-->
    
    <!--begin::details View-->
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <!--begin::Card header-->
        <div class="card-header cursor-pointer">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Content and Marketing Details</h3>
            </div>
            <!--end::Card title-->
            <!--begin::Action-->
            <a href="#" class="btn btn-sm btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#my_trafficsource">
                Add traffic source</a>
            <!--end::Action-->
        </div>
        <!--begin::Card header-->
        
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                        <th></th>
                        <th>Source</th>
                        <th>Address/Username</th>
                        <th>Followers</th>
                        <th>Monthly Visits</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">

                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->


    </div>
    <!--end::details View-->
</div>
<!--end::Container-->

</div>
<!--end::Content-->

@endsection
