@extends('admin.layouts.master')
@section('head-tag')
    <title>تیکت ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تیکت ها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>تیکت ها</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد تیکت جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نویسنده تیکت</th>
                                <th>عنوان تیکت</th>
                                <th>دسته تیکت</th>
                                <th>اولویت تیکت</th>
                                <th>ارجاع شده از</th>
                                <th>تیکت مرجع</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $ticket->user->fullName }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td>{{ $ticket->category->name }}</td>
                                    <td>{{ $ticket->priority->name }}</td>
                                    <td>{{ $ticket->admin->user->fullName }}</td>
                                    <td>{{ $ticket->parent->subject ?? '-' }}</td>
                                    <td class="text-left width-16-rem">
                                        <a href="{{ route('admin.ticket.show', $ticket->id) }}"
                                            class="btn btn-info btn-sm"><i class="pl-1 fa fa-eye"></i></a>
                                        <a href="{{ route('admin.ticket.change', $ticket->id) }}"
                                            class="text-white btn btn-warning btn-sm"><i class="pl-1 fa fa-check"></i>
                                            {{ $ticket->status ? 'بازکردن' : 'بستن' }}
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
