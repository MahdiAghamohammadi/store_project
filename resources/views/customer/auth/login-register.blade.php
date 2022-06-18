@extends('customer.layouts.master-simple')
@section('head-tag')
    <title>ورود عضویت</title>
@endsection
@section('content')
    <section class="pb-5 vh-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('auth.customer.login-register') }}" method="post">
            @csrf
            <section class="mb-5 login-wrapper">
                <section class="login-logo">
                    <img src="{{ asset('customer-assets/images/logo/4.png') }}" alt="">
                </section>
                <section class="login-title">ورود / ثبت نام</section>
                <section class="login-info">شماره موبایل یا پست الکترونیک خود را وارد کنید</section>
                <section class="login-input-text">
                    <input type="text" name="identify" value="{{ old('identify') }}">
                    <section class="my-2">
                        @error('identify')
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
                <section class="login-terms-and-conditions"><a href="{{ route('customer.home') }}"
                        class="text-decoration-none">صفحه
                        اصلی</a></section>
            </section>
        </form>
    </section>
@endsection
