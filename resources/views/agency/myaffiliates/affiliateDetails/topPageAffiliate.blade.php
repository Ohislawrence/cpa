
<!--begin::Content-->

<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->
            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ ucfirst($user->name) }}</a>
                            <a href="#">
                                <i class="ki-duotone ki-verify fs-1 text-primary">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>{{ucfirst($user->getRoleNames()->first())  }}</a>
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                            <i class="ki-duotone ki-geolocation fs-4 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            @isset($user->affiliatedetails->place->name)
                            {{ $user->affiliatedetails->place->name }}
                            @endisset

                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                            <i class="ki-duotone ki-sms fs-4">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>{{ $user->email }}</a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->

                </div>
                <!--end::Title-->
                <!--begin::Stats-->
                <div class="d-flex flex-wrap flex-stack">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold" data-kt-countup="" >{{ $currency->symbol }} {{ number_format($user->clicks->where('status','Paid')->sum('earned') + $user->clicks->where('referral', $user->id)->where('refstatus', 'Paid')->sum('refcommission'),2) }} </div>
                                </div>
                                <!--end::Number-->
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Paid Commissions</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold">{{ $currency->symbol }} {{ number_format($user->clicks->where('status','Approved')->sum('earned') + $user->clicks->where('referral', $user->id)->where('status', ['Approved'])->sum('refcommission'),2) }}</div>
                                </div>
                                <!--end::Number-->
                                
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Unpaid Commissions</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                             <!--begin::Stat-->
                             <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-2 fw-bold">{{ $currency->symbol }} {{ number_format($user->clicks->whereIn('status',['Chargeback','Refunded'])->sum('earned') + $user->clicks->where('referral', $user->id)->where('status', ['Approved'])->sum('refcommission'),2) }}</div>
                                </div>
                                <!--end::Number-->
                                
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Refunds</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                @php
                                    // Get total conversions (successful actions)
                                    $totalConversions =  $user->clicks->sum('conversion'); //'conversion' is a numeric field

                                    // Get total clicks
                                    $totalClicks = $user->clicks->count();

                                    // Calculate Conversion Rate
                                    $conversionRate = $totalClicks > 0 ? ($totalConversions / $totalClicks) * 100 : 0;
                                @endphp 
                                <div class="d-flex align-items-center">
                                    
                                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{ $conversionRate }}" data-kt-countup-suffix="%">0</div>
                                </div>
                                <!--end::Number-->
                                
                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Conversion Rate</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Wrapper-->
                    
                </div>
                <!--end::Stats-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->
        <!--begin::Navs-->
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/overview') ? 'active' : ''}}"
                    href="{{ route('merchant.affiliate.overview', $user->id) }}">Overview</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/clicks/stats') ? 'active' : ''}}" href="{{ route('merchant.affiliate.clickstats', $user->id) }}">Click Stats</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/payouts') ? 'active' : ''}}" href="{{ route('merchant.affiliate.payouts', $user->id) }}">Payouts</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/referrals') ? 'active' : ''}}" href="{{ route('merchant.affiliate.referrals', $user->id) }}">Referrals</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/updateuserdetails') ? 'active' : ''}}" href="{{ route('merchant.affiliate.updateuserdetails', $user->id) }}">Update User info</a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->is('merchant/affiliate/*/trafficsource') ? 'active' : ''}}" href="{{ route('merchant.affiliate.trafficsource', $user->id) }}">Traffic Source</a>
            </li>
        </ul>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->
<!--begin::Referral program-->
<div id="section">
    <!--begin::Body-->


</div>
<!--end::Referred users-->


