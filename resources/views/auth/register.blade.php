<x-guest-layout>
    <x-slot name="header">
        <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Already a member ?</span>
        <a href="{{ route('login') }}" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign In</a>
    </x-slot>
    <form method="POST" action="{{ route('register') }}" class="form w-100" novalidate="novalidate" id="kt_sign_up_form" >
            @csrf
        <!--begin::Heading-->
        <div class="text-start mb-10">
            <!--begin::Title-->
            <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-up-title">Create an Account</h1>
            <!--end::Title-->
            <!--begin::Text-->
            <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Get unlimited access & earn money</div>
            <!--end::Link-->
        </div>
        <!--end::Heading-->
        <!--begin::Input group-->

        <div class="fv-row mb-7">
                <x-text-input class="form-control form-control-lg form-control-solid" placeholder="Name" id="name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <x-text-input class="form-control form-control-lg form-control-solid" placeholder="Email" id="email"  type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <x-text-input id="password" class="block mt-1 w-full"
                                  class="form-control form-control-lg form-control-solid"
                                  type="password"
                                  placeholder="Password"
                                  name="password"
                                  autocomplete="off"
                                  required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="ki-duotone ki-eye-slash fs-2"></i>
												<i class="ki-duotone ki-eye fs-2 d-none"></i>
											</span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          class="form-control form-control-lg form-control-solid"
                          type="password"
                          placeholder="Confirm Password"
                          name="password_confirmation" required autocomplete="off" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <!--end::Input group-->
        <!--begin::Actions-->
        <div class="d-flex flex-stack">
            <!--begin::Submit-->
            <x-primary-button class="ms-4" class="btn btn-primary" data-kt-translate="sign-up-submit">
                <!--begin::Indicator label-->
                <span class="indicator-label">{{ __('Submit') }} </span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </x-primary-button>
            <!--end::Submit-->
            <!--begin::Social-->
            <div class="d-flex align-items-center">
                <div class="text-gray-400 fw-semibold fs-6 me-6">Or</div>
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
    </form>
</x-guest-layout>
