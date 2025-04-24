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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if ($shouldShowTour)
            const tour = new Shepherd.Tour({
                defaultStepOptions: {
                    scrollTo: true,
                    cancelIcon: { enabled: true },
                    classes: 'shadow-lg rounded-md bg-white',
                }
            });

            // Step 1: Welcome Message
            tour.addStep({
                id: 'welcome',
                title: 'Welcome to Tracklia',
                text: 'Let’s explore how to run your affiliate program.',
                buttons: [
                    { text: 'Next', action: tour.next }
                ]
            });

            // Step 2: Adding Their First Offer
            tour.addStep({
                id: 'add-offer',
                title: 'Add Your First Offer',
                text: 'Click here to add your first offer.',
                attachTo: { element: '#add-offer-link', on: 'right' },
                buttons: [
                    { text: 'Back', action: tour.back },
                    { text: 'Next', action: tour.next }
                ]
            });

            // Step 3: Setting Up Basic Configuration
            tour.addStep({
                id: 'configuration',
                title: 'Set Up Basic Configuration',
                text: 'Configure your business and payout preferences here.',
                attachTo: { element: '#configuration-link', on: 'right' },
                buttons: [
                    { text: 'Back', action: tour.back },
                    { text: 'Next', action: tour.next }
                ]
            });

            // Step 4: Creating an Offer
            tour.addStep({
                id: 'create-offer',
                title: 'Create an Offer',
                text: 'Create a new offer by clicking here.',
                attachTo: { element: '#create-offer-link', on: 'right' },
                buttons: [
                    { text: 'Back', action: tour.back },
                    { text: 'Next', action: tour.next }
                ]
            });

            // Step 5: Invite Affiliates
            tour.addStep({
                id: 'invite-affiliate',
                title: 'Invite Affiliates',
                text: 'Invite affiliates to join your program.',
                attachTo: { element: '#invite-affiliate-link', on: 'right' },
                buttons: [
                    { text: 'Back', action: tour.back },
                    { text: 'Next', action: tour.next }
                ]
            });

            // Step 6: Set Up Payouts
            tour.addStep({
                id: 'setup-payout',
                title: 'Set Up Payouts',
                text: 'Configure your payout settings here.',
                attachTo: { element: '#payout-settings-link', on: 'right' },
                buttons: [
                    { text: 'Back', action: tour.back },
                    { text: 'Finish', action: () => completeTour() }
                ]
            });

            // Start the tour
            tour.start();

            // Mark the tour as completed
            function completeTour() {
                fetch('merchant/user/complete-tour', { method: 'POST' })
                    .then(() => console.log('Tour completed'))
                    .catch(err => console.error('Error completing tour:', err));
            }
        @endif
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
