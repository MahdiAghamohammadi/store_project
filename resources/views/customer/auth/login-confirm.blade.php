@extends('customer.layouts.master-simple')
@section('head-tag')
    <title>تایید عضویت</title>
    <style>
        #resend-otp {
            font-size: 1rem;
        }
    </style>
@endsection
@section('content')
    <section class="pb-5 vh-100 d-flex justify-content-center align-items-center">
        <form action="{{ route('auth.customer.login-confirm', $token) }}" method="post">
            @csrf
            <section class="mb-5 login-wrapper">
                <section class="login-logo">
                    <img src="{{ asset('customer-assets/images/logo/4.png') }}" alt="">
                </section>
                <section class="mb-2 login-title">
                    <a href="{{ route('auth.customer.login-register-form') }}">
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
                    <button class="btn btn-danger">تایید</button>
                </section>
                <section id="resend-otp" class="d-none">
                    <a href="{{ route('auth.customer.login-resend-otp', $token) }}"
                        class="text-decoration-none text-primary">ارسال مجدد کد تایید</a>
                </section>
                <section id="timer"></section>
            </section>
        </form>
    </section>
@endsection
@section('script')
    @php
    $timer = ((new \Carbon\Carbon($otp->created_at))->addMinute(5)->timestamp - \Carbon\Carbon::now()->timestamp) * 1000;
    @endphp
    <script>
        let countDownDate = new Date().getTime() + {{ $timer }};
        let timer = $('#timer');
        let resendOtp = $('#resend-otp');

        let x = setInterval(function() {
            let now = new Date().getTime();
            let distance = countDownDate - now;
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (minutes == 0) {
                timer.html(`ارسال مجدد کد تایید تا ${seconds} ثانیه دیگر `);
            } else {
                timer.html(`ارسال مجدد کد تایید تا ${minutes} دقیقه و ${seconds} ثانیه دیگر`);
            }
            if (distance < 0) {
                clearInterval(x);
                timer.addClass('d-none');
                resendOtp.removeClass('d-none');
            }
        }, 1000);
    </script>
@endsection
