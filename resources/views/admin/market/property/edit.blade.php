@extends('admin.layouts.master')
@section('head-tag')
    <title>ویرایش فرم کالا</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ویرایش فرم کالا</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.market.property.update', $attribute->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام فرم</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value="{{ old('name', $attribute->name) }}">
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
                                    <label for="unit">واحد اندازه گیری</label>
                                    <input type="text" name="unit" id="unit" class="form-control form-control-sm"
                                        value="{{ old('unit', $attribute->unit) }}">
                                </div>
                                @error('unit')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="category_id">انتخاب دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}"
                                                @if (old('category_id', $attribute->category_id) == $productCategory->id) selected @endif>
                                                {{ $productCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
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
