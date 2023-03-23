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
                    </section>
                </section>
                <!-- end vontent header -->
                <section class="pb-2 mt-3 mb-3 d-flex justify-content-between align-items-center border-bottom">
                    <a href="{{ route('customer.profile.my-tickets') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section class="mb-3 card my-3">
                    <section class="text-white card-header bg-primary">
                        {{ $ticket->user->fullName }}
                    </section>
                    <section class="card-body">
                        <h5 class="card-title">موضوع: {{ $ticket->subject }}</h5>
                        <p class="card-text">{{ $ticket->description }}</p>
                    </section>
                </section>
                <section>
                    <form action="{{ route('customer.profile.my-tickets.answer', $ticket->id) }}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="col-12 ">
                                <div class="form-group">
                                    <label for="description">پاسخ تیکت</label>
                                    <textarea name="description" class="form-control form-control-sm" id="description"
                                              rows="4">{{ old('description') }}</textarea>
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
