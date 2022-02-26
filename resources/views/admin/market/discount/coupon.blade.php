@extends('admin.layouts.master')
@section('head-tag')
    <title>کوپن تخفیف</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کوپن تخفیف</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>کوپن تخفیف</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.coupon.create') }}" class="btn btn-info btn-sm">ایجاد کوپن
                        تخفیف</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>کد کوپن</th>
                                <th>میزان تخفیف</th>
                                <th>نوع تخفیف</th>
                                <th>سقف تخفیف</th>
                                <th>نوع کوپن</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $coupon->code }}</td>
                                    <td>{{ $coupon->amount }}</td>
                                    <td>{{ $coupon->amount_type == 0 ? 'درصد' : 'تومان' }}</td>
                                    <td>{{ $coupon->discount_sealing ?? '-' }} تومان</td>
                                    <td>{{ $coupon->type == 0 ? 'عمومی' : 'خصوصی' }}</td>
                                    <td>{{ jalaliDate($coupon->start_date) }}</td>
                                    <td>{{ jalaliDate($coupon->end_date) }}</td>
                                    <td class="text-left width-16-rem">
                                        <a href="{{ route('admin.market.discount.coupon.edit', $coupon->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                            ویرایش</a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.discount.coupon.destroy', $coupon->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn delete btn-danger btn-sm"><i
                                                    class="fa fa-trash-alt"></i>
                                                حذف</button>
                                        </form>
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
@section('script')
    @include('admin.alerts.sweetalerts.delete-confirm', ['className' => 'delete'])
@endsection
