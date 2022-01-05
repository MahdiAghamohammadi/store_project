@extends('admin.layouts.master')
@section('head-tag')
    <title>پیج ساز</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> پیج ساز</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>پیج ساز</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.content.page.create') }}" class="btn btn-info btn-sm">ایجاد پیج جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>اسلاگ</th>
                                <th>تگ ها</th>
                                <th>وضعیت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $key => $page)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->tags }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $page->id }}" onchange="changeStatus({{ $page->id }})"
                                                type="checkbox"
                                                data-url="{{ route('admin.content.page.status', $page->id) }}"
                                                @if ($page->status === 1)
                                            checked
                            @endif>
                            </label>
                            </td>
                            <td class="text-left width-16-rem">
                                <a href="{{ route('admin.content.page.edit', $page->id) }}"
                                    class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                    ویرایش</a>
                                <form class="d-inline" action="{{ route('admin.content.page.destroy', $page->id) }}"
                                    method="POST">
                                    @csrf
                                    {{ method_field('delete') }}
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
                            successToast('صفحه مورد نظر با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('صفحه مورد نظر با موفقیت غیر فعال شد');
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
