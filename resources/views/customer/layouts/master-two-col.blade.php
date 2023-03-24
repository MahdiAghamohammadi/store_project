<!doctype html>
<html lang="en">

<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>

<body>
    @include('customer.layouts.header')

    @include('admin.alerts.alert-section.success')
    <main id="main-body-two-col" class="container-xxl body-container">
        @yield('content')
    </main>

    {{-- using sweetalert --}}
    @include('admin.alerts.sweetalerts.success')
    @include('admin.alerts.sweetalerts.error')

    @include('customer.layouts.footer')
    @include('customer.layouts.scripts')
    @yield('script')
</body>

</html>
