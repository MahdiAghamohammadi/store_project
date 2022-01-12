@extends('admin.layouts.master')
@section('head-tag')
    <title>تنظیمات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تنظیمات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>تنظیمات</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a class="btn btn-info btn-sm disabled">ایجاد تنظیمات جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان سایت</th>
                                <th>توضیحات سایت</th>
                                <th>کلمات کلیدی سایت</th>
                                <th>لوگو سایت</th>
                                <th>آیکون سایت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->description }}</td>
                                <td>{{ $setting->keywords }}</td>
                                <td><img src="{{ asset($setting->logo) }}" width="50" alt="logo"></td>
                                <td><img src="{{ asset($setting->icon) }}" width="50" alt="icon"></td>
                                <td class="text-left width-8-rem">
                                    <a href="{{ route('admin.setting.edit', $setting->id) }}"
                                        class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i> ویرایش</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </section>
        </section>
    </section>
@endsection
