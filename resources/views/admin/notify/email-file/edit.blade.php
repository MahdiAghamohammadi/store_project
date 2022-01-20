@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش فایل اطلاعیه ایمیلی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فایل های اطلاعیه ایمیلی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش فایل اطلاعیه ایمیلی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش فایل اطلاعیه ایمیلی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.notify.email-file.index', $file->email->id) }}"
                        class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.notify.email-file.update', $file->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="file">فایل</label>
                                    <input type="file" name="file" id="file" class="form-control form-control-sm">
                                </div>
                                @error('file')
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
                                        <option value="0" @if (old('status', $file->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status', $file->status) == 1) selected @endif>فعال</option>
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
