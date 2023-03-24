@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>تیکت های شما</title>
@endsection

@section('content')
    <!-- start body -->
    <section class="row">
        @include('customer.layouts.partials.profile-sidebar')
        <main id="main-body" class="main-body col-md-9">
            <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>لیست تیکت ها</span>
                        </h2>
                        <section class="content-header-link m-2">
                            <a href="#" class="btn btn-info text-white">ارسال تیکت جدید</a>
                        </section>
                    </section>
                </section>
                <!-- end vontent header -->


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
                                <th>وضعیت تیکت</th>
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
                                    <td>{{ $ticket->status == 0 ? 'باز' : 'بسته' }}</td>
                                    <td class="text-left width-16-rem">
                                        <a href="{{ route('customer.profile.my-tickets.show', $ticket->id) }}"
                                            class="btn btn-info btn-sm"><i class="pl-1 fa fa-eye"></i></a>
                                        <a href="{{ route('customer.profile.my-tickets.change', $ticket->id) }}"
                                            class="btn btn-warning btn-sm"><i
                                                class="pl-1 fa fa-{{ $ticket->status == 1 ? 'check' : 'times' }}"></i>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>


            </section>
        </main>
    </section>
    <!-- end body -->
@endsection
