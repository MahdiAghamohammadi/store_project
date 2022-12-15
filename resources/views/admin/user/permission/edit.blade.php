@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش دسترسی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">دسترسی ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسترسی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش دسترسی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.permission.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.permission.update', $permission->id) }}" method="post">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">عنوان دسترسی</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value="{{ old('name', $permission->name) }}">
                                </div>
                                @error('name')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="description">توضیح دسترسی</label>
                                    <input type="text" name="description" id="description"
                                        class="form-control form-control-sm"
                                        value="{{ old('description', $permission->description) }}">
                                </div>
                                @error('description')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-2 mt-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
