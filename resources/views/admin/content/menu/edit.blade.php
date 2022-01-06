@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش منو</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">منو ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش منو</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش منو</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.content.menu.update', $menu->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام منو</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value="{{ old('name', $menu->name) }}">
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
                                    <label for="parent_id">عنوان والد</label>
                                    <select name="parent_id" id="parent_id" class="form-control form-control-sm">
                                        <option value="">منو اصلی</option>
                                        @foreach ($parent_menus as $parent_menu)
                                            <option value="{{ $parent_menu->id }}" @if (old('parent_id', $menu->parent_id) == $parent_menu->id) selected @endif>
                                                {{ $parent_menu->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parent_id')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="url">آدرس url</label>
                                    <input type="text" name="url" id="url" class="form-control form-control-sm"
                                        value="{{ old('url', $menu->url) }}">
                                </div>
                                @error('url')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="status" class="form-control form-control-sm">
                                        <option value="0" @if (old('status', $menu->status) == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status', $menu->status) == 1) selected @endif>فعال</option>
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
