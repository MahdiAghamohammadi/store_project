@extends('admin.layouts.master')
@section('head-tag')
    <title>سوالات متداول</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سوالات متداول</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>سوالات متداول</h6>
                </section>
                {{-- button and search inout --}}
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2 border-bottom">
                    <a href="{{ route('admin.content.faq.create') }}" class="btn btn-info btn-sm">ایجاد سوال جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>پرسش</th>
                                <th>خلاصه پاسخ</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>چجوری میتونم ثبت نام کنم؟</td>
                                <td>به بخش ثبت نام مراجعه ...</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit pl-1"></i> ویرایش</a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>
                                        حذف</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>چجوری خرید کنم؟</td>
                                <td>برای خرید ابتدا باید ...</td>
                                <td class="width-16-rem text-left">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit pl-1"></i> ویرایش</a>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i>
                                        حذف</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
