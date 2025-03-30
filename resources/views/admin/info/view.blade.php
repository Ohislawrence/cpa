@extends('layouts.app')
@section('headername',  'View Information' )
@section('bread1',  'Information' )
@section('bread2',  'View Information' )



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
        ajax: "{{ route('admin.info.index') }}", // Fetch all records
        columns: [
            {data: 'info_type', name: 'info_type'},
            {data: 'information', name: 'information'},
            {data: 'updatedAT', name: 'updatedAT'},
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
            },
        ]
    });
});

// Delete function
function hapus(e) {
    var url = '{{ route("admin.info.destroy", ":id") }}';
    url = url.replace(':id', e);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    Swal.fire({
        title: "Delete this info",
        text: "Do you really want to delete this information?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete this information!"
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
						<a href="{{ route('admin.info.create') }}" class="btn btn-primary" >
						<i class="ki-duotone ki-plus fs-2"></i>Add Info</a>
						<!--end::Add user-->
					</div>
				</div>
			</div>
                    <!--begin::Card body-->
								<div class="card-body py-4">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
										<thead>
											<tr class="fw-bold fs-6 text-gray-800 px-7">
												<th>Info Title</th>
												<th>Information</th>
                                                <th>Updated on</th>
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
			
        </div>
    </div>
@endsection
