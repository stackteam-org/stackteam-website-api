
<x-guest-layout title="sign-in">
    <x-slot name="header">
        <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Not a Member yet?</span>
        <a href="{{ route('register') }}" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign Up</a>
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}" class="form w-100">
        @csrf
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Sign In</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Get unlimited access & earn money</div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <!-- Email Address -->
                <x-text-input id="email" placeholder="Email" class="form-control form-control-solid" type="email" name="email" autocomplete="off" data-kt-translate="sign-in-input-email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-7">
                <!--begin::Password-->

                <x-text-input id="password" class="block mt-1 w-full"
                              autocomplete="off" data-kt-translate="sign-in-input-password" class="form-control form-control-solid"
                              placeholder="Password"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                <div></div>
                <!--begin::Link-->
                <a href="../../demo2/dist/authentication/layouts/fancy/reset-password.html" class="link-primary" data-kt-translate="sign-in-forgot-password">Forgot Password ?</a>
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Submit-->
                <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
                    <!--begin::Indicator label-->
                    <span class="indicator-label" data-kt-translate="sign-in-submit">Sign In</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
												<span data-kt-translate="general-progress">Please wait...</span>
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
											</span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Submit-->
                <!--begin::Social-->
                <div class="d-flex align-items-center">
                    <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">Or</div>
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="assets/media/svg/brand-logos/facebook-3.svg" class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
                        <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="theme-light-show p-4" />
                        <img alt="Logo" src="assets/media/svg/brand-logos/apple-black-dark.svg" class="theme-dark-show p-4" />
                    </a>
                    <!--end::Symbol-->
                </div>
                <!--end::Social-->
            </div>
            <!--end::Actions-->
        </div>
        <!--begin::Body-->
    </form>
</x-guest-layout>
