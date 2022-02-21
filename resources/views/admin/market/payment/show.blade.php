@extends('admin.layouts.master')
@section('head-tag')
    <title>نمایش پرداخت</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> پرداخت ها</li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش پرداخت</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نمایش پرداخت</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.payment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section class="mb-3 card">
                    <section class="text-white card-header bg-custom-orange">
                        {{ $payment->user->fullName }} - {{ $payment->user->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title"> مقدار: {{ $payment->paymentable->amount }} </h5>
                        <p class="card-text"> درگاه پرداخت: {{ $payment->paymentable->gateway ?? '-' }}</p>
                        <p class="card-text"> شماره پرداخت: {{ $payment->paymentable->transaction_id }}</p>
                        <p class="card-text">تاریخ پرداخت: {{ jalaliDate($payment->paymentable->pay_date) ?? '-' }}
                        </p>
                    </section>
                </section>
            </section>
        </section>
    </section>
@endsection
