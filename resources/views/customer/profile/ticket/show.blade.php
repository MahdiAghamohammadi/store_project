@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>نمایش تیکت</title>
@endsection

@section('content')
    <!-- start body -->
    <section class="row">
        @include('customer.layouts.partials.profile-sidebar')
        <main id="main-body" class="main-body col-md-9">
            <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                <!-- start vontent header -->
                <section class="content-header">
                    <section class="d-flex justify-content-between align-items-center">
                        <h2 class="content-header-title">
                            <span>نمایش تیکت</span>
                        </h2>
                        <section class="pb-2 mt-3 mb-3">
                            <a href="{{ route('customer.profile.my-tickets') }}" class="btn btn-info btn-sm">بازگشت</a>
                        </section>
                    </section>
                </section>
                <!-- end vontent header -->
                <section class="mb-3 card my-3">
                    <section class="text-white card-header bg-primary d-flex justify-content-between">
                        <div>{{ $ticket->user->fullName }}</div>
                        <small>{{ jalaliDate($ticket->created_at) }}</small>
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">موضوع: {{ $ticket->subject }}
                        </h5>
                        <p class="card-text">{{ $ticket->description }}</p>
                    </section>
                    @if ($ticket->file()->count() > 0)
                        <section class="card-footer">
                            <a href="{{ asset($ticket->file->file_path) }}" class="btn btn-success btn-sm" download>دانلود
                                ضمیمه</a>
                        </section>
                    @endif
                </section>

                @if ($ticket->children()->count())
                    <hr>

                    <div class="border">
                        @foreach ($ticket->children as $child)
                            <section class="card m-4 ">
                                <section class="card-header bg-light d-flex justify-content-between">
                                    <div>
                                        {{ $child->user->fullName }}
                                        @if ($child->admin)
                                            - پاسخ دهنده:
                                            {{ $child->admin->user->fullName }}
                                        @endif
                                    </div>
                                    <small>{{ jalaliDate($child->created_at) }}</small>
                                </section>
                                <section class="card-body">
                                    <p class="card-text">{{ $child->description }}</p>
                                </section>
                            </section>
                        @endforeach
                    </div>
                @endif

                <section>
                    <form action="{{ route('customer.profile.my-tickets.answer', $ticket->id) }}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="description" class="my-2">پاسخ تیکت</label>
                                    <textarea name="description" class="form-control form-control-sm" id="description" rows="4">{{ old('description') }}</textarea>
                                </div>
                            </section>
                            <section class="col-12 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>


            </section>
        </main>
    </section>
    <!-- end body -->
@endsection
