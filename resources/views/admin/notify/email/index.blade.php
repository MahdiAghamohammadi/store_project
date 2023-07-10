@extends('admin.layouts.master')
@section('head-tag')
    <title>اطلاعیه ایمیلی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> اطلاعیه ایمیلی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>اطلاعیه ایمیلی</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.notify.email.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه
                        ایمیلی</a>
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
                                <th>عنوان اطلاعیه</th>
                                <th>متن ایمیل</th>
                                <th>تاریخ ارسال</th>
                                <th>وضعیت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emails as $key => $email)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $email->subject }}</td>
                                    <td>{{ $email->body }}</td>
                                    <td>{{ jalaliDate($email->published_at, 'H:i:s Y/m/d') }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $email->id }}" onchange="changeStatus({{ $email->id }})"
                                                type="checkbox"
                                                data-url="{{ route('admin.notify.email.status', $email->id) }}"
                                                @if ($email->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="text-left width-22-rem">
                                        <a href="{{ route('admin.notify.email-file.index', $email->id) }}"
                                            class="text-white btn btn-warning btn-sm"><i class="pl-1 fa fa-file"
                                                title="فایل"></i>
                                        </a>
                                        <a href="{{ route('admin.notify.email.edit', $email->id) }}"
                                            class="btn btn-info btn-sm"><i class="pl-1 fa fa-edit" title="ویرایش"></i>
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.notify.email.destroy', $email->id) }}" method="POST">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <button type="submit" class="delete btn btn-danger btn-sm"><i
                                                    class="fa fa-trash-alt" title="حذف"></i>
                                            </button>
                                        </form>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('admin.notify.email.send', $email->id) }}">
                                            <i class="fa fa-paper-plane" title="ارسال"></i>
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
@section('script')
    {{-- this is for change status --}}
    <script type="text/javascript">
        function changeStatus(id) {
            let element = $('#' + id);
            let url = element.attr('data-url');
            let elementValue = !element.prop('checked');
            $.ajax({
                url: url,
                type: "GET",
                success: function(response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('اعلامیه ایمیلی مورد نظر با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('اعلامیه ایمیلی مورد نظر با موفقیت غیر فعال شد');
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی رخ داده است');
                    }
                },
                error: function() {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد');
                }
            });

            function successToast(msg) {
                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="py-3 text-white toast-body d-flex bg-success">\n' +
                    '<strong class="ml-auto text-right ">' + msg + '</strong>\n' +
                    '<button type="submit" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }

            function errorToast(msg) {
                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="py-3 text-white toast-body d-flex bg-danger">\n' +
                    '<strong class="ml-auto text-right ">' + msg + '</strong>\n' +
                    '<button type="submit" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';
                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5000).queue(function() {
                    $(this).remove();
                });
            }
        }
    </script>
    @include('admin.alerts.sweetalerts.delete-confirm', ['className' => 'delete'])
@endsection
