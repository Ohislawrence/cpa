@extends('layouts.app')
@section('headername',  'My Affiliates' )
@section('bread1',  'Affiliates' )
@section('bread2',  'My Affiliates' )


@section('header')

@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.yajra-datatable').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('merchant.getusers') }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'name', name: 'name'},
			{data: 'email', name: 'email'},
            {data: 'tier', name: 'tier'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		],
		
        dom: 'Bfrtip',
        buttons: [
            { extend: 'csv', text: 'Export CSV', className: 'btn btn-primary' },
            { extend: 'excel', text: 'Export Excel', className: 'btn btn-success' },
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
	@if(!empty($users->count()))
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					
				</div>
				<!--begin::Card title-->
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
						
						<!--begin::Add user-->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addafiliate">
						<i class="ki-duotone ki-plus fs-2"></i>Invite an Affiliate</button>
						<!--end::Add user-->
					</div>
					<!--end::Toolbar-->
                    @include('agency.myaffiliates.addaffliate')
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th></th>
												<th>User</th>
												<th>Email</th>
                                                <th>Tier</th>
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
									<h2 class="fs-2x fw-bold mb-0">Invite a New Affiliate</h2>
									<!--end::Title-->
									<!--begin::Description-->
									<p class="text-gray-500 fs-4 fw-semibold py-7">Click on the below buttons to
									<br />n invite a new affiliate.</p>
									<!--end::Description-->
									<!--begin::Action-->
									<a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#addafiliate">Invite an Affiliate</a>

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

				@include('agency.myaffiliates.addaffliate')
				<!--end::Content-->
			@endif
        </div>
    </div>

@endsection
