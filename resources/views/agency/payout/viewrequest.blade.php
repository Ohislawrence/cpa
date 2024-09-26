@extends('layouts.app')
@section('headername',  'View All Payment Request' )
@section('bread1',  'Affiliates' )
@section('bread2',  'View All Payment Request' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.paymentRequests').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('merchant.getpaymentrequestforall') }}",
		columns: [
            {data: 'name', name: 'name'},
            {data: 'amount', name: 'amount'},
            {data: 'date', name: 'date'},
			{data: 'status', name: 'status'},
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
        @include('admin.components.alert')


        <!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<h3>All Payment Request</h3>
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addafiliate">
						<i class="ki-duotone ki-plus fs-2"></i>Mass Process Payout</button>
					<!--end::Toolbar-->
                </div>
            </div>
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 paymentRequests" id="kt_datatable_dom_positioning">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                                        <th>Affiliate Name</th>
                                        <th>Amount</th>
                                        <th>Request Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">

                                </tbody>
                            </table>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
        </div>
    </div>
</div>
</div>
@endsection
