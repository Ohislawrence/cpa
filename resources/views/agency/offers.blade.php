@extends('layouts.app')
@section('headername',  'Campaigns' )
@section('bread1',  'Analytics' )
@section('bread2',  'Campaigns' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('#kt_table_widget_4_table').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('merchant.viewcampaign.campaign') }}",
		columns: [
            {data: 'offerid'},
			{data: 'name'},
			{data: 'category'},
            {data: 'payout'},
            {data: 'payouttype'},
            {data: 'status'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		]
	});

	});
</script>

<script>
    $(document).ready(function() {
        // Function to fetch data based on date range
        function fetchData(dateRange) {
            $.ajax({
                url: "{{ route('merchant.getStats') }}",
                type: "GET",
                data: { dateRange: dateRange },
                success: function(response) {
                    $('#ActiveCampaigns').text(response.ActiveCampaigns);
                    $('#clicks').text(response.clicks);
                    $('#Conversions').text(response.Conversions);
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                }
            });
        }

        // Fetch "7 Days Ago" data on page load
        fetchData('7_days_ago');

        // Fetch data based on dropdown change
        $('#dateRange').on('change', function() {
            const dateRange = $(this).val();
            fetchData(dateRange);
        });
    });
</script>

@endsection




@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
	@include('admin.components.alert')
	@if(!empty($offers->count()))
    <!--begin::Col-->




    <div id="click-display" class="row g-5 g-xl-8">
        <select id="dateRange" class="form-control form-control-solid" name="dateRange">
            <option value="today">Today</option>
            <option value="7_days_ago" selected>7 Days Ago</option>
            <option value="30_days_ago">30 Days Ago</option>
            <option value="this_month">This Month</option>
            <option value="all_time">All Time</option>
        </select>
        <div class="col-xl-3">

    <!--begin::Statistics Widget 5-->
    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
        <!--begin::Body-->
        <div class="card-body">
            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                <span id="ActiveCampaigns">-</span>
            </div>

            <div class="fw-semibold text-gray-400">
               Active Campaigns      </div>
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
                <span id="clicks">-</span>
            </div>

            <div class="fw-semibold text-gray-100">
              Clicks    </div>
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
                <span id="Conversions">-</span>
            </div>

            <div class="fw-semibold text-white">
                Conversions  </div>
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
                <span id="RevenueGenerated">-</span>
            </div>

            <div class="fw-semibold text-white">
                Revenue Generated </div>
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
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
						<input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search user" />
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

						<!--begin::Add offer-->
						<a href="{{ route('merchant.create.campaign') }}" class="btn btn-primary">
						<i class="ki-duotone ki-plus fs-2"></i>Add Campaign</a>
						<!--end::Add offer-->
					</div>
				</div>
			</div>
								<div class="card-body py-4">
									<!--begin::Table-->
                                    <div class="table-responsive">
									<table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="kt_table_widget_4_table">
										<thead>
											<tr class="fw-semibold fs-6 text-gray-700">
                                                <th>ID</th>
												<th>Campaign Name</th>
												<th>Category</th>
                                                <th>Payout</th>
                                                <th>Payout Type</th>
                                                <th>Status</th>
												<th>Actions</th>
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

			@else
				<!--begin::Card-->
				<div class="card">
					<!--begin::Card body-->
					<div class="card-body">
						<!--begin::Heading-->
						<div class="card-px text-center pt-15 pb-15">
							<!--begin::Title-->
							<h2 class="fs-2x fw-bold mb-0">Create Campaign</h2>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="text-gray-500 fs-4 fw-semibold py-7">Click on the below button to
							<br /> create a new campaign.</p>
							<!--end::Description-->
							<!--begin::Action-->
							<a href="{{ route('merchant.create.campaign') }}" class="btn btn-primary er fs-6 px-8 py-4">Create Campaign</a>

							<!--end::Action-->
						</div>
						<!--end::Heading-->
						<!--begin::Illustration-->
						<div class="pb-15 px-5">
							<img src="{{ asset('assets/media/illustrations/dozzy-1/6.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
						</div>
						<!--end::Illustration-->
					</div>
					<!--end::Card body-->

				</div>

			@endif
        </div>
    </div>

@endsection
