@extends('admin.layouts.master')
@section('head-tag')
    <title>نقش ها</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نقش ها</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm">ایجاد نقش جدید</a>
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
                                <th>نام نقش</th>
                                <th>دسترسی ها</th>
                                <th class="text-center max-width-16-rem"><i class="fa fa-cogs"></i> تنظیمات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <th>{{ $key += 1 }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if (empty(
                                            $role->permissions()->get()->toArray()
                                        ))
                                            <span class="text-danger">برای این نقش هیچ سطح دسترسی ای تعریف نشده
                                                است</span>
                                        @else
                                            @foreach ($role->permissions as $permission)
                                                {{ $permission->name }} <br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-left width-22-rem">
                                        <a href="{{ route('admin.user.role.permission-form', $role->id) }}"
                                            class="btn btn-success btn-sm"><i class="pl-1 fa fa-user-graduate"></i>
                                        </a>
                                        <a href="{{ route('admin.user.role.edit', $role->id) }}"
                                            class="btn btn-primary btn-sm"><i class="pl-1 fa fa-edit"></i>
                                        </a>
                                        <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}"
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
