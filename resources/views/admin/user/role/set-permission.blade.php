@extends('admin.layouts.master')
@section('head-tag')
    <title>دسترسی های نقش</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسترسی های نقش</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>دسترسی های نقش</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.role.permission-update', $role->id) }}" method="post">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">
                            <section class="col-12">
                                <section class="col-12 col-md-5">
                                    <div class="form-group">
                                        <h6>نام نقش</h6>
                                        <section>{{ $role->name }}</section>
                                    </div>
                                    <div class="form-group">
                                        <h6>توضیح نقش</h6>
                                        <section>{{ $role->description }}</section>
                                    </div>
                                </section>
                                <section class="py-3 mt-3 row border-top">
                                    @php
                                        $rolePermissionArray = $role->permissions->pluck('id')->toArray();
                                    @endphp
                                    @foreach($permissions as $key => $permission)
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                       value="{{ $permission->id }}" name="permissions[]"
                                                       id="{{ $permission->id }}"
                                                       @if(in_array($permission->id, $rolePermissionArray)) checked @endif>
                                                <label class="mt-1 mr-3 form-check-label"
                                                       for="{{ $permission->id }}">{{ $permission->name }}</label>
                                            </div>
                                            <div class="mt-3">
                                                @error('permissions.'. $key)
                                                <span class="p-1 text-white rounded alert_required bg-danger"
                                                      role="alert">
                                                    <strong>
                                                        {{ $message }}
                                                    </strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </section>
                                    @endforeach
                                </section>
                            </section>
                            <section class="col-12 col-md-2 mt-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
