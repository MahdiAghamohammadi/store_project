@extends('admin.layouts.master')
@section('head-tag')
    <title>مقدار فرم کالا</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> مقدار فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>مقدار فرم کالا</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.value.create', $attribute->id) }}" class="btn btn-info btn-sm">ایجاد
                        مقدار فرم جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام فرم</th>
                                <th>نام محصول</th>
                                <th>مقدار</th>
                                <th>میزان افزایش قیمت</th>
                                <th>نوع</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attribute->values as $key => $value)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $attribute->name }}</td>
                                    <td>{{ $value->product->name }}</td>
                                    <td>{{ json_decode($value->value)->value }}</td>
                                    <td>{{ json_decode($value->value)->price_increase }}</td>
                                    <td>{{ $value->type == 0 ? 'ساده' : 'انتخابی' }}</td>
                                    <td class="text-left width-22-rem">
                                        <a href="{{ route('admin.market.value.edit', ['attribute' => $attribute->id, 'value' => $value->id]) }}" class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                            ویرایش</a>
                                        <form class="d-inline" action="{{ route('admin.market.value.destroy', ['attribute' => $attribute->id, 'value' => $value->id]) }}" method="POST">
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
