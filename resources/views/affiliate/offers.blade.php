@extends('layouts.app')
@section('headername',  "Offers")
@section('bread1',  'Offers' )
@section('bread2',  'All Offers' )



@section('header')
@endsection




@section('footer')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(function () {

	var dt = $('#datatable_responsive1').DataTable({
		searchDelay: 500,
		processing: true,
		serverSide: true,
		ajax: "{{ route('affiliate.viewoffers') }}",
		columns: [
			{data: 'name', name:'name'},
			{data: 'category', name:'category'},
            {data: 'geos', name:'geos'},
            {data: 'targetting', name:'targetting'},
            {data: 'payout', name:'payout'},
			{data: 'payouttype', name:'payouttype'},
            {data: 'epc', name:'epc'},
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
	<div class="container-xxl" id="kt_content_container1">
	@include('admin.components.alert')
		<!--begin::Card-->
		<div class="card">
			<!--begin::Card header-->
			<div class="card-header border-0 pt-6">
				<!--begin::Card title-->
				<div class="card-title">

				</div>
			</div>
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<div class="card-body py-4">
						<!--begin::Table-->
						<div class="table-responsive">
						<table class="table align-middle table-row-dashed fs-6 gy-5 responsive" id="datatable_responsive1">
							<thead>
								<tr class="fw-semibold fs-6 text-gray-800">
									<th>Name</th>
									<th>Category</th>
									<th>Geos</th>
									<th>Targetting</th>
									<th>Payout</th>
									<th>Payout Type</th>
									<th>EPC</th>
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

@endsection
