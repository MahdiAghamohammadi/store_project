@extends('admin.layouts.master')
@section('head-tag')
    <title>مدیران تیکت</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> مدیران تیکت</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>مدیران تیکت</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد مدیر جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام و نام خوانوادگی</th>
                                <th>ایمیل</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $key => $admin)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $admin->fullName }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td class="text-left width-8-rem">
                                        <a href="{{ route('admin.ticket.admin.set', $admin->id) }}"
                                            class="btn btn-info btn-sm"><i class="pl-1 fa fa-check"></i>
                                        {{ $admin->ticketAdmin == null ? 'اضافه' : 'حذف'}}
                                        </a>
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
