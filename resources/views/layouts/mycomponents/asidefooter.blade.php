<!--begin::Footer-->
<div class="aside-footer flex-column-auto px-9" id="kt_aside_footer">
    <!--begin::User panel-->
    <div class="d-flex flex-stack">
        <!--begin::Wrapper-->
        <div class="d-flex align-items-center">
            <!--begin::Avatar-->
            <div class="symbol symbol-circle symbol-40px">
                <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="">
            </div>
            <!--end::Avatar-->
            <!--begin::User info-->
            <div class="ms-2">
                <!--begin::Name-->
                <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-1">{{ auth()->user()->name }}</a>
                <!--end::Name-->
                <!--begin::Major-->
                <span class="text-muted fw-semibold d-block fs-7 lh-1">{{ ucfirst(auth()->user()->getRoleNames()->first()) }} (  )</span>
                
                <!--end::Major-->
            </div>
            <!--end::User info-->
        </div>
        <!--end::Wrapper-->
        <!--begin::User menu-->
        <div class="ms-1">
            <div class="btn btn-sm btn-icon btn-active-color-primary position-relative me-n2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-overflow="true" data-kt-menu-placement="top-end">
                <i class="ki-duotone ki-setting-2 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
            <!--begin::User account menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-50px me-5">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" class="">
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Username-->
                        <div class="d-flex flex-column">
                            <div class="fw-bold d-flex align-items-center fs-5">{{ auth()->user()->name }}
                            </div>
                            <div class="fw-semibold text-muted fs-7">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</div>
                        </div>
                        <!--end::Username-->
                    </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    @role('admin')
                    <a href="{{ route('admin.profile') }}" class="menu-link px-5">My Profile</a>
                    @endrole
                    @role('affiliate')
                    <a href="{{ route('affiliate.myprofile') }}" class="menu-link px-5">My Profile</a>
                    @endrole
                    @role('agency')
                    <a href="{{ route('agency.profile') }}" class="menu-link px-5">My Profile</a>
                    @endrole
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    @role('affiliate')
                    <a href="{{ route('affiliate.referral') }}" class="menu-link px-5">
                        <span class="menu-text">Referral</span>
                    </a>
                    @endrole
                    @role('admin')
                    <a href="{{ route('admin.refferals') }}" class="menu-link px-5">
                        <span class="menu-text">Referral</span>
                    </a>
                    @endrole
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-5">
                    @role('affiliate')
                    <a href="{{ route('affiliate.payments') }}" class="menu-link px-5">Payments</a>
                    @endrole

                    @role('merchart')
                    <a href="{{ route('merchant.configuration') }}" class="menu-link px-5">Configuration</a>
                    @endrole
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->

                <!--begin::Menu item-->
                <form method="POST" action="{{ route('logout.post') }}">
                    @csrf
                <div class="menu-item px-5">
                    <a href="" onclick="event.preventDefault(); this.closest('form').submit();" class="menu-link px-5">Sign Out</a>
                </div>
                <!--end::Menu item-->
                </form>
            </div>
            <!--end::User account menu-->
        </div>
        <!--end::User menu-->
    </div>
    <!--end::User panel-->
</div>
<!--end::Footer-->
