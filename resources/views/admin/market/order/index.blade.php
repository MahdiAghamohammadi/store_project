@extends('admin.layouts.master')
@section('head-tag')
    <title>سفارشات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سفارشات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>سفارشات</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد سفارش جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مبلغ سفارش</th>
                                <th>مبلغ تخفیف</th>
                                <th>مبلغ نهایی</th>
                                <th>وضعیت پرداخت</th>
                                <th>شیوه پرداخت</th>
                                <th>بانک</th>
                                <th>وضعیت ارسال</th>
                                <th>شیوه ارسال</th>
                                <th>وضعیت سفارش</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>9908-1234</td>
                                <td>381,000 تومان</td>
                                <td>81,000 تومان</td>
                                <td>300,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>ملی</td>
                                <td>ارسال شده</td>
                                <td>پست پیشتاز</td>
                                <td>تحویل شده</td>
                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                            role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-images"> مشاهده
                                                    فاکتور</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-list-ul"> تغییر
                                                    وضعیت ارسال</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-edit"> تغییر وضعیت
                                                    سفارش</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-window-close">
                                                    باطل کردن سفارش</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>9908-1234</td>
                                <td>381,000 تومان</td>
                                <td>81,000 تومان</td>
                                <td>300,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>ملی</td>
                                <td>ارسال شده</td>
                                <td>پست پیشتاز</td>
                                <td>تحویل شده</td>
                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                            role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-images"> مشاهده
                                                    فاکتور</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-list-ul"> تغییر
                                                    وضعیت ارسال</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-edit"> تغییر وضعیت
                                                    سفارش</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-window-close">
                                                    باطل کردن سفارش</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>1</th>
                                <td>9908-1234</td>
                                <td>381,000 تومان</td>
                                <td>81,000 تومان</td>
                                <td>300,000 تومان</td>
                                <td>پرداخت شده</td>
                                <td>آنلاین</td>
                                <td>ملی</td>
                                <td>ارسال شده</td>
                                <td>پست پیشتاز</td>
                                <td>تحویل شده</td>
                                <td class="text-left width-8-rem">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                            role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-images"> مشاهده
                                                    فاکتور</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-list-ul"> تغییر
                                                    وضعیت ارسال</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-edit"> تغییر وضعیت
                                                    سفارش</i></a>
                                            <a href="#" class="dropdown-item text-right"><i class="fas fa-window-close">
                                                    باطل کردن سفارش</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
