@extends('layouts.app')
@section('headername',  'Choose a plan ' )
@section('bread1',  'Plans' )
@section('bread2',  'Pricing ')


@section('header')

@endsection




@section('footer')

@endsection





@section('slot')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->

    <div class="container-xxl" id="kt_content_container">
        <div class="card" id="kt_pricing">
            <!--begin::Card body-->
            <div class="card-body p-lg-17">
                @include('admin.components.alert')
                <!--begin::Plans-->
                <div class="d-flex flex-column">
        
                @if (!$owner->onTrial() && $owner->subscribed('pro'))
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <h1 class="fs-2hx fw-bold mb-5">Your subscription is active!</h1>
                    <div class="text-gray-600 fw-semibold fs-5">
                        You are on an active subscription.
                    </div>
                </div>
                    <!--end::Heading-->
                @elseif ($owner->onGenericTrial())
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <h1 class="fs-2hx fw-bold mb-5">You are on the trial period.</h1>
                            <div class="text-gray-600 fw-semibold fs-5">
                                You are currently trial period and it ends on {{ $owner->trialEndsAt() }}, remember to subscribe and continue enjoying this service.
                            </div>
                        </div>
                        <!--end::Heading-->
                @elseif ( !$owner->onTrial() )
                <!--begin::Heading-->
                <div class="mb-13 text-center">
                    <h1 class="fs-2hx fw-bold mb-5">You do not have an active subscription</h1>
                    <div class="text-gray-600 fw-semibold fs-5">
                        Choose a plan to continue.
                    </div>
                </div>
                @endif
                   
                </div>
                <!--end::Plans-->

                <!--begin::Row-->
                <div class="row g-10">
                    <!--begin::Col-->
                    @foreach ($plans as $plan)
                    <div class="col-xl-4">
                        <div class="d-flex h-100 align-items-center">
                            <!--begin::Option-->
                            <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
                                <!--begin::Heading-->
                                <div class="mb-7 text-center">
                                    <!--begin::Title-->
                                    <h1 class="text-gray-900 mb-5 fw-bolder">{{ ucfirst($plan->name) }}</h1>
                                    <!--end::Title-->
                                    <!--begin::Description-->
                                    <div class="text-gray-600 fw-semibold mb-5">{{ ucfirst($plan->about) }}
                                    <br /></div>
                                    <!--end::Description-->
                                    <!--begin::Price-->
                                    
                                    <div class="text-center">
                                        <span class="mb-2 text-primary">$</span>
                                        <span class="fs-3x fw-bold text-primary" data-kt-plan-price-month="{{ $plan->cost }}" data-kt-plan-price-annual="">{{ $plan->cost }}</span>
                                        <span class="fs-7 fw-semibold opacity-50">/ 
                                        <span data-kt-element="period">Month</span></span>
                                    </div>
                                    <!--end::Price-->
                                </div>
                                <!--end::Heading-->
                                <!--begin::Features-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-5">
                                            <span class="fw-semibold fs-6 text-gray-800 flex-grow-1 pe-3"><a href="https://tracklia.com/pricing" target="_blank">See plan features</a></span>
                                        </div>
                                
                                
                                @if($plan->id == 1)
                                        @if ($owner->subscribed('pro') || $owner->subscribed('leader') || $owner->subscribed('network'))
                                            <a class="btn btn-sm btn-primary">Active</a>
                                        @else
                                            <a class="btn btn-sm btn-primary" href="https://{{ config('tenancy.central_domains')[1] }}/subscribe?user={{ auth()->user()->email }}&redirect={{ urlencode(url()->full()) }}&plan={{ $plan->id }}">Subscribe</a>
                                        @endif
                                    
                                @else
                                <button class="btn btn-sm btn-primary" type="">Coming Soon</button>
                                @endif
                                
                            </div>
                            <!--end::Option-->
                        </div>
                    </div>
                    <!--end::Col-->
                    @endforeach
                </div>
                <!--end::Row-->
                
            </div>
            <!--end::Card body-->
            
        </div>
       

    </div>
</div>
@endsection
