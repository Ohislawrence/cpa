@extends('layouts.app')
@section('headername',  'Payments' )
@section('bread1',  'My Account' )
@section('bread2',  'Payments' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
@include('affiliate.components.requestpayment')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('#kt_datatable_responsive1').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('affiliate.getpaymentdata') }}",
		columns: [
            {data: 'date',orderable: true,searchable: true},
			{data: 'number',orderable: true,searchable: true},
            {data: 'amount',orderable: true,searchable: true},
            {data: 'method',orderable: true,searchable: true},
			{data: 'status',orderable: true,searchable: true},
		]
	});

	});
</script>
@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Row-->
        @include('admin.components.alert')
<div class="row g-5 g-xl-8">
    <div class="col-xl-3">
        
<!--begin::Statistics Widget 5-->
<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
    <!--begin::Body-->
    <div class="card-body">
        <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">           
            $ {{ Auth::user()->balanceFloat }}                   
        </div>

        <div class="fw-semibold text-gray-400">
           Balance       </div>
    </div>
    <!--end::Body-->
</a>
<!--end::Statistics Widget 5-->    </div>
    
    <div class="col-xl-3">
        
<!--begin::Statistics Widget 5-->
<a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
    <!--begin::Body-->
    <div class="card-body">
        <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">           
            $ {{ $earnedToday }}                 
        </div>

        <div class="fw-semibold text-gray-100">
          Today       </div>
    </div>
    <!--end::Body-->
</a>
<!--end::Statistics Widget 5-->    </div>
    
    <div class="col-xl-3">
        
<!--begin::Statistics Widget 5-->
<a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
    <!--begin::Body-->
    <div class="card-body">      

        <div class="text-white fw-bold fs-2 mb-2 mt-5">           
            $ {{ $earnedYesterday }}                  
        </div>

        <div class="fw-semibold text-white">
           Yesterday        </div>
    </div>
    <!--end::Body-->
</a>
<!--end::Statistics Widget 5-->    </div>

    <div class="col-xl-3">
        
<!--begin::Statistics Widget 5-->
<a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
    <!--begin::Body-->
    <div class="card-body">     
        <div class="text-white fw-bold fs-2 mb-2 mt-5">           
            $ {{ $earnedThisMonth }}                  
        </div>

        <div class="fw-semibold text-white">
        Month To Date     </div>
    </div>
    <!--end::Body-->
</a>
<!--end::Statistics Widget 5-->    </div>
</div>
<!--end::Row-->

<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Card body-->
            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestpayment">
                Request Payment</button>
                <!--end::Add user-->
            </div>
        </div>
    </div>
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="kt_datatable_responsive1">
                            <thead>
                                <tr class="fw-semibold fs-6 text-gray-800">
                                    <th>Date</th>
                                    <th>No</th>
                                    <th>Amount ($)</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">

                            </tbody>
                        </table>
                        </div>
                        <!--end::Table-->
                    </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
        </div>
    </div>

</div>
</div>





    </div>
</div>
@endsection