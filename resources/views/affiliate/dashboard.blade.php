@extends('layouts.app')
@section('headername',  'Dashboard' )
@section('bread1',  'Quick View' )
@section('bread2',  'Dashboard' )


@section('header')

@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
	$(function () {

	var dt = $('#myTopcampaigns').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('affiliate.topcampaigns.affiliates') }}",
		columns: [
            {data: 'offer_id'},
			{data: 'offerName'},
			{data: 'clickNumber'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		],
        
	});

	});
</script>
@endsection






@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class="container-xxl" id="kt_content_container">
        <!--begin::Col-->

    <!--add message widget here-->

<!--begin::Row-->
<div class="row g-5 g-xl-8">
    <!--begin::Col-->
    <div class="col-xl-4">
        <!--begin::Mixed Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Beader-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Clicks</span>
                    <span class="text-muted fw-semibold fs-7">The total number of clicks</span>
                </h3>
                
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0 d-flex flex-column">
                <!--begin::Stats-->
                <div class="card-p pt-5 bg-body flex-grow-1">
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Today</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ number_format($clicksToday) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Yesterday</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ number_format($clicksYesterday) }}</div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-0 mt-8">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">WTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ number_format($clicksweek_to_date) }}</div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">MTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ number_format($clicksmonth_to_date) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 3-->
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-xl-4">
        <!--begin::Mixed Widget 3-->
        <div class="card card-xl-stretch mb-xl-8">
            <!--begin::Beader-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">EPC</span>
                    <span class="text-muted fw-semibold fs-7">Earnings per Click</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0 d-flex flex-column">
                <!--begin::Stats-->
                <div class="card-p pt-5 bg-body flex-grow-1">
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Today</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $todayEPC, 2) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Yesterday</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $yesterdayEPC,2) }}</div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-0 mt-8">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">WTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $weekToDateEPC, 2) }}</div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">MTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $monthToDateEPC, 2) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 3-->
    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-4">
        <!--begin::Mixed Widget 3-->
        <div class="card card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Beader-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Commissions</span>
                    <span class="text-muted fw-semibold fs-7">How much you have made</span>
                </h3>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body p-0 d-flex flex-column">
                <!--begin::Stats-->
                <div class="card-p pt-5 bg-body flex-grow-1">
                    <!--begin::Row-->
                    <div class="row g-0">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Today</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $earnedtoday, 2) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">Yesterday</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $earnedyesterday, 2) }} </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                    <!--begin::Row-->
                    <div class="row g-0 mt-8">
                        <!--begin::Col-->
                        <div class="col mr-8">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">WTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $earnedweek_to_date, 2) }}</div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col">
                            <!--begin::Label-->
                            <div class="fs-7 text-muted fw-bold">MTD</div>
                            <!--end::Label-->
                            <!--begin::Stat-->
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">{{ $currency }} {{ number_format( $earnedmonth_to_date , 2) }}</div>
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 3-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->


<!-- Top Stats -->
<div class="row g-5 g-xl-8">
    <div class="col-xl-3">
        <a href="#" class="card bg-body hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                    <span id="">{{ $currency }}{{ number_format($earnings['paid'], 2) ?? 0.00}}</span>
                </div>
                <div class="fw-semibold text-gray-400">Paid Commissions(MTD)</div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    <span id="">{{ $currency }}{{ number_format($earnings['unpaid'], 2) ?? 0.00}}</span>
                </div>
                <div class="fw-semibold text-white">Unpaid Commissions(MTD)</div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                    <span id="">{{ $currency }}{{ number_format($earnings['refcommission'], 2) ?? 0.00}}</span>
                </div>
                <div class="fw-semibold text-white">Referral Commissions(MTD)</div>
            </div>
        </a>
    </div>
    <div class="col-xl-3">
        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <div class="text-white fw-bold fs-2 mb-2 mt-5">
                   <span id="">{{ $currency }}{{ number_format($earnings['refunds'], 2) ?? 0.00}}</span>
                </div>
                <div class="fw-semibold text-white">Refunds(MTD)</div>
            </div>
        </a>
    </div>
</div>


    <!--begin::Col-->
    <div class="col-xl-12">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold text-gray-800">Top performing offers</span>
                    <span class="text-gray-500 mt-1 fw-semibold fs-8">By clicks this month {{ now()->format('M, Y') }}</span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Card header-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="myTopcampaigns">
                    <thead>
                        <tr class="fw-semibold fs-6 text-gray-700">
                            <th>ID</th>
                            <th>Campaign Name</th>
                            <th>Clicks</th>
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
        <!--end::Table Widget 4-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->
@endsection
