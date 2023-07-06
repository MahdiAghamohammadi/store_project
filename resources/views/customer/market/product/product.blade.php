@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>{{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('customer-assets/css/rating-style.css') }}">
@endsection
@section('content')
    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>{{ $product->name }}</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <!-- start image gallery -->
                        <section class="col-md-4">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <section class="product-gallery">
                                    @php
                                        $imageGallery = $product->images()->get();
                                        $images = collect();
                                        foreach ($imageGallery as $image) {
                                            $images->push($image->image);
                                        }
                                        $images->push($product->image);
                                    @endphp
                                    <section class="product-gallery-selected-image mb-3">
                                        <img src="{{ asset($images->first()['indexArray']['medium']) }}" alt="">
                                    </section>
                                    <section class="product-gallery-thumbs">
                                        @foreach ($images as $key => $image)
                                            <img class="product-gallery-thumb"
                                                src="{{ asset($image['indexArray']['medium']) }}"
                                                alt="{{ asset($image['indexArray']['medium']) . '-' . ($key + 1) }}"
                                                data-input="{{ asset($image['indexArray']['medium']) }}">
                                        @endforeach
                                    </section>
                                </section>
                            </section>
                        </section>
                        <!-- end image gallery -->

                        <!-- start product info -->
                        <section class="col-md-5">

                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            {{ $product->name }}
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-info">
                                    <form id="add_to_cart"
                                        action="{{ route('customer.sales-process.add-to-cart', $product) }}" method="post"
                                        class="product-info">
                                        @csrf

                                        @php
                                            $colors = $product->colors()->get();
                                        @endphp

                                        @if ($colors->count() != 0)
                                            <p><span>رنگ انتخاب شده : <span id="selected_color_name">
                                                        {{ $colors->first()->color_name }}</span></span></p>
                                            <p>
                                                @foreach ($colors as $key => $color)
                                                    <label for="{{ 'color_' . $color->id }}"
                                                        style="background-color: {{ $color->color ?? '#ffffff' }};"
                                                        class="product-info-colors me-1" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom"
                                                        title="{{ $color->color_name }}"></label>

                                                    <input class="d-none" type="radio" name="color"
                                                        id="{{ 'color_' . $color->id }}" value="{{ $color->id }}"
                                                        data-color-name="{{ $color->color_name }}"
                                                        data-color-price={{ $color->price_increase }}
                                                        @if ($key == 0) checked @endif>
                                                @endforeach

                                            </p>
                                        @endif

                                        @php
                                            $guarantees = $product->guarantees()->get();
                                        @endphp
                                        @if ($guarantees->count() != 0)
                                            <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                گارانتی :
                                                <select name="guarantee" id="guarantee" class="p-1">
                                                    @foreach ($guarantees as $key => $guarantee)
                                                        <option value="{{ $guarantee->id }}"
                                                            data-guarantee-price={{ $guarantee->price_increase }}
                                                            @if ($key == 0) selected @endif>
                                                            {{ $guarantee->name }}</option>
                                                    @endforeach

                                                </select>
                                            </p>
                                        @endif



                                        <p>
                                            @if ($product->marketable_number > 0)
                                                <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا
                                                    موجود در انبار</span>
                                            @else
                                                <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا
                                                    ناموجود</span>
                                            @endif
                                        </p>
                                        <div class="d-flex">
                                            {{-- Favorite --}}
                                            @guest
                                                <section class="product-add-to-favorite position-relative" style="top: 0">
                                                    <button type="button" class="btn btn-light btn-sm text-decoration-none"
                                                        data-url="{{ route('customer.market.add-to-favorite', $product) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="اضافه به علاقه مندی">
                                                        <i class="fa fa-heart"></i>
                                                    </button>
                                                </section>
                                            @endguest
                                            @auth
                                                @if ($product->user->contains(auth()->user()->id))
                                                    <section class="product-add-to-favorite position-relative" style="top: 0">
                                                        <button type="button" class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-favorite', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="حذف از علاقه مندی">
                                                            <i class="fa fa-heart text-danger"></i>
                                                        </button>
                                                    </section>
                                                @else
                                                    <section class="product-add-to-favorite position-relative" style="top: 0">
                                                        <button type="button" class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-favorite', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="اضافه به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endif
                                            @endauth

                                            {{-- Compare --}}
                                            @guest
                                                <section class="product-add-to-compare position-relative" style="top: 0">
                                                    <button type="button" class="btn btn-light btn-sm text-decoration-none"
                                                        data-url="{{ route('customer.market.add-to-compare', $product) }}"
                                                        data-bs-toggle="tooltip" data-bs-placement="left"
                                                        title="اضافه به مقایسه">
                                                        <i class="fa fa-industry"></i>
                                                    </button>
                                                </section>
                                            @endguest
                                            @auth
                                                @if (
                                                    $product->compares->contains(function ($compare) {
                                                        return $compare->id === auth()->user()->compare;
                                                    }))
                                                    <section class="product-add-to-compare position-relative" style="top: 0">
                                                        <button type="button" class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-compare', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="حذف از مقایسه">
                                                            <i class="fa fa-industry text-danger"></i>
                                                        </button>
                                                    </section>
                                                @else
                                                    <section class="product-add-to-compare position-relative" style="top: 0">
                                                        <button type="button"
                                                            class="btn btn-light btn-sm text-decoration-none"
                                                            data-url="{{ route('customer.market.add-to-compare', $product) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="left"
                                                            title="اضافه به مقایسه">
                                                            <i class="fa fa-industry"></i>
                                                        </button>
                                                    </section>
                                                @endif
                                            @endauth
                                        </div>
                                        <section>
                                            <section class="cart-product-number d-inline-block ">
                                                <button class="cart-number cart-number-down" type="button">-</button>
                                                <input type="number" id="number" name="number" min="1"
                                                    max="5" step="1" value="1" readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                        </section>
                                        <p class="mb-3 mt-5">
                                            <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است.
                                            برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال
                                            را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد.
                                            و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال
                                            که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                        </p>
                                </section>
                            </section>

                        </section>
                        <!-- end product info -->

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted"><span id="product_price"
                                            data-product-original-price={{ $product->price }}>{{ priceFormat($product->price) }}</span>
                                        <span class="small">تومان</span>
                                    </p>
                                </section>


                                @php
                                    
                                    $amazingSale = $product->activeAmazingSales();
                                    
                                @endphp
                                @if (!empty($amazingSale))
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder" id="product_discount_price"
                                            data-product-discount-price="{{ $product->price * ($amazingSale->percentage / 100) }}">
                                            {{ priceFormat($product->price * ($amazingSale->percentage / 100)) }} <span
                                                class="small">تومان</span></p>
                                    </section>
                                @endif

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-end align-items-center">
                                    <p class="fw-bolder"><span id="final_price"></span> <span class="small">تومان</span>
                                    </p>
                                </section>

                                <section class="">
                                    @if ($product->marketable_number > 0)
                                        <button id="next-level" class="btn btn-danger d-block w-100"
                                            onclick="document.getElementById('add_to_cart').submit();">افزودن به سبد
                                            خرید</button>
                                    @else
                                        <button id="next-level" class="btn btn-secondary disabled d-block">محصول نا موجود
                                            میباشد</button>
                                    @endif
                                </section>
                                </form>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->

        <!-- start product lazy load -->
        @include('customer.layouts.partials.related-products')
        <!-- end product lazy load -->

        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section id="introduction-features-comments" class="introduction-features-comments">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                    href="#introduction">معرفی</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                    href="#features">ویژگی ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                    href="#comments">دیدگاه ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark"
                                                    href="#rating">امتیاز ها</a></span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- start content header -->

                            <section class="py-4">

                                <!-- start vontent header -->
                                <section id="introduction" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            معرفی
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-introduction mb-4">
                                    {!! $product->introduction !!}
                                </section>

                                <!-- start vontent header -->
                                <section id="features" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویژگی ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-features mb-4 table-responsive">
                                    <table class="table table-bordered border-white">
                                        @foreach ($product->values()->get() as $value)
                                            <tr>
                                                <td>{{ $value->attribute()->first()->name }}</td>
                                                <td>
                                                    {{ json_decode($value->value)->value }}
                                                    {{ $value->attribute()->first()->unit }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        @foreach ($product->metas()->get() as $meta)
                                            <tr>
                                                <td>{{ $meta->meta_key }}</td>
                                                <td>{{ $meta->meta_value }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </section>

                                <!-- start vontent header -->
                                <section id="comments" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            دیدگاه ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-comments mb-4">

                                    <section class="comment-add-wrapper">

                                        <button class="comment-add-button" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add-comment"><i class="fa fa-plus"></i> افزودن دیدگاه
                                        </button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1"
                                            aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i
                                                                class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </section>
                                                    @guest
                                                        <section class="modal-body">
                                                            <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید
                                                            </p>
                                                            <p>لینک ثبت نام و یا ورود
                                                                <a href="{{ route('auth.customer.login-register-form') }}">کلیک
                                                                    کنید</a>
                                                            </p>
                                                        </section>
                                                    @endguest
                                                    @auth
                                                        <section class="modal-body">
                                                            <form class="row"
                                                                action="{{ route('customer.market.add-comment', $product) }}"
                                                                method="POST">
                                                                @csrf
                                                                <section class="col-12 mb-2">
                                                                    <label for="body" class="form-label mb-1">دیدگاه
                                                                        شما</label>
                                                                    <textarea class="form-control form-control-sm" id="body" name="body" placeholder="دیدگاه شما ...."
                                                                        rows="4"></textarea>
                                                                </section>

                                                                <section class="modal-footer py-1">
                                                                    <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                                        دیدگاه
                                                                    </button>
                                                                    <button type="button" class="btn btn-sm btn-danger"
                                                                        data-bs-dismiss="modal">بستن
                                                                    </button>
                                                                </section>
                                                            </form>
                                                        </section>
                                                    @endauth
                                                </section>
                                            </section>
                                        </section>
                                    </section>

                                    @foreach ($product->activeComments() as $activeComment)
                                        <section class="product-comment">
                                            <section class="product-comment-header d-flex justify-content-start">
                                                <section class="product-comment-date">
                                                    {{ jalaliDate($activeComment->created_at) }}</section>
                                                @php
                                                    $author = $activeComment->user()->first();
                                                @endphp
                                                <section class="product-comment-title">
                                                    @if (empty($author->first_name) && empty($author->last_name))
                                                        ناشناس
                                                    @else
                                                        {{ $author->fullName }}
                                                    @endif
                                                </section>
                                            </section>
                                            <section
                                                class="product-comment-body @if ($activeComment->answers()->count() > 0) border-bottom @endif">
                                                {{ $activeComment->body }}
                                            </section>
                                            @foreach ($activeComment->answers()->get() as $commentAnswer)
                                                <section class="product-comment m-2">
                                                    <section class="product-comment-header d-flex justify-content-start">
                                                        <section class="product-comment-date">
                                                            {{ jalaliDate($commentAnswer->created_at) }}</section>
                                                        @php
                                                            $author = $commentAnswer->user()->first();
                                                        @endphp
                                                        <section class="product-comment-title">
                                                            @if (empty($author->first_name) && empty($author->last_name))
                                                                ناشناس
                                                            @else
                                                                {{ $author->fullName }}
                                                            @endif
                                                        </section>
                                                    </section>
                                                    <section class="product-comment-body">
                                                        {{ $commentAnswer->body }}
                                                    </section>
                                                </section>
                                            @endforeach
                                        </section>
                                    @endforeach
                                </section>

                                <!-- start rating -->
                                <section id="rating" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            امیتاز ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-rating mb-4">
                                    @auth
                                        @if (auth()->user()->isUserPurchasedProduct($product->id)->count() > 0)
                                            <div class="container">
                                                <h5 class="text-danger">
                                                    امتیاز خود را به این محصول بدهید.
                                                </h5>
                                                <form action="{{ route('customer.market.add-rate', $product) }}"
                                                    method="POST"
                                                    class="starrating risingstar d-flex justify-content-end flex-row-reverse align-items-center">
                                                    @csrf
                                                    <div class="mx-3">
                                                        <button class="btn btn-info btn-sm" type="submit">ثبت امتیاز</button>
                                                    </div>

                                                    <input type="radio" name="rating" id="star5" value="5" />
                                                    <label for="star5" title="5 star"></label>

                                                    <input type="radio" name="rating" id="star4" value="4" />
                                                    <label for="star4" title="4 star"></label>

                                                    <input type="radio" name="rating" id="star3" value="3" />
                                                    <label for="star3" title="3 star"></label>

                                                    <input type="radio" name="rating" id="star2" value="2" />
                                                    <label for="star2" title="2 star"></label>

                                                    <input type="radio" name="rating" id="star1" value="1" />
                                                    <label for="star1" title="1 star"></label>
                                                </form>
                                                <h6>
                                                    میانگین امتیاز:
                                                    {{ number_format($product->ratingsAvg(), 1, '/') ?? 'شما اولین امتیاز را ثبت نمایید.' }}
                                                </h6>
                                            </div>
                                        @else
                                            <section class="modal-body">
                                                <p class="text-danger">برای ثبت امتیاز ابتدا باید محصول را خریداری کرده باشید.
                                                </p>
                                            </section>
                                        @endif
                                    @endauth
                                    @guest
                                        <section class="modal-body">
                                            <p>کاربر گرامی لطفا برای ثبت نظر ابتدا وارد حساب کاربری خود شوید </p>
                                            <p>لینک ثبت نام و یا ورود
                                                <a href="{{ route('auth.customer.login-register-form') }}">کلیک
                                                    کنید</a>
                                            </p>
                                        </section>
                                    @endguest

                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end description, features and comments -->

        <section class="position-fixed p-4 flex-row-reverse"
            style="z-index: 909999999; right: 0; top: 3rem; width: 26rem; max-width: 80%;">
            <div class="toast" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">فروشگاه</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <strong class="ml-auto">
                        برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب کاربری خود شوید
                        <br>
                        <a href="{{ route('auth.customer.login-register-form') }}" class="text-dark">
                            ثبت نام / ورود
                        </a>
                    </strong>
                </div>
            </div>
        </section>
    @endsection

    @section('script')
        <script>
            $(document).ready(function() {
                bill();

                // input color changed
                $("input[name='color']").change(function() {
                    bill();
                });

                // guarantee changed
                $("select[name='guarantee']").change(function() {
                    bill();
                });

                // number changed
                $(".cart-number").click(function() {
                    bill();
                });
            });

            function bill() {
                if ($("input[name='color']:checked").length != 0) {
                    var selected_color = $("input[name='color']:checked");
                    $('#selected_color_name').html(selected_color.attr('data-color-name'));
                }

                // price computing
                var selected_color_price = 0;
                var selected_guarantee_price = 0;
                var number = 1;
                var product_discount_price = 0;
                var product_original_price = parseFloat($("#product_price").attr('data-product-original-price'));

                if ($("input[name='color']:checked").length != 0) {
                    selected_color_price = parseFloat(selected_color.attr('data-color-price'));
                }

                if ($('#guarantee option:selected').length != 0) {
                    selected_guarantee_price = parseFloat($('#guarantee option:selected').attr('data-guarantee-price'));
                }

                if ($("#number").val() > 0) {
                    number = parseFloat($('#number').val());
                }

                if ($("#product_discount_price").length != 0) {
                    product_discount_price = parseFloat($("#product_discount_price").attr('data-product-discount-price'));
                }
                console.log($("#product_discount_price"))

                // final price
                var product_price = product_original_price + selected_color_price + selected_guarantee_price;
                var final_price = number * (product_price - product_discount_price);
                $('#product_price').html(toFarsiNumber(product_price));

                $('#final_price').html(toFarsiNumber(final_price));
            }

            function toFarsiNumber(number) {
                const persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

                // add comma
                number = new Intl.NumberFormat().format(number);

                // convert to persian
                return number.toString().replace(/\d/g, x => persianNumbers[x]);
            }
        </script>

        {{-- add to favorite --}}
        <script>
            $('.product-add-to-favorite button').click(function() {
                var url = $(this).attr('data-url');
                var element = $(this);
                $.ajax({
                    url: url,
                    success: function(result) {
                        if (result.status == 1) {
                            $(element).children().first().addClass('text-danger');
                            $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                            $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                        } else if (result.status == 2) {
                            $(element).children().first().removeClass('text-danger')
                            $(element).attr('data-original-title', 'افزودن به علاقه مندی ها');
                            $(element).attr('data-bs-original-title', 'افزودن به علاقه مندی ها');
                        } else if (result.status == 3) {
                            $('.toast').toast('show');
                        }
                    }
                })
            })
        </script>

        {{-- add to compare --}}
        <script>
            $('.product-add-to-compare button').click(function() {
                var url = $(this).attr('data-url');
                var element = $(this);
                $.ajax({
                    url: url,
                    success: function(result) {
                        if (result.status == 1) {
                            $(element).children().first().addClass('text-danger');
                            $(element).attr('data-original-title', 'حذف از مقایسه');
                            $(element).attr('data-bs-original-title', 'حذف از مقایسه');
                        } else if (result.status == 2) {
                            $(element).children().first().removeClass('text-danger')
                            $(element).attr('data-original-title', 'افزودن به مقایسه');
                            $(element).attr('data-bs-original-title', 'افزودن به مقایسه');
                        } else if (result.status == 3) {
                            $('.toast').toast('show');
                        }
                    }
                })
            })
        </script>

        <script>
            //start product introduction, features and comment
            $(document).ready(function() {
                var s = $("#introduction-features-comments");
                var pos = s.position();
                $(window).scroll(function() {
                    var windowpos = $(window).scrollTop();

                    if (windowpos >= pos.top) {
                        s.addClass("stick");
                    } else {
                        s.removeClass("stick");
                    }
                });
            });
            //end product introduction, features and comment
        </script>
    @endsection
