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



<div class="card card-xl-stretch mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
			<span class="card-label fw-bold fs-3 mb-1">Graph</span>

			<span class="text-muted fw-semibold fs-7">See records</span>
		</h3>
        
        <!--begin::Toolbar-->
        <div class="card-toolbar" data-kt-buttons="true">
            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary active px-4 me-1" id="kt_charts_widget_3_year_btn">Year</a>

            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4 me-1" id="kt_charts_widget_3_month_btn">Month</a>

            <a class="btn btn-sm btn-color-muted btn-active btn-active-primary px-4" id="kt_charts_widget_3_week_btn">Week</a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Chart-->
        <div id="kt_charts_widget_3_chart" style="height: 350px"></div>
        <!--end::Chart-->
    </div>
    <!--end::Body-->
</div>


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