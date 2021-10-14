@extends('admin.layouts.master')
@section('head-tag')
    <title>دسته بندی</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>دسته بندی</h6>
                </section>
                {{-- @include('admin.alerts.alert-section.success') --}}
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.content.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته
                        بندی</a>
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
                            <th>نام دسته بندی</th>
                            <th>توضیحات</th>
                            <th>اسلاگ</th>
                            <th>عکس</th>
                            <th>تگ ها</th>
                            <th>وضعیت</th>
                            <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($postCategories as $postCategory)
                            <tr>
                                <th>{{ $postCategory->id }}</th>
                                <td>{{ $postCategory->name }}</td>
                                <td>{{ $postCategory->description }}</td>
                                <td>{{ $postCategory->slug }}</td>
                                <td><img src="{{ asset($postCategory->image) }}" alt="" width="50px" height="50px">
                                </td>
                                <td>{{ $postCategory->tags }}</td>
                                <td>
                                    <label>
                                        <input id="{{ $postCategory->id }}"
                                               onchange="changeStatus({{ $postCategory->id }})" type="checkbox"
                                               data-url="{{ route('admin.content.category.status', $postCategory->id) }}"
                                               @if ($postCategory->status === 1)
                                               checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="text-left width-16-rem">
                                    <a href="{{ route('admin.content.category.edit', $postCategory->id) }}"
                                       class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                        ویرایش</a>
                                    <form class="d-inline"
                                          action="{{ route('admin.content.category.destroy', $postCategory->id) }}"
                                          method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash-alt"></i>
                                            حذف
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
    <script type="text/javascript">
        function changeStatus(id) {
            let element = $('#' + id);
            let url = element.attr('data-url');
            let elementValue = !element.prop('checked');
            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked)
                            element.prop('checked', true);
                        else
                            element.prop('checked', false);
                    } else {
                        element.prop('checked', elementValue);
                    }
                }
            })
        }
    </script>
@endsection