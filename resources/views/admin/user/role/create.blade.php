@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد نقش جدید</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">نقش ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نقش جدید</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ایجاد نقش جدید</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.role.store') }}" method="post">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="name">عنوان نقش</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm"
                                           value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-5">
                                <div class="form-group">
                                    <label for="description">توضیح نقش</label>
                                    <input type="text" name="description" id="description"
                                           class="form-control form-control-sm" value="{{ old('description') }}">
                                </div>
                                @error('description')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 col-md-2 mt-md-4">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                            <section class="col-12">
                                <section class="py-3 mt-3 row border-top">
                                    @foreach($permissions as $key => $permission)
                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                       value="{{ $permission->id }}" name="permissions[]"
                                                       id="{{ $permission->id }}"
                                                       checked>
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
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection
