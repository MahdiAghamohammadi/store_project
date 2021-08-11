@extends('admin.layouts.master')
@section('head-tag')
    <title>نمایش نظر</title>
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">نظرات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش نظر</li>
        </ol>
    </nav>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                {{-- header --}}
                <section class="main-body-container-header">
                    <h6>نمایش نظر</h6>
                </section>
                {{-- button and search inout --}}
                <section class="pb-2 mt-4 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('admin.market.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="card mb-3">
                    <section class="card-header text-white bg-custom-orange">
                        مهدی آقامحمدی-123123
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">مشخصات کالا: ساعت هوشمند apple watch کد کالا: 585849</h5>
                        <p class="card-text">ساعت خوبیه فقط باطری ضعیفی داره</p>
                    </section>
                </section>

                <section>
                    <form action="" method="">
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="">پاسخ ادمین</label>
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
