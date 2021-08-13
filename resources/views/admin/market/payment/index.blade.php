@extends('admin.layouts.master')
@section('head-tag')
    <title>پرداخت ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پرداخت ها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>پرداخت ها</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد پرداخت جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد تراکنش</th>
                                <th>بانک</th>
                                <th>پرداخت کننده</th>
                                <th>وضعیت پرداخت</th>
                                <th>نوع پرداخت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>577488393</td>
                                <td>ملی</td>
                                <td>مهدی آقامحمدی</td>
                                <td>تایید شده</td>
                                <td>آفلاین</td>
                                <td class="text-left width-22-rem">
                                    <a href="#" class="btn btn-info btn-sm"><i class="pl-1 fa fa-edit"></i> مشاهده</a>
                                    <a href="#" class="btn btn-warning btn-sm">باطل کردن</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>455987987984</td>
                                <td>ملت</td>
                                <td>مهدی آقامحمدی</td>
                                <td>تایید شده</td>
                                <td>آنلاین</td>
                                <td class="text-left width-22-rem">
                                    <a href="#" class="btn btn-info btn-sm"><i class="pl-1 fa fa-edit"></i> مشاهده</a>
                                    <a href="#" class="btn btn-warning btn-sm">باطل کردن</a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
