@extends('admin.layouts.master')
@section('head-tag')
    <title>انبار</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> انبار</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>انبار</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد انبار جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id=""
                            placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام کالا</th>
                                <th>تصویر کالا</th>
                                <th>تعداد قابل فروش</th>
                                <th>تعداد رزرو شده</th>
                                <th>تعداد فروخته شده</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <img src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                            alt="" width="50px" height="50px">
                                    </td>
                                    <td>{{ $product->marketable_number }}</td>
                                    <td>{{ $product->frozen_number }}</td>
                                    <td>{{ $product->sold_number }}</td>
                                    <td class="text-left width-8-rem">
                                        <a href="{{ route('admin.market.store.add-to-store', $product->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-plus"></i></a>
                                        <a href="{{ route('admin.market.store.edit', $product->id) }}"
                                            class="btn btn-warning btn-sm"><i class="pl-1 fa fa-edit"></i></a>
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
