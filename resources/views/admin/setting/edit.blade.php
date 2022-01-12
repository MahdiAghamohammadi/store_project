@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش تنظیمات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش تنظیمات</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="title">عنوان سایت</label>
                                    <input type="text" name="title" id="title" class="form-control form-control-sm"
                                        value="{{ old('title', $setting->title) }}">
                                </div>
                                @error('title')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="description">توضیحات سایت</label>
                                    <input type="text" name="description" id="description"
                                        class="form-control form-control-sm"
                                        value="{{ old('description', $setting->description) }}">
                                </div>
                                @error('description')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="keywords">کلمات کلیدی سایت</label>
                                    <input type="text" name="keywords" id="keywords" class="form-control form-control-sm"
                                        value="{{ old('keywords', $setting->keywords) }}">
                                </div>
                                @error('keywords')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="logo">لوگو</label>
                                    <input type="file" name="logo" id="logo" class="form-control form-control-sm">
                                </div>
                                @error('logo')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input type="file" name="icon" id="icon" class="form-control form-control-sm">
                                </div>
                                @error('icon')
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
