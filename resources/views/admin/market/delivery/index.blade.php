@extends('admin.layouts.master')
@section('head-tag')
    <title>روش های ارسال</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> روش های ارسال</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>روش های ارسال</h6>
                </section>
                {{-- button and search inout --}}
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2 border-bottom">
                    <a href="{{ route('admin.market.delivery.create') }}" class="btn btn-info btn-sm">ایجاد روش ارسال
                        جدید</a>
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
                                <th>نام روش های ارسال</th>
                                <th>هزینه ارسال</th>
                                <th>زمان ارسال</th>
                                <th>وضعیت</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($delivery_methods as $key => $delivery_method)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $delivery_method->name }}</td>
                                    <td>{{ $delivery_method->amount }} تومان</td>
                                    <td>{{ $delivery_method->time }}</td>
                                    <td>
                                        <label>
                                            <input id="{{ $delivery_method->id }}"
                                                onchange="changeStatus({{ $delivery_method->id }})" type="checkbox"
                                                data-url="{{ route('admin.market.delivery.status', $delivery_method->id) }}"
                                                @if ($delivery_method->status === 1) checked @endif>
                                        </label>
                                    </td>
                                    <td class="width-16-rem text-left">
                                        <a href="{{ route('admin.market.delivery.edit', $delivery_method->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa fa-edit pl-1"></i>
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.market.delivery.destroy', $delivery_method->id) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn delete btn-danger btn-sm"><i
                                                    class="fa fa-trash-alt"></i>
                                            </button>
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
                            successToast('روش ارسال مورد نظر با موفقیت فعال شد');
                        } else {
                            element.prop('checked', false);
                            successToast('روش ارسال مورد نظر با موفقیت غیر فعال شد');
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
