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

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
@endsection






@section('slot')
		<!--begin::Content-->
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<!--begin::Container-->
			<div class="container-xxl" id="kt_content_container1">
			@include('admin.components.alert')

			<form method="GET" action="{{ route('affiliate.statistics') }}">
				<select class="form-select form-select-solid" name="timeframe" id="timeframe" onchange="this.form.submit()">
					<option value="7" {{ $timeframe == 7 ? 'selected' : '' }}>Last 7 Days</option>
					<option value="30" {{ $timeframe == 30 ? 'selected' : '' }}>Last 30 Days</option>
					<option value="90" {{ $timeframe == 90 ? 'selected' : '' }}>Last 90 Days</option>
				</select>
			</form>


		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
			<div class="col-xl-3">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<div class="text-gray-900 fw-bold fs-2 mb-2 mt-2">{{ $clicksthisMonth->count() }}</div>
						<div class="fw-semibold text-gray-400">Clicks</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-3">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<div class="text-gray-100 fw-bold fs-2 mb-2 mt-2">{{ $leads->count() }}</div>
						<div class="fw-semibold text-gray-100">Leads</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-3">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<div class="text-white fw-bold fs-2 mb-2 mt-2">$ {{ $earned->sum('earned') }}</div>
						<div class="fw-semibold text-white">Commissions</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
			<div class="col-xl-3">
				<!--begin::Statistics Widget 5-->
				<a href="#" class="card bg-info hoverable card-xl-stretch mb-5 mb-xl-8">
					<!--begin::Body-->
					<div class="card-body">
						<div class="text-white fw-bold fs-2 mb-2 mt-2">$ {{ $epc }}</div>
						<div class="fw-semibold text-white">EPC</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>
		</div>
		<!--end::Row-->



		<div class="card card-xl-stretch mb-xl-8">
			<!--begin::Header-->
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bold fs-3 mb-1">Clicks</span>

					<span class="text-muted fw-semibold fs-7">See records</span>
				</h3>
				
				<!--begin::Toolbar-->
				<div class="card-toolbar" data-kt-buttons="true">
					
					
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Chart-->
				{!! $chart->container() !!}
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
			
@endsection