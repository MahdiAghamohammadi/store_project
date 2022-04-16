@extends('customer.layouts.master-simple')
@section('head-tag')
    <title>تایید عضویت</title>
@endsection
@section('content')
    <section class="pb-5 vh-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('auth.customer-login-confirm', $token) }}" method="post">
            @csrf
            <section class="mb-5 login-wrapper">
                <section class="login-logo">
                    <img src="{{ asset('customer-assets/images/logo/4.png') }}" alt="">
                </section>
                <section class="mb-2 login-title">
                    <a href="{{ route('auth.customer-login-register-form') }}">
                        <i class="fa fa-arrow-right"></i>
                    </a>
                </section>
                <section class="login-title">کد تایید را وارد نمایید</section>
                @if ($otp->type == 0)
                    <section class="login-info">
                        کد تایید برای شماره موبایل {{ $otp->login_identify }} ارسال گردید
                    </section>
                @else
                    <section class="login-info">
                        کد تایید برای ایمیل {{ $otp->login_identify }} ارسال گردید
                    </section>
                @endif
                <section class="login-input-text">
                    <input type="text" name="otp" value="{{ old('otp') }}">
                    <section class="my-2">
                        @error('otp')
                            <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                <span>
                                    {{ $message }}
                                </span>
                            </span>
                        @enderror
                    </section>
                </section>
                <section class="login-btn d-grid g-2">
                    <button class="btn btn-danger">ورود به آمازون</button>
                </section>
                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
                </section>
            </section>
        </form>
    </section>
@endsection
