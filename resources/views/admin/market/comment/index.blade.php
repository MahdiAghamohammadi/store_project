@extends('admin.layouts.master')
@section('head-tag')
    <title>Comment</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نظرات</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد نظر جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد کاربر</th>
                                <th>نویسنده نظر</th>
                                <th>کد کالا</th>
                                <th>کالا</th>
                                <th>وضعیت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>123123</td>
                                <td>مهدی آقامحمدی</td>
                                <td>46474883</td>
                                <td>iphone 12 pro max</td>
                                <td>در انتظار تایید</td>
                                <td class="text-left width-16-rem">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i class="pl-1 fa fa-eye"></i> نمایش</a>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                        تایید</button>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>466474</td>
                                <td>مهدی آقامحمدی</td>
                                <td>46474883</td>
                                <td>iphone 12 pro max</td>
                                <td>تایید شده</td>
                                <td class="text-left width-16-rem">
                                    <a href="{{ route('admin.market.comment.show') }}" class="btn btn-info btn-sm"><i class="pl-1 fa fa-eye"></i> نمایش</a>
                                    <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-clock"></i>
                                        عدم تایید</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
