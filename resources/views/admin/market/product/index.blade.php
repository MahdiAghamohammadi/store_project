@extends('admin.layouts.master')
@section('head-tag')
    <title>کالا ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
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
                            <th>قیمت</th>
                            <th>دسته</th>
                            <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <th>{{ $key += 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img
                                        src="{{ asset($product->image['indexArray'][$product->image['currentImage']]) }}"
                                        alt="" width="50px" height="50px">
                                </td>
                                <td>{{ $product->price }} تومان</td>
                                <td>{{ $product->category->name }}</td>
                                <td class="text-left width-16-rem">
                                    <div class="dropdown">
                                        <a href="" class="btn btn-success btn-sm btn-block dropdown-toggle"
                                           id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false"
                                           role="button">
                                            <i class="fas fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu" aria-label="dropdownMenuLink">
                                            <a href="" class="text-right dropdown-item"><i class="fas fa-images">
                                                    گالری</i></a>
                                            <a href="{{ route('admin.market.color.index', $product->id) }}"
                                               class="text-right dropdown-item"><i class="fas fa-list-ul"> رنگ
                                                    کالا</i></a>
                                            <a href="{{ route('admin.market.product.edit', $product->id) }}"
                                               class="text-right dropdown-item"><i class="fas fa-edit">
                                                    ویرایش</i></a>
                                            <form class="d-inline"
                                                  action="{{ route('admin.market.product.destroy', $product->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="text-right delete dropdown-item"><i
                                                        class="fa fa-trash-alt"></i>
                                                    حذف
                                                </button>
                                            </form>
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
@section('script')
    @include('admin.alerts.sweetalerts.delete-confirm', ['className' => 'delete'])
@endsection
