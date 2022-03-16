<!doctype html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>
<body>
@include('customer.layouts.header')

<main id="main-body-two-col" class="container-xxl body-container">
    @yield('content')
</main>

@include('customer.layouts.footer')
@include('customer.layouts.scripts')
@yield('script')
</body>
</html>