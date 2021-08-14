@extends('admin.layouts.master')
@section('head-tag')
    <title>کالا ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالا ها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>کالا ها</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.product.create') }}" class="btn btn-info btn-sm">ایجاد کالا جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>قیمت</th>
                                <th>وزن</th>
                                <th>دسته</th>
                                <th>فرم</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>لپ تاپ اپل</td>
                                <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="macbook"
                                        class="max-height-2rem"></td>
                                <td>25,000,000 تومان</td>
                                <td>1 کیلوگرم</td>
                                <td>لوازم الکترونیکی</td>
                                <td>لپ تاپ</td>
                                <td class="text-left width-16-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                            role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-images">
                                                    گالری</i></a>
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-list-ul"> فرم
                                                    کالا</i></a>
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-edit">
                                                    ویرایش</i></a>
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-trash-alt">
                                                    حذف</i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>نمایشگر asus</td>
                                <td><img src="{{ asset('admin-assets/images/avatar-2.jpg') }}" alt="ausu monitor"
                                        class="max-height-2rem"></td>
                                <td>12,000,000 تومان</td>
                                <td>4 کیلوگرم</td>
                                <td>لوازم الکترونیکی</td>
                                <td>نمایشگر</td>
                                <td class="text-left width-16-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                            id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                            role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-images">
                                                    گالری</i></a>
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-list-ul"> فرم
                                                    کالا</i></a>
                                            <a href="" class="dropdown-item text-right"><i class="fas fa-edit">
                                                    ویرایش</i></a>
                                            <form action="" method="POST">
                                                <button type="submit" class="dropdown-item text-right"><i
                                                        class="fas fa-trash-alt">
                                                        حذف</i></button>
                                            </form>
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
