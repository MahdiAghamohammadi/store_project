@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد کالا جدید</title>
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
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2 border-bottom">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">دسته کالا</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        <option value="">وسایل الکترونیکی</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">فرم کالا</label>
                                    <select name="" id="" class="form-control form-control-sm">
                                        <option value="">فرم را انتخاب کنید</option>
                                        <option value="">موبایل</option>
                                        <option value="">نمایشگر</option>
                                    </select>
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="" id="">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت کالا</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">وزن</label>
                                    <input type="text" name="" id="" class="form-control form-control-sm">
                                </div>
                            </section>
                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات کالا</label>
                                    <textarea name="body" id="body" class="form-control form-control-sm"
                                        rows="6"></textarea>
                                </div>
                            </section>
                            <section class="col-12 border-bottom border-top py-3 mb-3">
                                <section class="row">
                                    <section class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" name="" id="" class="form-control form-control-sm"
                                                placeholder="ویژگی...">
                                        </div>
                                    </section>
                                    <section class="col-md-3 col-6">
                                        <div class="form-group">
                                            <input type="text" name="" id="" class="form-control form-control-sm"
                                                placeholder="مقدار...">
                                        </div>
                                    </section>
                                </section>
                                <section>
                                    <button type="button" class="btn btn-success btn-sm">افزودن</button>
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
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
