<!doctype html>
<html lang="en">

<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    @include('customer.layouts.header')
    @include('admin.alerts.alert-section.success')
    @include('admin.alerts.alert-section.error')
    <main id="main-body-one-col" class="main-body">
        @yield('content')
    </main>

    @include('customer.layouts.footer')
    @include('customer.layouts.scripts')
    @yield('script')
</body>

</html>
