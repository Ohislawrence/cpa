@extends('layouts.app')
@section('headername',  'Settings' )
@section('bread1',  'DealsIntel' )
@section('bread2',  'Site Settings' )


@section('header')

@endsection




@section('footer')

@endsection






@section('slot')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
        @include('admin.components.alert')
        



    </div>
</div>
@endsection