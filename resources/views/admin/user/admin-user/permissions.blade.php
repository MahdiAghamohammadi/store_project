@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد سطح دسترسی ادمین</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کاربر ادمین</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد سطح دسترسی ادمین</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ایجاد سطح دسترسی ادمین</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.admin-user.permissions.store', $admin) }}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="permissions">سطح دسترسی ها</label>
                                    <select class="form-control form-control-sm" id="select_permissions"
                                        name="permissions[]" multiple>
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                                @foreach ($admin->permissions as $user_permission)
                                                @if ($user_permission->id === $permission->id)
                                                    selected
                                                @endif @endforeach>
                                                {{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('permissions')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>
            </section>
        </section>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var select_permissions = $('#select_permissions');

            select_permissions.select2({
                placeholder: "لطفا سطح دسترسی را وارد کنید",
                multiple: true,
                tag: true
            });
        });
    </script>
@endsection
