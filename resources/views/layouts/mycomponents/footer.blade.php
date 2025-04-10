<!--begin::Footer-->
<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
    <!--begin::Container-->
    <div class="container d-flex flex-column flex-md-row flex-stack">
        <!--begin::Copyright-->
        <div class="text-gray-900 order-2 order-md-1">
            <a href="{{ route('dashboard') }}" target="_blank" class="text-muted text-hover-primary fw-semibold me-2 fs-6">
                @if (isset(tenant()->id))
                {{ (settings()->get('site_name')) ? settings()->get('site_name') : ucfirst(tenant()->id) }}
                @else
                {{ env('APP_NAME') }}
                @endif
            </a>
        </div>
        <!--end::Copyright-->
        <!--begin::Menu-->
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">About</a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link px-2">Support</a>
            </li>
        </ul>
        <!--end::Menu-->
    </div>
    <!--end::Container-->
</div>
<!--end::Footer-->
