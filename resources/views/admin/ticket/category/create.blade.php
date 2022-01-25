@extends('admin.layouts.master')

@section('head-tag')
<title>دسته بندی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد دسته بندی</li>
    </ol>
  </nav>
  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>ایجاد دسته بندی</h5>
            </section>
            <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                <a href="{{ route('admin.ticket.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>
            <section>
                <form action="{{ route('admin.ticket.category.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">
                        <section class="my-2 col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">نام دسته</label>
                                <input type="text" class="form-control form-control-sm" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>
                        <section class="my-2 col-12 col-md-6">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
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

