@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش ارسال جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">روش های ارسال</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش ارسال جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش روش ارسال</h6>
                </section>
                {{-- button and search inout --}}
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2 border-bottom">
                    <a href="{{ route('admin.market.delivery.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.delivery.update', $delivery->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام روش ارسال</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                           value="{{ old('name', $delivery->name) }}">
                                </div>
                                @error('name')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount">هزینه ارسال</label>
                                    <input type="text" name="amount" id="amount" class="form-control form-control-sm"
                                           value="{{ old('amount', $delivery->amount) }}">
                                </div>
                                @error('amount')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="delivery_time">زمان ارسال</label>
                                    <input type="text" name="delivery_time" id="delivery_time"
                                           class="form-control form-control-sm"
                                           value="{{ old('delivery_time', $delivery->delivery_time) }}">
                                </div>
                                @error('delivery_time')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="delivery_time_unit">واحد زمان ارسال</label>
                                    <input type="text" name="delivery_time_unit" id="delivery_time_unit"
                                           class="form-control form-control-sm" value="{{ old('delivery_time_unit', $delivery->delivery_time_unit) }}">
                                </div>
                                @error('delivery_time_unit')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
