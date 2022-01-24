@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد مشتری جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">مشتریان</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد مشتری جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ایجاد مشتری جدید</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="first_name">نام</label>
                                    <input type="text" name="first_name" id="first_name"
                                        class="form-control form-control-sm" value="{{ old('first_name') }}">
                                </div>
                                @error('first_name')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-sm"
                                        value="{{ old('last_name') }}">
                                </div>
                                @error('last_name')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="text" name="email" id="email" class="form-control form-control-sm"
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="mobile">شماره موبایل</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control form-control-sm"
                                        value="{{ old('mobile') }}">
                                </div>
                                @error('mobile')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">کلمه عبور</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm"
                                        value="{{ old('password') }}">
                                </div>
                                @error('password')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">تکرار کلمه عبور</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control form-control-sm" value="{{ old('password_confirmation') }}">
                                </div>
                                @error('password_confirmation')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="profile_photo_path">تصویر</label>
                                    <input type="file" name="profile_photo_path" id="profile_photo_path" class="form-control form-control-sm">
                                </div>
                                @error('profile_photo_path')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="activation">وضعیت فعال سازی</label>
                                    <select name="activation" id="activation" class="form-control form-control-sm">
                                        <option value="0" @if (old('activation') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('activation') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('activation')
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
