@php
    if (request('campaign_id') === 'all'){
        $headerName = 'All Campaigns';
    }
    else{
        $headerName = $campaigns[request('campaign_id')] ?? 'None Selected';
    }
    
@endphp

@extends('layouts.app')
@section('headername',  'Reports for '.$headerName )
@section('bread1',  'Analytics' )
@section('bread2',  'Reports for '.$headerName )


@section('header')
<style>
    .google-visualization-tooltip {
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        padding: 8px;
        z-index: 1000;
        pointer-events: none;
    }
</style>
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Include Leaflet.js for map -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    google.charts.load('current', { packages: ['geochart'] });
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {
        $.ajax({
            url: "{{ route('merchant.report.data') }}",
            method: 'GET',
            data: {
                campaign_id: $('#campaign_id').val(),
                start_date: $('#start_date').val(),
                end_date: $('#end_date').val()
            },
            success: function (response) {
                const data = new google.visualization.DataTable();
                data.addColumn('string', 'Country');
                data.addColumn('number', 'Clicks');
                data.addColumn('number', 'Conversions'); // Add conversions column

                // Populate data with both clicks and conversions
                const regionsData = response.regions_by_clicks.map(item => [
                    item.country_name,
                    item.total_clicks,
                    item.total_conversions // Ensure this exists in your backend response
                ]);
                data.addRows(regionsData);

                const options = {
                    colorAxis: { colors: ['#f5f5dc', '#b8860b'] },
                    backgroundColor: '#f5f5f5',
                    datalessRegionColor: '#f5f5f5',
                    defaultColor: '#f5f5dc',
                    // Show both metrics in the tooltip
                    tooltip: { isHtml: true, trigger: 'focus' },
                    // Optional: Use conversions for the bubble size (adjust as needed)
                    sizeAxis: { minValue: 0, maxValue: Math.max(...regionsData.map(row => row[2])) },
                    // Optional: Color by clicks, size by conversions
                };

                const chart = new google.visualization.GeoChart(document.getElementById('geoChart'));
                chart.draw(data, options);
            },
            error: function (xhr, status, error) {
                alert('Error fetching data: ' + error);
            }
        });
    }

    // Refresh Geo Chart when form is submitted
    $('#report-form').on('submit', function (e) {
        e.preventDefault();
        drawRegionsMap(); // Refresh the chart without reloading the page
    });

    // Manually refresh Geo Chart when filters change
    $('#campaign_id, #start_date, #end_date').on('change', function () {
        drawRegionsMap();
    });
</script>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<!--click table -->
<script>
    $(document).ready(function () {
        // Initialize DataTable
        const dataTable = $('#clicksTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('merchant.report.datatable') }}",
                data: function (d) {
                    d.campaign_id = $('#campaign_id').val();
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [
                { data: 'date', name: 'date' },
                { data: 'clicks', name: 'clicks' },
                { data: 'conversions', name: 'conversions' },
                { data: 'epc', name: 'epc' },
                { data: 'affiliates', name: 'affiliates' },
                { data: 'conversionRate', name: 'conversionRate' }
            ]
        });

        // Refresh DataTable when form is submitted
        $('#report-form').on('submit', function (e) {
            e.preventDefault();

            const formData = $(this).serialize(); // Serialize form data
            const url = $(this).attr('action') + '?' + formData; // Append query string to URL

            // Reload the page with the updated URL
            window.location.href = url;
        });

        // Manually refresh DataTable when filters change
        $('#campaign_id, #start_date, #end_date').on('change', function () {
            dataTable.ajax.reload();
        });
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    let lineChart = null;

    // Function to update the Line Chart
    function updateLineChart(data) {
        if (lineChart) {
            lineChart.destroy();
        }

        const labels = data.map(item => item.date);
        const clicks = data.map(item => item.total_clicks);
        const conversions = data.map(item => item.total_conversions);

        lineChart = new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Total Clicks',
                        data: clicks,
                        borderColor: 'blue',
                        borderWidth: 2,
                        fill: false
                    },
                    {
                        label: 'Total Conversions',
                        data: conversions,
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

    // Function to populate stats in the table
    function populateStats(stats) {
        $('#active_affiliates').text(stats.active_affiliates);
        $('#total-clicks').text(stats.total_clicks);
        $('#total-conversions').text(stats.total_conversions);
        $('#total-revenue').text(stats.total_revenue.toFixed(2));
    }

    // Function to populate tables dynamically
    function populateTable(tableId, data, columns) {
        const tableDiv = $(`#${tableId}`);
        let tableHtml = `<table class="table align-middle gs-0 gy-5"><thead><tr>`;
        columns.forEach(col => tableHtml += `<th class="p-0">${col}</th>`);
        tableHtml += '</tr></thead><tbody>';
        data.forEach(row => {
            tableHtml += '<tr>';
            columns.forEach(col => tableHtml += `<td><div class="text-gray-900 fw-bold mb-1 fs-6">${row[col]}</div></td>`);
            tableHtml += '</tr>';
        });
        tableHtml += '</tbody></table>';
        tableDiv.html(tableHtml);
    }

    // Function to fetch data from the server
    function fetchData(campaignId, startDate, endDate) {
        $.ajax({
            url: "{{ route('merchant.report.data') }}",
            method: 'GET',
            data: {
                campaign_id: campaignId,
                start_date: startDate,
                end_date: endDate
            },
            success: function (response) {
                populateStats(response.stats);
                updateLineChart(response.line_chart_data);
                populateTable('affiliates-by-clicks-table', response.affiliates_by_clicks, ['affiliate_name', 'total_clicks']);
                populateTable('affiliates-by-conversions-table', response.affiliates_by_conversions, ['affiliate_name', 'total_conversions']);
            },
            error: function (xhr, status, error) {
                alert('Error fetching data: ' + error);
            }
        });
    }

    // Get query string parameters from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const campaignId = urlParams.get('campaign_id') || '';
    const startDate = urlParams.get('start_date') || '';
    const endDate = urlParams.get('end_date') || '';

    // Pre-fill the form fields with query string values
    $('#campaign_id').val(campaignId);
    $('#start_date').val(startDate);
    $('#end_date').val(endDate);

    // If all parameters are present, fetch data on page load
    if (campaignId && startDate && endDate) {
        fetchData(campaignId, startDate, endDate);
    }

    // Handle form submission
    $('#report-form').on('submit', function (e) {
        e.preventDefault();

        const formData = $(this).serialize(); // Serialize form data
        const url = $(this).attr('action') + '?' + formData; // Append query string to URL

        // Reload the page with the updated URL
        window.location.href = url;
    });
});
</script>
@endsection






@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <div class="row fv-row mb-7">
            <div class="col-md-0">
                <div class="w-100">
        <!-- Campaign Selector -->
        <form id="report-form" action="{{ route('merchant.reports') }}" method="GET">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="campaign_id" class="form-label">Select Campaign:</label>
                    <select class="form-select" id="campaign_id" name="campaign_id" required>
                        <option value="">-- Select Campaign --</option>
                        <option value="all" {{ request('campaign_id') == 'all' ? 'selected' : '' }}>
                            All Campaigns
                        </option>
                        @foreach ($campaigns as $offerid => $name)
                            <option value="{{ $offerid }}" {{ request('campaign_id') == $offerid ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="start_date" class="form-label">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                           value="{{ request('start_date') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="end_date" class="form-label">End Date:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                           value="{{ request('end_date') }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Report</button>
        </form>
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
                <span id="active_affiliates">0</span>
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
                <span id="total-clicks">0</span>
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
                <span id="total-conversions">0</span>
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
                {{ $currency->symbol }} <span id="total-revenue">0.00</span>
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
        <!--begin::Charts Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Clicks and Conversions</span>
                    <span class="text-muted fw-semibold fs-7">This compares your clicks and converstions</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Chart-->
                <canvas id="lineChart" width="400" height="200" ></canvas>
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 3-->
    </div>
</div>
<!--end::Row-->


        <!--begin::Row-->
<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-6">
        <!--begin::Tables Widget 1-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Affiliates by Clicks</span>
                    <span class="text-muted fw-semibold fs-7">Pending 10 tasks</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        View More
                    </button>
                    
                    <!--end::Menu 1-->
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive" id="affiliates-by-clicks-table">
                    <!-- Table will be populated here -->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Body-->
        </div>
        <!--endW::Tables Widget 1-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-6">
        <!--begin::Tables Widget 2-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Affiliates by Conversions</span>
                    <span class="text-muted mt-1 fw-semibold fs-7">Affiliates with the highest conversion this period</span>
                </h3>
                <div class="card-toolbar">
                    <!--begin::Menu-->
                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        View more
                    </button>
                    <!--end::Menu-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-3">
                <!--begin::Table container-->
                <div class="table-responsive" id="affiliates-by-conversions-table">
                    <!-- Table will be populated here -->
                </div>
                <!--end::Table container-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Tables Widget 2-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->




<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <div class="col-xl-12">
        <!--begin::Charts Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Clicks by regions</span>
                    <span class="text-muted fw-semibold fs-7">More than 1000 new records</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Chart-->
                <div id="geoChart" style="width: 100%; height: 500px;"></div>
                <!--end::Chart-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Charts Widget 3-->
    </div>
</div>

    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h3>Clicks for this period</h3>
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
                        <th>CR(%)</th>
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
@endsection