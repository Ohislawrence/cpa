@extends('layouts.app')
@section('headername',  'Batch Payouts' )
@section('bread1',  'Payouts' )
@section('bread2',  'Batch Payouts' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(function () {
        var table = $('.batchpayout').DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: "{{ route('merchant.table.batchpayout') }}",
            columns: [
                {data: 'batch_id', searchable: true},
                {data: 'total_amount', searchable: true},
                {data: 'status', searchable: true},
                {data: 'processedAT', searchable: true},
                {data: 'range', searchable: true},  // ✅ Added missing comma
                {data: 'payees', searchable: false} // ❗ Usually, 'payees' is not searchable if it's a button/link
            ]
        });

        // Example of reloading manually if needed
        // table.ajax.reload();
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
				</div>
			</div>
					<!--end::Toolbar-->
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable batchpayout" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th>Batch ID</th>
												<th>Amount Paid ({{ $currency->symbol }})</th>
                                                <th>Status</th>
												<th>Processed date</th>
												<th>Payment Range</th>
												<th>Action</th>
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
