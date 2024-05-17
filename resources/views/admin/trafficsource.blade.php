@extends('layouts.app')
@section('headername',  'Traffic Source' )
@section('bread1',  'User' )
@section('bread2',  'Traffic Source' )


@section('header')
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.yajra-datatable').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('admin.gettrafficsource', ['id' => $user->id]) }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'source', name: 'source'},
			{data: 'address', name: 'address'},
			{data: 'followers', name: 'followers'},
            {data: 'monthlyvisit', name: 'monthlyvisit'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		]
	}).ajax.reload();

	});
</script>

@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
        @include('admin.components.alert')
        
        @include('admin.viewuser')
        @if(!empty($user->trafficsource->count()))
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
						
						<!--end::Menu 1-->
						<!--end::Filter-->
						<!--begin::Export-->
						<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_add_trafficsource">
						<i class="ki-duotone ki-exit-up fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>Export</button>
						<!--end::Export-->
						<!--begin::Add user-->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_trafficsource">
						<i class="ki-duotone ki-plus fs-2"></i>Add Traffic Source</button>
						<!--end::Add user-->
					</div>
                    @include('admin.components.addtrafficsource')
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th></th>
												<th>Source</th>
												<th>Address/Username</th>
												<th>Followers</th>
                                                <th>Monthly Visits</th>
												<th>Actions</th>
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
			@else
						<!--begin::Card-->
						<div class="card">
							<!--begin::Card body-->
							<div class="card-body">
								<!--begin::Heading-->
								<div class="card-px text-center pt-15 pb-15">
									<!--begin::Title-->
									<h2 class="fs-2x fw-bold mb-0">Add Traffic Source For this Affiliate</h2>
									<!--end::Title-->
									<!--begin::Description-->
									<p class="text-gray-500 fs-4 fw-semibold py-7">Click on the below buttons to
									<br /> create a new traffic source for this affiliate.</p>
									<!--end::Description-->
									<!--begin::Action-->
									<a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_add_trafficsource">Add Traffic Source</a>
									<!--end::Action-->
								</div>
								<!--end::Heading-->
								<!--begin::Illustration-->
								<div class="text-center pb-15 px-5">
									<img src="{{ asset('assets/media/illustrations/dozzy-1/6.png') }}" alt="" class="mw-100 h-200px h-sm-325px" />
								</div>
								<!--end::Illustration-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->

                    @include('admin.components.addtrafficsource')
				<!--end::Content-->
			@endif

        
    </div>
</div>
@endsection