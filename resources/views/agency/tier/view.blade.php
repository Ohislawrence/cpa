@extends('layouts.app')
@section('headername',  'Affiliate Tier' )
@section('bread1',  'Tier' )
@section('bread2',  'Affiliate Tier' )


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
		ajax: "{{ route('merchant.tier.get') }}",
		columns: [
			{data: 'DT_RowIndex'},
			{data: 'level'},
			{data: 'commission_rate'},
            {data: 'min_sales'},
			{
				data: 'action',
				name: 'action',
				orderable: true,
				searchable: false,
			},
		],
		
        dom: 'Bfrtip',
        buttons: [
        ]
	}).ajax.reload();

	});
</script>
@include('agency.tier.create')
@endsection






@section('slot')

<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
	@include('admin.components.alert')
		<!--begin::Card-->
	<div class="card">
		@if (settings()->get('allowed_affiliate_tier') == 1 )

		<!--begin::Card header-->
		<div class="card-header border-0 pt-6">
			<!--begin::Card toolbar-->
			<div class="card-toolbar d-flex justify-content-between w-100">
				<!--begin::Add user (Left button)-->
				<div>
					<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtier">
						<i class="ki-duotone ki-plus fs-2"></i>Create Affiliate Tier
					</button>
				</div>
				<!--end::Add user-->
		
				<!--begin::Add offer (Right button)-->
				<div>
					<form action="{{ route('merchant.evaluate.affiliates') }}" method="POST">
						@csrf
						<button type="submit"  class="btn btn-primary">
						<i class="ki-duotone ki-people fs-2"></i>Evaluate Affiliates
						</button>
					</form>
					@if($lastEvaluated)
						<p class="text-muted mt-2">
							Last evaluation: {{ \Carbon\Carbon::parse($lastEvaluated)->diffForHumans() }}
						</p>
					@endif
				</div>
				<!--end::Add offer-->
			</div>
			<!--end::Card toolbar-->
		</div>
		<!--end::Toolbar-->
		
		<!--begin::Card body-->
		<div class="card-body py-4">
			<!--begin::Table-->
			<table class="table align-middle table-row-dashed fs-6 gy-5 yajra-datatable" id="kt_datatable_dom_positioning">
				<thead>
					<tr class="fw-bold fs-6 text-gray-800 px-7">
						<th></th>
						<th>Level</th>
						<th>Commision Rate</th>
						<th>Mininum Sales</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody class="text-gray-600 fw-semibold">

				</tbody>
			</table>
			<!--end::Table-->
		</div>
		<!--end::Card body-->
		@else
		<div class="card-header border-0 pt-6">
		<!--begin::Card title-->
			<div class="card-title">
				<h2 class="fw-bold">You have not allowed the tier affiliate feature, go to configuration and set the option to 'yes'</h2>
			</div>
			<div class="card-body">
				<p>Click here to go to the <a href="{{ route('merchant.configuration') }}">Configuration Page</p>
			</div>
		</div>
		@endif
		</div>
		
	</div>
</div>


@endsection
