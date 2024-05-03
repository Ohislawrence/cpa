@extends('layouts.app')
@section('headername',   $offer->name. ' - ' .$offer->offerid )
@section('bread1',  'Offer' )
@section('bread2',  'Clicks' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('.clicks-table').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('admin.offerclickstable', ['id' => $offer->id]) }}",
		columns: [
            {data: 'date'},
            {data: 'country_id'},
			{data: 'platform'},
			{data: 'referrerurl'},
            {data: 'earned'},
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


@endsection







@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
	@include('admin.components.alert')

		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->

				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">

                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
                                    <div class="table-responsive">
									<table class="table align-middle table-row-dashed fs-6 gy-5 responsive clicks-table" id="kt_datatable_responsive">
										<thead>
											<tr class="fw-semibold fs-6 text-gray-700">
                                                <th>Date</th>
                                                <th>Country</th>
												<th>Platform</th>
												<th>Referral URL</th>
                                                <th>Commision</th>
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


        </div>
    </div>
@endsection
