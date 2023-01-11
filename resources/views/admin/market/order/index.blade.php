@extends('admin.layouts.master')
@section('head-tag')
    <title>سفارشات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
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
                        <input class="form-control form-control-sm form-text" type="text" name="" id=""
                            placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover height-125-px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد سفارش</th>
                                <th>مجموع مبلغ سفارش (بدون تخفیف)</th>
                                <th>مجموع تمامی مبلغ تخفیفات</th>
                                <th>مبلغ تخفیف همه محصولات</th>
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
                            @foreach ($orders as $order)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_final_amount }} تومان</td>
                                    <td>{{ $order->order_discount_amount }} تومان</td>
                                    <td>{{ $order->order_total_products_discount_amount }} تومان</td>
                                    <td>{{ $order->order_final_amount - $order->order_discount_amount }} تومان</td>
                                    <td>{{ $order->payment_status_value }}</td>
                                    <td>{{ $order->payment_type_value }}</td>
                                    <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                    <td>{{ $order->delivery_status_value }}</td>
                                    <td>{{ $order->delivery->name }}</td>
                                    <td>{{ $order->order_status_value }}</td>
                                    <td class="text-left width-8-rem">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                                id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                                role="button">
                                                <i class="fas fa-tools"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                                <a href="{{ route('admin.market.order.show', $order->id) }}"
                                                    class="text-right dropdown-item"><i class="fas fa-images">
                                                        مشاهده
                                                        فاکتور</i></a>
                                                <a href="{{ route('admin.market.order.changeSendStatus', $order->id) }}"
                                                    class="text-right dropdown-item"><i class="fas fa-list-ul">
                                                        تغییر
                                                        وضعیت ارسال</i></a>
                                                <a href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}"
                                                    class="text-right dropdown-item"><i class="fas fa-edit">
                                                        تغییر
                                                        وضعیت
                                                        سفارش</i></a>
                                                <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}"
                                                    class="text-right dropdown-item"><i class="fas fa-window-close">
                                                        باطل کردن سفارش</i></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
