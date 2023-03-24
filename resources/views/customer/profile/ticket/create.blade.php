@extends('customer.layouts.master-two-col')

@section('head-tag')
    <title>ساخت تیکت</title>
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
                            <span>ساخت تیکت</span>
                        </h2>
                        <section class="pb-2 mt-3 mb-3">
                            <a href="{{ route('customer.profile.my-tickets') }}" class="btn btn-info btn-sm">بازگشت</a>
                        </section>
                    </section>
                </section>
                <!-- end vontent header -->


                <section>
                    <form action="{{ route('customer.profile.my-tickets.store') }}" method="POST">
                        @csrf
                        <section class="row">
                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="subject">موضوع</label>
                                    <input type="text" class="form-control form-control-sm" name="subject" id="subject"
                                        value="{{ old('subject') }}">
                                </div>
                                @error('subject')
                                    <span class="p-1 rounded alert_required text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-2 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($ticketCategories as $ticketCategory)
                                            <option value="{{ $ticketCategory->id }}"
                                                @if (old('category_id') == $ticketCategory->id) selected @endif>
                                                {{ $ticketCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="p-1 rounded alert_required text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-2 col-md-6">
                                <div class="form-group">
                                    <label for="priority_id">اولویت</label>
                                    <select name="priority_id" id="priority_id" class="form-control form-control-sm">
                                        <option value="">اولویت را انتخاب کنید</option>
                                        @foreach ($ticketPriorities as $ticketPriority)
                                            <option value="{{ $ticketPriority->id }}"
                                                @if (old('priority_id') == $ticketPriority->id) selected @endif>
                                                {{ $ticketPriority->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('priority_id')
                                    <span class="p-1 rounded alert_required text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="col-12 my-2">
                                <div class="form-group">
                                    <label for="description">متن تیکت</label>
                                    <textarea name="description" class="form-control form-control-sm" id="description" rows="4">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <span class="p-1 rounded alert_required text-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>
                            <section class="my-2 col-12">
                                <div class="form-group">
                                    <label for="ticket_file">فایل</label>
                                    <input type="file" name="ticket_file" id="ticket_file"
                                        class="form-control form-control-sm">
                                </div>
                                @error('ticket_file')
                                    <span class="p-1 text-white rounded alert_required bg-danger" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
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
