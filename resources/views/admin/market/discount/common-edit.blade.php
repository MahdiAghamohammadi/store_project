@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش تخفیف عمومی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تخفیف عمومی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تخفیف عمومی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش تخفیف عمومی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.commonDiscount') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.discount.commonDiscount.update', $commonDiscount->id) }}"
                        method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="percentage">درصد تخفیف</label>
                                    <input type="text" name="percentage" id="percentage"
                                        class="form-control form-control-sm"
                                        value="{{ old('percentage', $commonDiscount->percentage) }}">
                                </div>
                                @error('percentage')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="discount_ceiling">حداکثر تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="discount_ceiling"
                                        id="discount_ceiling"
                                        value="{{ old('discount_ceiling', $commonDiscount->discount_ceiling) }}">
                                </div>
                                @error('discount_ceiling')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="minimal_order_amount">حداقل مبلغ خرید</label>
                                    <input type="text" class="form-control form-control-sm" name="minimal_order_amount"
                                        id="minimal_order_amount"
                                        value="{{ old('minimal_order_amount', $commonDiscount->minimal_order_amount) }}">
                                </div>
                                @error('minimal_order_amount')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="title">عنوان مناسبت</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-sm"
                                        value="{{ old('title', $commonDiscount->title) }}">
                                </div>
                                @error('title')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ شروع</label>
                                    <input type="text" name="start_date" id="start_date"
                                        class="form-control form-control-sm d-none"
                                        value="{{ $commonDiscount->start_date }}">
                                    <input type="text" id="start_date_veiw" class="form-control form-control-sm"
                                        value="{{ $commonDiscount->start_date }}">
                                </div>
                                @error('start_date')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ پایان</label>
                                    <input type="text" name="end_date" id="end_date"
                                        class="form-control form-control-sm d-none"
                                        value="{{ $commonDiscount->end_date }}">
                                    <input type="text" id="end_date_veiw" class="form-control form-control-sm"
                                        value="{{ $commonDiscount->end_date }}">
                                </div>
                                @error('end_date')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $commonDiscount->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status', $commonDiscount->status) == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
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
@section('script')
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    {{-- persian date picker --}}
    <script>
        $(document).ready(function() {
            $('#start_date_veiw').persianDatepicker({
                format: "YYYY/MM/DD",
                altField: '#start_date'
            });

            $('#end_date_veiw').persianDatepicker({
                format: "YYYY/MM/DD",
                altField: '#end_date'
            });
        });
    </script>
@endsection
