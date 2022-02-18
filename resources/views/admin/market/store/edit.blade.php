@extends('admin.layouts.master')
@section('head-tag')
    <title>اصلاح موجودی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">انبار</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> اصلاح موجودی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>اصلاح موجودی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.store.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.store.update', $product->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="marketable_number">تعداد قابل فروش</label>
                                    <input type="text" name="marketable_number" id="marketable_number"
                                        class="form-control form-control-sm"
                                        value="{{ old('marketable_number', $product->marketable_number) }}">
                                </div>
                                @error('marketable_number')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="sold_number">تعداد فروخته شده</label>
                                    <input type="text" name="sold_number" id="sold_number"
                                        class="form-control form-control-sm"
                                        value="{{ old('sold_number', $product->sold_number) }}">
                                </div>
                                @error('sold_number')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="frozen_number">تعداد رزرو شده</label>
                                    <input type="text" name="frozen_number" id="frozen_number"
                                        class="form-control form-control-sm"
                                        value="{{ old('frozen_number', $product->frozen_number) }}">
                                </div>
                                @error('frozen_number')
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
