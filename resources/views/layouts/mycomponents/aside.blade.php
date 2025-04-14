<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid ps-5 pe-3 mb-9" id="kt_aside_menu">
    
   
    @role('affiliate')
    <!--begin::Aside Menu-->
    <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto" id="#kt_aside_menu" data-kt-menu="true">


            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.dashboard') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            
            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.reports', [ 'campaign_id'=>'all', 'start_date'=> \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') , 'end_date'=>\Carbon\Carbon::today()->format('Y-m-d') ]) }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Reports</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.offer') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Offers</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->
            @if(tenancy()->tenant->owner())
            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.ailink') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">SmartLink</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->
            @endif

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.payments') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Payment History</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('affiliate.referral') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Refer An Affiliate</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->




        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
    @endrole


    @role('merchant')
    <!--begin::Aside Menu-->
    <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto" id="#kt_aside_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.dashboard') }}">
                    <span class="menu-link {{ request()->routeIs('merchant.dashboard') ? 'active fw-bold' : '' }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-black-right fs-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </span>
                </a>
            </div>
            <!--end:Menu item-->

            @if(tenancy()->tenant->owner())
                <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.all.smartlink') }}">
                <span class="menu-link {{ request()->routeIs('merchant.all.smartlink') ? 'active fw-bold' : '' }}">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Smartlinks</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->
            @endif

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.campaigns') }}">
                <span class="menu-link {{ request()->routeIs('merchant.campaigns') ? 'active fw-bold' : '' }}">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Campaigns</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.affiliates') }}">
                <span class="menu-link @active('merchant.affiliates')">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">My Affiliates</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.tier.index') }}">
                <span class="menu-link @active('merchant.tier.index')">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Affiliate Tier</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.reports', ['start_date'=> \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') , 'end_date'=>\Carbon\Carbon::today()->format('Y-m-d') , 'campaign_id'=>'all']) }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Reports</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link @active(['merchant.payout.all','merchant.payout.unpaidcommissions','merchant.payout.option','merchant.payout.batch'])">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Payouts</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link @active('merchant.payout.all')" href="{{ route('merchant.payout.all') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">View Payouts</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link @active('merchant.payout.unpaidcommissions')" href="{{ route('merchant.payout.unpaidcommissions') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Unpaid Commisions</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link @active('merchant.payout.batch')" href="{{ route('merchant.payout.batch') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Batch Payments</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link @active('merchant.payout.option')" href="{{ route('merchant.payout.option') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Payout Options</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Emails</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('merchant.email.showSentMessages') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sent Emails</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('merchant.email.send') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Send Email</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('merchant.email.systememail') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">System Emails</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.plan.active') }}">
                <span class="menu-link @active('merchant.plan.active')">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">My Plan</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('merchant.configuration') }}">
                <span class="menu-link @active('merchant.configuration')">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Configuration</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
    @endrole



    @role('admin')
    <!--begin::Aside Menu-->
    <div class="w-100 hover-scroll-overlay-y d-flex pe-3" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="100">
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold my-auto" id="#kt_aside_menu" data-kt-menu="true">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Dashboards</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.dashboard') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Main</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.stats') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Statistics</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Users</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.viewusers') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Users</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.refferals') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Refferals</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.alltenants') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Tenants</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.info.index') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Information</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.emails') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Send Emails</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.blogs.index') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Blogs</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.show.supports') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Support Area</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Offers</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.offers.index') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Offers</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.ailink') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Ai Links</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <a class="" href="{{ route('admin.settings') }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Settings</span>
                </span>
                </a>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Payments</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.transaction') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Transations</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{ route('admin.sendpayments') }}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Send Payments</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Promotional Tools</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="index.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Banners</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="ki-duotone ki-black-right fs-2"></i>
                    </span>
                    <span class="menu-title">Supports</span>
                    <span class="menu-arrow"></span>
                </span>
                <!--end:Menu link-->
                <!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="index.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Tickets</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="dashboards/ecommerce.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Contact Us</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="dashboards/ecommerce.html">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Documentation</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
            </div>
            <!--end:Menu item-->

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
    @endrole
</div>
<!--end::Aside menu-->
@include('layouts.mycomponents.asidefooter')
</div>
<!--end::Aside-->
