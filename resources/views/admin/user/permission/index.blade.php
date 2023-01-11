@extends('admin.layouts.master')
@section('head-tag')
    <title>دسترسی ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسترسی ها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>دسترسی ها</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.permission.create') }}" class="btn btn-info btn-sm">ایجاد دسترسی جدید</a>
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
                                <th>نام دسترسی</th>
                                <th>نام نقش ها</th>
                                <th>توضیحات</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $key => $permission)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        @if (empty(
                                            $permission->roles()->get()->toArray()
                                        ))
                                            <span class="text-danger">برای این دسترسی هیچ سطح نقشی تعریف نشده
                                                است</span>
                                        @else
                                            @foreach ($permission->roles as $role)
                                                {{ $role->name }} <br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $permission->description }}</td>
                                    <td class="text-left width-22-rem">
                                        <a href="{{ route('admin.user.permission.edit', $permission->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                        </a>
                                        <form class="d-inline"
                                            action="{{ route('admin.user.permission.destroy', $permission->id) }}"
                                            method="post">
                                            @csrf
                                            {{ method_field('delete') }}
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
    @include('admin.alerts.sweetalerts.delete-confirm', ['className' => 'delete'])
@endsection
