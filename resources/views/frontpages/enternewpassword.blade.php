@extends('layouts.auth.layouts')
@section('headername',  'Enter New Password')


@section('header')

@endsection




@section('footer')
<script>
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const message = document.getElementById('message');
    const form = document.getElementById('passwordForm');

    confirmPassword.addEventListener('input', () => {
        if (confirmPassword.value === password.value) {
            message.textContent = 'Passwords match!';
            message.className = 'success';
        } else {
            message.textContent = 'Passwords do not match!';
            message.className = 'error';
        }
    });

    form.addEventListener('submit', (e) => {
        if (confirmPassword.value !== password.value) {
            e.preventDefault();
            alert('Passwords do not match. Please fix before submitting.');
        }
    });
</script>
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
                <a href="#" class="mb-7">
                    <h1 class="text-white s-52 w-1000">{{ ucfirst(tenant()->id) }}</h1>
                </a>
                <!--end::Logo-->
                <!--begin::Title-->
                <h2 class="text-white fw-normal m-0">Welcome to {{ ucfirst(tenant()->id) }}, All the details are on the other side.</h2>
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
                    <form class="form w-100" method="POST" id="kt_sign_in_form"  action="{{ route('final.password.reset') }}">
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-gray-900 fw-bolder mb-3">New Password</h1>
                            <!--end::Title-->
                            <!--begin::Subtitle-->
                            <div class="text-gray-500 fw-semibold fs-6">Enter Your New Password.</div>
                            <!--end::Subtitle=-->
                            @include('admin.components.alert')
                        </div>
                        <!--begin::Heading-->
                            <input type="hidden" value="{{ $codes }}" name="codeme">
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" id="password" name="password" required autocomplete="current-password" class="form-control bg-transparent" />
                            <!--end::Password-->
                        </div>
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required autocomplete="current-password" class="form-control bg-transparent" />
                            <!--end::Password-->
                            <span id="message"></span>
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        
                        <!--end::Wrapper-->
                        <!--begin::Actions-->
								<div class="d-flex flex-wrap justify-content-center pb-lg-0">
									<button type="submit" class="btn btn-primary me-4">
										<!--begin::Indicator label-->
										<span class="indicator-label">Submit</span>
										<!--end::Indicator label-->
									</button>
									<a href="{{ route('login.test') }}" class="btn btn-light">Cancel</a>
								</div>
								<!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Footer-->
                <div class="d-flex flex-stack px-lg-10">
                    <!--begin::Links-->
                    <div class="d-flex fw-semibold text-primary fs-base gap-5">
                        <a href="" target="_blank">Terms</a>
                        <a href="" target="_blank">Plans</a>
                        <a href="" target="_blank">Contact Us</a>
                    </div>
                    <!--end::Links-->
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
