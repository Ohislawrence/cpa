@extends('layouts.app')
@section('headername',  'Offers' )
@section('bread1',  'Agency' )
@section('bread2',  'Offers' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('#kt_datatable_responsive').DataTable({
		processing: true,
		serverSide: true,
        responsive: true,
        stateSave: true,
		ajax: "{{ route('admin.viewtable') }}",
		columns: [
            {data: 'offerid'},
            {data: 'owner'},
			{data: 'name'},
			{data: 'category'},
            {data: 'geos'},
            {data: 'targetting'},
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


@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
	@include('admin.components.alert')
	@if(!empty($offers->count()))
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
						<a href="{{ route('admin.offers.create') }}" class="btn btn-primary">
						<i class="ki-duotone ki-plus fs-2"></i>Add Offer</a>
						<!--end::Add offer-->
					</div>
					<!--end::Toolbar-->
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
                                    <div class="table-responsive">
									<table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="kt_datatable_responsive">
										<thead>
											<tr class="fw-semibold fs-6 text-gray-700">
                                                <th>Offer ID</th>
                                                <th>Owner</th>
												<th>Name</th>
												<th>Category</th>
                                                <th>Geos</th>
                                                <th>Targetting</th>
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
							<h2 class="fs-2x fw-bold mb-0">Create Offer</h2>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="text-gray-500 fs-4 fw-semibold py-7">Click on the below buttons to
							<br /> create a new offer.</p>
							<!--end::Description-->
							<!--begin::Action-->
							<a href="{{ route('admin.offers.create') }}" class="btn btn-primary er fs-6 px-8 py-4">Create Offer</a>
							
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
