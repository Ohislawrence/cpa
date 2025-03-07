@extends('layouts.app')
@section('headername',  'See stats for '.$offer->name )
@section('bread1',  'View Stats' )
@section('bread2',  $offer->name )


@section('header')
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<script>
    $(document).ready(function() {
        // Function to fetch data based on date range
        function fetchData(dateRange) {
            $.ajax({
                url: "{{ route('merchant.singleGetStat',[$offer->id]) }}",
                type: "GET",
                data: { dateRange: dateRange },
                success: function(response) {
                    $('#ActiveCampaigns').text(response.ActiveCampaigns);
                    $('#clicks').text(response.clicks);
                    $('#Conversions').text(response.Conversions);
                    $('#Revenue').text(response.Revenue);
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



<script type="text/javascript">
	$(function () {

	var dt = $('#clicksTable').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('merchant.viewClicksTable', [$offer->offerid]) }}",
		columns: [
			{data: 'date'},
			{data: 'clicks'},
            {data: 'conversions'},
			{data: 'epc'},
            {data: 'affiliates'},
			
		],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'csv', text: 'Export CSV', className: 'btn btn-primary' },
            { extend: 'excel', text: 'Export Excel', className: 'btn btn-success' },
        ]
	});

	});
</script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const ctx = document.getElementById('lineChart').getContext('2d');
		let myChart = null;

		function updateChart(data) {
			if (myChart) {
				myChart.destroy();
			}

			const labels = data.map(item => item.date);
			const conversions = data.map(item => item.total_conversions);
			const clicks = data.map(item => item.total_clicks);

			myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: labels,
					datasets: [
						{
							label: 'Total Conversions',
							data: conversions,
							borderColor: 'blue',
							borderWidth: 2,
							fill: false
						},
						{
							label: 'Total Clicks',
							data: clicks,
							borderColor: 'red',
							borderWidth: 2,
							fill: false
						}
					]
				},
				options: {
					responsive: true,
					scales: {
						x: {
							title: {
								display: true,
								text: 'Date'
							}
						},
						y: {
							beginAtZero: true,
							title: {
								display: true,
								text: 'Count'
							}
						}
					}
				}
			});
		}

		// Function to fetch data via AJAX
		function fetchData(offerId, startDate, endDate) {
			$.ajax({
				url: "{{ route('merchant.clicksChart', [$offer->offerid]) }}",
				method: 'GET',
				data: {
					offer_id: offerId,
					start_date: startDate,
					end_date: endDate
				},
				success: function (response) {
					updateChart(response);
				},
				error: function (xhr, status, error) {
					alert('Error fetching data: ' + error);
				}
			});
		}

		// Set default date range (one week ago to today)
		const today = new Date();
		const oneWeekAgo = new Date();
		oneWeekAgo.setDate(today.getDate() - 7);

		const defaultStartDate = oneWeekAgo.toISOString().split('T')[0];
		const defaultEndDate = today.toISOString().split('T')[0];

		// Pre-fill the form fields with default values
		$('#start_date').val(defaultStartDate);
		$('#end_date').val(defaultEndDate);

		// Get the offer_id from the Blade template
		const offerId = $('#offer_id').val();

		// Trigger AJAX request on page load
		fetchData(offerId, defaultStartDate, defaultEndDate);

		// Handle form submission
		$('#date-range-form').on('submit', function (e) {
			e.preventDefault();

			const startDate = $('#start_date').val();
			const endDate = $('#end_date').val();

			fetchData(offerId, startDate, endDate);
		});
	});
</script>
@endsection





@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">

		<!--begin::Input group-->
<div class="row fv-row mb-7">
	<div class="col-md-0">
		<div class="w-100">
			<!--begin::Select2-->
			<select id="dateRange" class="form-select form-select-solid" name="dateRange">
				<option value="today">Today</option>
				<option value="7_days_ago" selected>7 Days Ago</option>
				<option value="30_days_ago">30 Days Ago</option>
				<option value="this_month">This Month</option>
				<option value="all_time">All Time</option>
			</select>
			<!--end::Select2-->
		</div>
	</div>
</div>
        <!--begin::Col-->
        <div class="row g-5 g-xl-8">
            <div class="col-xl-3">

        <!--begin::Statistics Widget 5-->
    <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
        <!--begin::Body-->
        <div class="card-body">
            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                <span id="ActiveCampaigns">-</span>
            </div>

            <div class="fw-semibold text-gray-400">
               Active Affiliate(s)      </div>
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
                {{ $currency->symbol }} <span id="Revenue">-</span>
            </div>

            <div class="fw-semibold text-white">
                Revenue Generated </div>
        </div>
        <!--end::Body-->
    </a>
    <!--end::Statistics Widget 5-->    </div>
    </div>
    <!--end::Row-->


        <!--begin::Row-->
			<div class="row g-5 g-xl-8">
				<div class="col-xl-12">
					<!--begin::Charts Widget 1-->
					<div class="card card-xl-stretch mb-xl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<!--begin::Title-->
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bold fs-3 mb-1">Clicks & Conversions</span>
								<span class="text-muted fw-semibold fs-7">Chart for clicks and conversions</span>
							</h3>
							<!--end::Title-->
							<!--begin::Toolbar-->
							<div class="card-toolbar">
								<!--begin::Menu-->
								
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Chart-->
							
							<!--end::Chart-->
							<div class="p-4 border rounded-lg shadow-md relative">

								<!-- Date Range Selector -->
								<form id="date-range-form">
									
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="start_date" class="form-label">Start Date:</label>
											<input type="date" class="form-control" id="start_date" name="start_date" required>
										</div>
										<div class="col-md-6 mb-3">
											<label for="end_date" class="form-label">End Date:</label>
											<input type="date" class="form-control" id="end_date" name="end_date" required>
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Update Chart</button>
								</form>

								<!-- Chart Container -->
								<canvas id="lineChart" width="400" height="200"></canvas>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Charts Widget 1-->
				</div>
			</div>
			<!--end::Row-->



        <!--begin::Row-->
							
					

<!--begin::Card-->
<div class="card">
	<!--begin::Card header-->
	<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
		<div class="card-title">
			<h3>Clicks for this campaign</h3>
		</div>
	</div>
	<div class="card-body py-4">
		<!--begin::Table-->
		<div class="table-responsive">
		<table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="clicksTable">
			<thead>
				<tr class="fw-semibold fs-6 text-gray-700">
					<th>Date</th>
					<th>Click Count</th>
					<th>Conversions</th>
					<th>EPC({{ $currency->symbol }})</th>
					<th>No. of Affiliates</th>
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
@endsection
