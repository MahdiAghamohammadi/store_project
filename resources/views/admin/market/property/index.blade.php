@extends('admin.layouts.master')
@section('head-tag')
    <title>فرم کالا</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> فرم کالا</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>فرم کالا</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.property.create') }}" class="btn btn-info btn-sm">ایجاد فرم جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان فرم</th>
                                <th>واحد اندازه گیری</th>
                                <th>دسته والد</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category_attributes as $key => $category_attribute)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $category_attribute->name }}</td>
                                    <td>{{ $category_attribute->unit }}</td>
                                    <td>{{ $category_attribute->category->name }}</td>
                                    <td class="text-left width-22-rem">
                                        <a href="#" class="btn btn-warning btn-sm"><i class="pl-1 fa fa-edit"></i> ویژگی
                                            ها</a>
                                        <a href="{{ route('admin.market.property.edit', $category_attribute->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                            ویرایش</a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.property.destroy', $category_attribute->id) }}"
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
