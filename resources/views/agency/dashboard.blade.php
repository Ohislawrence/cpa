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

	var dt = $('#Topcampaigns').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('merchant.topcampaignsDash') }}",
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

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Engage widget 9-->
            <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #2503ac70 0%, #E96922 100%)">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Row-->
                    <div class="row align-items-center">
                        <!--begin::Col-->
                        <div class="col-sm-7 pe-0 mb-5 mb-sm-0">
                            <!--begin::Wrapper-->
                            <div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
                                <!--begin::Container-->
                                <div class="mb-7">
                                    <!--begin::Title-->
                                    <div class="mb-6">
                                        <h3 class="fs-2x fw-semibold text-white">Upgrade Your Plan</h3>
                                        <span class="fw-semibold text-white opacity-75">Flat cartoony and illustrations with vivid color</span>
                                    </div>
                                    <!--end::Title-->
                                    <!--begin::Items-->
                                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center me-5 me-xl-13">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label" style="background: rgba(255, 255, 255, 0.15);">
                                                    <i class="ki-duotone ki-abstract-41 fs-4 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <a href="pages/user-profile/projects.html" class="text-white text-opacity-75 fs-8">Projects</a>
                                                <span class="fw-bold text-white fs-7 d-block">Up to 500</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <span class="symbol-label" style="background: rgba(255, 255, 255, 0.15);">
                                                    <i class="ki-duotone ki-abstract-26 fs-4 text-white">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Info-->
                                            <div class="m-0">
                                                <a href="apps/user-management/users/list.html" class="text-white text-opacity-75 fs-8">Tasks</a>
                                                <span class="fw-bold text-white fs-7 d-block">Unlimited</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--begin::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-5">
                            <!--begin::Illustration-->
                            <img src="{{ asset('assets/media/svg/illustrations/easy/7.svg') }}" class="h-200px h-lg-250px my-n6" alt="" />
                            <!--end::Illustration-->
                        </div>
                        <!--begin::Col-->
                    </div>
                    <!--begin::Row-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Engage widget 9-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            <!--begin::Card widget 19-->
            <div class="card card-flush h-lg-100">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-900">Payout</span>
                        <span class="text-gray-500 mt-1 fw-semibold fs-6"></span>
                    </h3>
                    <!--end::Title-->
                </div>
                <!--end::Header-->
                <!--begin::Card body-->
                <div class="card-body d-flex align-items-end pt-6">
                    <!--begin::Row-->
                    <div class="row align-items-center mx-0 w-100">
                        <!--begin::Col-->
                        <div class="col-7 px-0">
                            <!--begin::Labels-->
                            <div class="d-flex flex-column content-justify-center">
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-success me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">Today:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">232</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center my-4">
                                    <!--begin::Bullet-->
                                    <div class="bullet bg-primary me-3" style="border-radius: 3px;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">Yesterday:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">22</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <div class="d-flex fs-6 fw-semibold align-items-center">
                                    <!--begin::Bullet-->
                                    <div class="bullet me-3" style="border-radius: 3px;background-color: #E4E6EF;width: 12px;height: 12px"></div>
                                    <!--end::Bullet-->
                                    <!--begin::Label-->
                                    <div class="fs-5 fw-bold text-gray-600 me-5">This Month:</div>
                                    <!--end::Label-->
                                    <!--begin::Stats-->
                                    <div class="ms-auto fw-bolder text-gray-700 text-end">222</div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Labels-->
                        </div>
                        <!--end::Col-->

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card widget 19-->
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->

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
                                <div class="fs-4 fw-bold">{{ $clicksToday }}</div>
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
                            <div class="fs-4 fw-bold">{{ $clicksYesterday }}</div>
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
                            <div class="fs-4 fw-bold">{{ $clicksweek_to_date }}</div>
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
                                <div class="fs-4 fw-bold">{{ $clicksmonth_to_date }}</div>
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
                                <div class="fs-4 fw-bold">{{ $currency }} {{ $todayEPC }}</div>
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
                            <div class="fs-4 fw-bold">{{ $currency }} {{ $yesterdayEPC }}</div>
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
                            <div class="fs-4 fw-bold">{{ $currency }} {{ $weekToDateEPC }}</div>
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
                                <div class="fs-4 fw-bold">{{ $currency }} {{ $monthToDateEPC }}</div>
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
                    <span class="card-label fw-bold fs-3 mb-1">Revenue</span>
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
                                <div class="fs-4 fw-bold">{{ $earnedtoday }}</div>
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
                            <div class="fs-4 fw-bold">{{ $earnedyesterday }} </div>
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
                            <div class="fs-4 fw-bold">{{ $earnedweek_to_date }}</div>
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
                                <div class="fs-4 fw-bold">{{ $earnedmonth_to_date }}</div>
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
                <table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="Topcampaigns">
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
