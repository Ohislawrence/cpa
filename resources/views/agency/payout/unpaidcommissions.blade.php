@extends('layouts.app')
@section('headername',  'Unpaid Commisions' )
@section('bread1',  'Payments' )
@section('bread2',  'Unpaid Commisions' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')

@include('admin.components.creditdebit')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.yajra-datatable').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('merchant.table.getallunpaidcommissionsTable') }}",
		columns: [
			{data: 'name',searchable: true},
			{data: 'commission',searchable: true},
            {data: 'date',searchable: true},
		]
	}).ajax.reload();

	});
</script>
@include('agency.payout.masspaymentverification')
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

				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#massPayoutOption">
						Process Mass Payout</button>

					<!--end::Toolbar-->
					@include('admin.components.payviapaypal')
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th>Name</th>
												<th>Commission/Referral Commi. ({{ $currency->symbol }})</th>
                                                <th>Last conversion date</th>
											</tr>
										</thead>
										<tbody class="text-gray-600 fw-semibold">

										</tbody>
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
                </div>
            </div>

        </div>
    </div>
@endsection
