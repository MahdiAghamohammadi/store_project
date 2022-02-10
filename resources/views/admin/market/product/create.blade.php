@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد کالا جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کالا ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ایجاد کالا جدید</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form id="form" action="{{ route('admin.market.product.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <section class="row">
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">نام کالا</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                        value="{{ old('name') }}">
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
                                    <label for="category_id">انتخاب دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}" @if (old('category_id') == $productCategory->id) selected @endif>
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
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="brand_id">انتخاب برند</label>
                                    <select name="brand_id" id="brand_id" class="form-control form-control-sm">
                                        <option value="">برند را انتخاب کنید</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if (old('brand_id') == $brand->id) selected @endif>
                                                {{ $brand->original_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('brand_id')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                </div>
                                @error('image')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="price">قیمت کالا</label>
                                    <input type="text" name="price" id="price" class="form-control form-control-sm"
                                        value="{{ old('price') }}">
                                </div>
                                @error('price')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="weight">وزن</label>
                                    <input type="text" name="weight" id="weight" class="form-control form-control-sm"
                                        value="{{ old('weight') }}">
                                </div>
                                @error('weight')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="length">طول</label>
                                    <input type="text" name="length" id="length" class="form-control form-control-sm"
                                        value="{{ old('length') }}">
                                </div>
                                @error('length')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="width">عرض</label>
                                    <input type="text" name="width" id="width" class="form-control form-control-sm"
                                        value="{{ old('width') }}">
                                </div>
                                @error('width')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="height">ارتفاع</label>
                                    <input type="text" name="height" id="height" class="form-control form-control-sm"
                                        value="{{ old('height') }}">
                                </div>
                                @error('height')
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
                                        <option value="0" @if (old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('status') == 1) selected @endif>فعال</option>
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
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="marketable">قابل فروش بودن</label>
                                    <select name="marketable" id="marketable" class="form-control form-control-sm">
                                        <option value="0" @if (old('marketable') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if (old('marketable') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('marketable')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تاریخ انتشار</label>
                                    <input type="text" name="published_at" id="published_at"
                                        class="form-control form-control-sm d-none">
                                    <input type="text" id="published_at_veiw" class="form-control form-control-sm">
                                </div>
                                @error('published_at')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" name="tags" id="tags" class="form-control form-control-sm"
                                        value="{{ old('tags') }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="introduction">توضیحات کالا</label>
                                    <textarea name="introduction" id="introduction" class="form-control form-control-sm"
                                        rows="6">{{ old('introduction') }}</textarea>
                                </div>
                                @error('introduction')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="py-3 mb-3 col-12 border-bottom border-top">
                                <section class="row">
                                    <section class="my-2 col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" name="meta_key[]" id="meta_key"
                                                class="form-control form-control-sm" placeholder="ویژگی...">
                                        </div>
                                        @error('meta_key.*')
                                            <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </section>
                                    <section class="my-2 col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" name="meta_value[]" id="meta_value"
                                                class="form-control form-control-sm" placeholder="مقدار...">
                                        </div>
                                        @error('meta_value.*')
                                            <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </section>
                                </section>
                                <section>
                                    <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                                </section>
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
    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>
    {{-- persian date picker --}}
    <script>
        $(document).ready(function() {
            $('#published_at_veiw').persianDatepicker({
                format: "YYYY/MM/DD",
                altField: '#published_at'
            });
        });
    </script>
    {{-- tags input --}}
    <script>
        $(document).ready(function() {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;
            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: "لطفا تگ های خود را وارد کنید",
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');
            $('#form').submit(function() {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            });
        });
    </script>
    {{-- meta copy --}}
    <script>
        $(document).ready(function() {
            $("#btn-copy").on('click', function() {
                var el = $(this).parent().prev().clone(true);
                $(this).before(el);
            });
        });
    </script>
@endsection
