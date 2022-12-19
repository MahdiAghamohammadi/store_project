@extends('admin.layouts.master')
@section('head-tag')
    <title>ایجاد نقش ادمین</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کاربر ادمین</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد نقش ادمین</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>ایجاد نقش ادمین</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <section>
                    <form action="{{ route('admin.user.admin-user.roles.store', $admin) }}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="roles">نقش ها</label>
                                    <select class="form-control form-control-sm" id="select_roles" name="roles[]" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @foreach ($admin->roles as $user_role)
                                                @if ($user_role->id === $role->id)
                                                    selected
                                                @endif @endforeach>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('roles')
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
            var select_roles = $('#select_roles');

            select_roles.select2({
                placeholder: "لطفا نقش را وارد کنید",
                multiple: true,
                tag: true
            });
        });
    </script>
@endsection
