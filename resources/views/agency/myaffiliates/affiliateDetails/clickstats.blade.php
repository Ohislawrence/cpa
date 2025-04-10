@extends('layouts.app')
@section('headername',  'Click Stats for '.$user->name )
@section('bread1',  'Offers' )
@section('bread2',  'Click Stats for '.$user->name )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.clicksTable').DataTable({
		searchDelay: 500,
		processing: true,
        responsive: true,
		serverSide: true,
		ajax: "{{ route('merchant.getuserclickstats', ['id'=> $user->id]) }}",
		columns: [
			{data: 'offerid'},
            {data: 'clickID'},
			{data: 'platform'},
            {data: 'browser'},
            {data: 'country'},
            {data: 'date', name: 'date'},
            {data: 'Status'},
		]
	}).ajax.reload();

	});
</script>

<script>
    $(document).on('change', '.status-dropdown', function() {
    let clickId = $(this).data('id');
    let newStatus = $(this).val();

    $.ajax({
        url: "{{ route('merchant.clicks.updateStatus') }}",
        type: "POST",
        data: {
            id: clickId,
            status: newStatus,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            if (response.success) {
                alert(response.message);
                $('.clicksTable').DataTable().ajax.reload(); // Refresh DataTable
            } else {
                alert('Error updating status.');
            }
        },
        error: function() {
            alert('Something went wrong!');
        }
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

        @include('agency.myaffiliates.affiliateDetails.topPageAffiliate')


        <!--begin::Card-->
		<div class="card">
        <!--begin::Card body-->
        <!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<h3>Clicks for {{ $user->name }}</h3>
					</div>
					<!--end::Search-->
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">

					<!--end::Toolbar-->
                </div>
            </div>
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 clicksTable" id="kt_datatable_dom_positioning">
                            <thead>
                                <tr class="fw-bold fs-6 text-gray-800 px-7">
                                    <th>Offer ID</th>
                                    <th>Click ID</th>
                                    <th>Platform</th>
                                    <th>Browser</th>
                                    <th>Country</th>
                                    <th>Date</th>
                                    <th>Status</th>
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
