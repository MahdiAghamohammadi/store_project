@extends('admin.layouts.master')
@section('head-tag')
    <title>جزئیات سفارش</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سفارشات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> جزئیات سفارش</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>جزئیات سفارش</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.order.show', $order->id) }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover height-117-px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام محصول</th>
                                <th>درصد فروش فوق العاده</th>
                                <th>مبلغ فروش فوق العاده</th>
                                <th>تعداد</th>
                                <th>جمع قیمت محصول</th>
                                <th>مبلغ نهایی</th>
                                <th>رنگ</th>
                                <th>گارانتی</th>
                                <th>ویژگی ها</th>
                            </tr>
                        </thead>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $item->singleProduct->name ?? '-' }}</td>
                                <td>{{ $item->amazingSale->percentage ?? '-' }} %</td>
                                <td>{{ $item->amazing_sale_discount_amount ?? '-' }} تومان</td>
                                <td>{{ $item->number ?? '-' }}</td>
                                <td>{{ $item->final_product_price ?? '-' }} تومان</td>
                                <td>{{ $item->final_total_price ?? '-' }} تومان</td>
                                <td>{{ $item->color->color_name ?? '-' }}</td>
                                <td>{{ $item->guarantee->name ?? '-' }}</td>
                                <td>
                                    @forelse ($item->orderItemAttributes as $attribute)
                                        {{ $attribute->categoryAttribute->name ?? '-' }} :
                                        {{ json_decode($attribute->categoryAttributeValue->value)->value ?? '-' }}
                                    @empty
                                        -
                                    @endforelse
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
