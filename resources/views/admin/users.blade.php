@extends('layouts.app')
@section('headername',  'Users' )
@section('bread1',  'Users' )
@section('bread2',  'User' )


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
		ajax: "{{ route('admin.getusers') }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'name', name: 'name'},
			{data: 'tenantName', name: 'tenantName'},
			{data: 'tenantDomain', name: 'tenantDomain'},
			{data: 'email', name: 'email'},
			{data: 'plan', name: 'plan'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		]
	}).ajax.reload();

	});
// Delete function
function hapus(e) {
    var url = '{{ route("admin.deleteUser", ":id") }}';
    url = url.replace(':id', e);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Swal.fire({
        title: "Delete this info",
        text: "Do you really want to delete this Tenant?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete this Tenant!"
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "DELETE",
                success: function (data) {
                    $('.yajra-datatable').DataTable().ajax.reload();
                }
            });
        }
    });
}
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
						<!--begin::Filter-->
						<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
						<i class="ki-duotone ki-filter fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>Filter</button>
						<!--begin::Menu 1-->
						<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
							<!--begin::Header-->
							<div class="px-7 py-5">
								<div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
							</div>
							<!--end::Header-->
							<!--begin::Separator-->
							<div class="separator border-gray-200"></div>
							<!--end::Separator-->
							<!--begin::Content-->
							<div class="px-7 py-5" data-kt-user-table-filter="form">
								<!--begin::Input group-->
								<div class="mb-10">
									<label class="form-label fs-6 fw-semibold">Role:</label>
									<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
										<option></option>
										<option value="Administrator">Administrator</option>
										<option value="Analyst">Analyst</option>
										<option value="Developer">Developer</option>
										<option value="Support">Support</option>
										<option value="Trial">Trial</option>
									</select>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10">
									<label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
									<select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
										<option></option>
										<option value="Enabled">Enabled</option>
									</select>
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="d-flex justify-content-end">
									<button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
									<button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Menu 1-->
						<!--end::Filter-->
						<!--begin::Export-->
						<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
						<i class="ki-duotone ki-exit-up fs-2">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>Export</button>
						<!--end::Export-->
						<!--begin::Add user-->
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
						<i class="ki-duotone ki-plus fs-2"></i>Add User</button>
						<!--end::Add user-->
					</div>
					<!--end::Toolbar-->
					@include('admin.components.addusermodal')
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th></th>
												<th>Name</th>
												<th>Tenant Name</th>
												<th>Tenant Domain</th>
												<th>Email</th>
												<th>Plan</th>
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
									<h2 class="fs-2x fw-bold mb-0">Create New User</h2>
									<!--end::Title-->
									<!--begin::Description-->
									<p class="text-gray-500 fs-4 fw-semibold py-7">Click on the below buttons to
									<br />n create a new user.</p>
									<!--end::Description-->
									<!--begin::Action-->
									<a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">Create User</a>

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

				@include('admin.components.addusermodal')
				<!--end::Content-->
			@endif
        </div>
    </div>
@endsection
