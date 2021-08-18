@extends('admin.layouts.master')
@section('head-tag')
    <title>نمایش تیکت</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">تیکت ها</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش تیکت</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نمایش تیکت</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header text-white bg-primary">
                        مهدی آقامحمدی-123123
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">عدم دسترسی به بخش سبد خرید</h5>
                        <p class="card-text">کالا به سبد خرید اضافه کردم به ولی برای نمایش به سبد خرید نمیره</p>
                    </section>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="">پاسخ تیکت</label>
                                    <textarea name="" class="form-control form-control-sm" id="" rows="4"></textarea>
                                </div>
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
