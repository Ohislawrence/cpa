@extends('layouts.auth.layouts')
@section('headername',  'Login')


@section('header')

@endsection




@section('footer')

@endsection





@section('slot')

<div class="d-flex flex-column flex-root">
    <!--begin::Page bg image-->
    <style>body { background-image: url('{{ url("assets/media/auth/bg4.jpg") }}'); } [data-bs-theme="dark"] body { background-image: url('{{ url("assets/media/auth/bg4-dark.jpg") }}'); }</style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!--begin::Aside-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <!--begin::Aside-->
            <div class="d-flex flex-center flex-lg-start flex-column">
                <!--begin::Logo-->
                @if(isset(tenant()->id))
                    @if (settings()->get('logo') != null)
                    <img alt="Logo" src="http://{{ tenant()->id }}.{{ Storage::disk('tenant')->url(settings()->get('logo')) }}" class="h-80px logo theme-light-show mb-7" />
                    @else
                    <h1 class="text-white s-52 w-1000 mb-7">{{ (settings()->get('site_name')) ? settings()->get('site_name') : ucfirst(tenant()->id) }}</h1>
                    @endif
                    
                    
                <!--end::Logo-->
                <!--begin::Title-->
                
                <h2 class="text-white fw-normal m-0">Welcome to {{ (settings()->get('site_name')) ? settings()->get('site_name') : ucfirst(tenant()->id) }}, All details are on the other side.</h2>
                @else
                <a href="#" class="mb-7">
                    <h1 class="text-white s-52 w-1000">Tracklia</h1>
                </a>
                <!--end::Logo-->
                <!--begin::Title-->
                
                <h2 class="text-white fw-normal m-0">Welcome to Tracklia, All details are on the other side.</h2>
                @endif

                <!--end::Title-->
            </div>
            <!--begin::Aside-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
            <!--begin::Card-->
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                <!--begin::Wrapper-->
                <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
                    <!--begin::Form-->
                    <form class="form w-100" method="POST" id="kt_sign_in_form"  action="{{ route('login.check.post') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter your email and password to continue.</div>
                            <!--end::Subtitle=-->
                            @include('admin.components.alert')
                        </div>
                        <!--begin::Heading-->
                            
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="email" placeholder="Email" name="email" :value="old('email')" required autocomplete="off" class="form-control bg-transparent" />
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <a href="{{ route('password.reset') }}" class="link-primary">Forgot Password ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Sign In</span>
                                <span class="indicator-progress">Please wait... 
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet? 
                        <a href="{{ route('affiliatereg') }}" class="link-primary">Sign up</a></div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Footer-->
                <div class="d-flex flex-stack px-lg-10">
                    
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
@endsection
