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

                <section class="mb-3 card">
                    <section class="text-white card-header bg-custom-orange">
                        {{ $comment->user->fullName }} - {{ $comment->user->id }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">مشخصات کالا: {{ $comment->commentable->title }} کد کالا:
                            {{ $comment->commentable->id }}</h5>
                        <p class="card-text">{{ $comment->body }}</p>
                    </section>
                </section>

                @if ($comment->parent_id == null)
                    <section>
                        <form action="{{ route('admin.market.comment.answer', $comment->id) }}" method="POST">
                            @csrf
                            <section class="row">
                                <section class="col-12 ">
                                    <div class="form-group">
                                        <label for="body">پاسخ ادمین</label>
                                        <textarea name="body" class="form-control form-control-sm" id="body"
                                            rows="4"></textarea>
                                    </div>
                                </section>
                                <section class="col-12">
                                    <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                                </section>
                            </section>
                        </form>
                    </section>
                @endif
            </section>
        </section>
    </section>
@endsection
