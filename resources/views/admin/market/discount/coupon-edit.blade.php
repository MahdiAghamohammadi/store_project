@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش کوپن تخفیف</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کوپن تخفیف</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کوپن تخفیف</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش کوپن تخفیف</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.coupon') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.discount.coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="code">کد کوپن</label>
                                    <input type="text" name="code" id="code" class="form-control form-control-sm"
                                        value="{{ old('code', $coupon->code) }}">
                                </div>
                                @error('code')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="type">نوع کوپن</label>
                                    <select name="type" id="type" class="form-control form-control-sm">
                                        <option value="0" @if (old('type', $coupon->type) == 0) selected @endif>عمومی
                                        </option>
                                        <option value="1" @if (old('type', $coupon->type) == 1) selected @endif>خصوصی
                                        </option>
                                    </select>
                                </div>
                                @error('type')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="user_id">کاربران</label>
                                    <select name="user_id" id="user_id" class="form-control form-control-sm"
                                        {{ $coupon->type == 0 ? 'disabled' : '' }}>
                                        <option value="">کاربر مورد نظر را انتخاب کنید</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                @if (old('user_id', $coupon->user_id) == $user->id) selected @endif>
                                                {{ $user->fullName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount">میزان تخفیف</label>
                                    <input type="text" name="amount" id="amount" class="form-control form-control-sm"
                                        value="{{ old('amount', $coupon->amount) }}">
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
                                    <label for="discount_sealing">سقف تخفیف</label>
                                    <input type="text" class="form-control form-control-sm" name="discount_sealing"
                                        id="discount_sealing"
                                        value="{{ old('discount_sealing', $coupon->discount_sealing) }}">
                                </div>
                                @error('discount_sealing')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="amount_type">نوع تخفیف</label>
                                    <select name="amount_type" id="amount_type" class="form-control form-control-sm">
                                        <option value="0" @if (old('amount_type', $coupon->amount_type) == 0) selected @endif>درصد
                                        </option>
                                        <option value="1" @if (old('amount_type', $coupon->amount_type) == 1) selected @endif>تومان
                                        </option>
                                    </select>
                                </div>
                                @error('amount_type')
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
                                        class="form-control form-control-sm d-none" value="{{ $coupon->start_date }}">
                                    <input type="text" id="start_date_veiw" class="form-control form-control-sm"
                                        value="{{ $coupon->start_date }}">
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
                                        class="form-control form-control-sm d-none" value="{{ $coupon->end_date }}">
                                    <input type="text" id="end_date_veiw" class="form-control form-control-sm"
                                        value="{{ $coupon->end_date }}">
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
                                        <option value="0" @if (old('status', $coupon->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status', $coupon->status) == 1) selected @endif>فعال</option>
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
    {{-- users list disabled and enabled --}}
    <script>
        $(document).ready(function() {
            $('#type').change(function() {
                if ($('#type').find(':selected').val() == '1') {
                    $('#user_id').removeAttr('disabled');
                } else {
                    $('#user_id').attr('disabled', 'disabled');
                }
            });
        });
    </script>
@endsection
