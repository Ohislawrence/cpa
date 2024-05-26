@extends('layouts.app')
@section('headername',  'Statistics' )
@section('bread1',  'Dashboard' )
@section('bread2',  'Statistics' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('#kt_datatable_responsive1').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('affiliate.getUserClicks') }}",
		columns: [
            {data: 'my_date',orderable: true,searchable: true},
			{data: 'total_clicks',orderable: true,searchable: true},
			{data: 'epc',orderable: true,searchable: true},
            {data: 'conversions',orderable: true,searchable: true},
            {data: 'cpa',orderable: true,searchable: true},
            {data: 'payout'},
		]
	});

	});
</script>
@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container1">
	@include('admin.components.alert')
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">

				</div>
            </div>
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
                                    <div class="table-responsive">
									<table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="kt_datatable_responsive1">
										<thead>
											<tr class="fw-semibold fs-6 text-gray-800">
                                                <th>Date</th>
												<th>Clicks</th>
												<th>EPC</th>
                                                <th>Conversions</th>
                                                <th>CPA</th>
                                                <th>Payout($)</th>
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
@endsection