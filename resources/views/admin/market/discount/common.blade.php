@extends('admin.layouts.master')
@section('head-tag')
    <title>تخفیف عمومی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تخفیف عمومی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>تخفیف عمومی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.discount.commonDiscount.create') }}" class="btn btn-info btn-sm">ایجاد
                        تخفیف عمومی</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>درصد تخفیف</th>
                                <th>سقف تخفیف</th>
                                <th>عنوان مناسبت</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ پایان</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commonDiscounts as $commonDiscount)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $commonDiscount->percentage }}%</td>
                                    <td>{{ $commonDiscount->discount_ceiling }}</td>
                                    <td>{{ $commonDiscount->title }}</td>
                                    <td>{{ jalaliDate($commonDiscount->start_date) }}</td>
                                    <td>{{ jalaliDate($commonDiscount->end_date) }}</td>
                                    <td class="text-left width-16-rem">
                                        <a href="{{ route('admin.market.discount.commonDiscount.edit', $commonDiscount->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                            ویرایش</a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.discount.commonDiscount.destroy', $commonDiscount->id) }}"
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
