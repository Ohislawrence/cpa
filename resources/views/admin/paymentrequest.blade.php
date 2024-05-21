@extends('layouts.app')
@section('headername',  'Payment Request' )
@section('bread1',  'Payments' )
@section('bread2',  'Send Payments' )


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
        
        @include('admin.viewuser')

    </div>
</div>
@endsection