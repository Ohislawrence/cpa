@extends('layouts.auth.layouts')
@section('headername',  'Welcome, you were invited')


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
                    @if (settings()->has('logo'))
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
                
                <h2 class="text-white fw-normal m-0">Welcome to Tracklia, All the details are on the other side.</h2>
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
                        <form class="form w-100" method="POST" id="kt_sign_in_form"  action="{{ route('affiliateregPost') }}">
                            @csrf
                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">Sign Up</h1>
                                <!--end::Title-->
                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">Password and other details to continue.</div>
                                <!--end::Subtitle=-->
                                @include('admin.components.alert')
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Full Name" name="name" value="{{ $name }}" required autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                                
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="email" placeholder="Email" name="email" value="{{ $email }}" required autocomplete="off" class="form-control bg-transparent" readonly/>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <select class="form-control bg-transparent" name="country">
                                    <option value="" disabled selected>Country</option>
                                    @foreach ( $countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                    
                                </select>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->

                            <!--begin::Input group=-->
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="Region" name="region" :value="old('region')" required autocomplete="off" class="form-control bg-transparent"/>
                                <!--end::Email-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Accept-->
                                    <div class="fv-row mb-8">
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="toc" value="1" />
                                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">I Accept the 
                                            <a href="#" class="ms-1 link-primary">Terms</a></span>
                                        </label>
                                    </div>
                                    <!--end::Accept-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Sign Up Now</span>
                                    <span class="indicator-progress">Please wait... 
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Submit button-->
                            <!--begin::Sign up-->
                            <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account? 
                            <a href="{{ route('login.test') }}" class="link-primary">Sign In</a></div>
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
