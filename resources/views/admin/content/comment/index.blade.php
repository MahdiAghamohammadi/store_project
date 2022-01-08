@extends('admin.layouts.master')
@section('head-tag')
    <title>نظرات</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نظرات</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نظرات</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="#" class="btn btn-info btn-sm disabled">ایجاد نظر جدید</a>
                    <div class="max-width-16-rem">
                        <input class="form-control form-control-sm form-text" type="text" name="" id="" placeholder="جستجو">
                    </div>
                </section>
                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نظر</th>
                                <th>پاسخ به</th>
                                <th>کد کاربر</th>
                                <th>نویسنده نظر</th>
                                <th>کد پست</th>
                                <th>پست</th>
                                <th>وضعیت تایید</th>
                                <th>وضعیت کامنت</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <th>{{ Str::limit($comment->body, 10) }}</th>
                                    <th>{{ $comment->parent_id ? Str::limit($comment->parent->body, 10) : '' }}</th>
                                    <td>{{ $comment->author_id }}</td>
                                    <td>{{ $comment->user->fullName }}</td>
                                    <td>{{ $comment->commentable_id }}</td>
                                    <td>{{ $comment->commentable->title }}</td>
                                    <td>{{ $comment->approved ? 'تایید شده' : 'تایید نشده' }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $comment->id }}" onchange="changeStatus({{ $comment->id }})"
                                                type="checkbox"
                                                data-url="{{ route('admin.content.comment.status', $comment->id) }}"
                                                @if ($comment->status === 1)
                                            checked
                            @endif>
                            </label>
                            </td>
                            <td class="text-left width-16-rem">
                                <a href="{{ route('admin.content.comment.show', $comment->id) }}"
                                    class="btn btn-info btn-sm"><i class="pl-1 fa fa-eye"></i> نمایش</a>
                                @if ($comment->approved == 1)
                                    <a href="{{ route('admin.content.comment.approved', $comment->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-clock"></i>
                                        عدم تایید</a>
                                @else
                                    <a href="{{ route('admin.content.comment.approved', $comment->id) }}"
                                        class="text-white btn btn-success btn-sm"><i class="fa fa-check"></i>
                                        تایید</a>
                                @endif
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
                            successToast('نظر مورد نظر با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('نظر مورد نظر با موفقیت غیر فعال شد');
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
@endsection
