@extends('layouts.app')
@section('headername',  'Sent Emails' )
@section('bread1',  'Emails' )
@section('bread2',  'Sent Emails' )


@section('header')

@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(function () {

	var table = $('.yajra-datatable').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('merchant.email.getsentMessages') }}",
		columns: [
			{data: 'DT_RowIndex', name: 'DT_RowIndex'},
			{data: 'title', name: 'title'},
			{data: 'sentAt', name: 'sentAt'},
            {data: 'sentAt', name: 'sentAt'},
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

	
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">
					
				</div>
            </div>
					
            <!--begin::Card body-->
                        <div class="card-body py-4">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
                                <thead>
                                    <tr class="fw-bold fs-6 text-gray-800 px-7">
                                        <th></th>
                                        <th>Title</th>
                                        <th>Recipients Count</th>
                                        <th>Sent At</th>
                                        <th>View Message</th>
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
