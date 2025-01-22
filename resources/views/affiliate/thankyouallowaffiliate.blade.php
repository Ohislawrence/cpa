@extends('layouts.auth.layouts')
@section('headername',  'Register')


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
                    <h4>Thank you for applying, {{ auth()->user()->name }}!
                    </h4>
                    <p class="mb-6">We are excited to have you on board!
                       Your account is currently under review. We will notify you as soon as its's approved.
                    </p>

                    <form action="{{ route('logout.post') }}" method="post">
                    @csrf
                    <a href="{{ route('login.test') }}" class="link-primary ">Sign Out</a></div>
                    </form>
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
