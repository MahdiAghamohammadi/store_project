<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')
</head>
<body dir="rtl">

    @include('admin.layouts.header')

    <section class="body-container">
        <!-- side bar -->
        @include('admin.layouts.sidebar')

        <!-- body of panel -->
        <section id="main-body" class="main-body">
            @yield('content')
        </section>
    </section>

    @include('admin.layouts.scripts')
    @yield('script')
    {{-- using toast alert --}}
    <section class="flex-row-reverse toast-wrapper">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>
    {{-- using sweetalert --}}
    @include('admin.alerts.sweetalerts.success')
    @include('admin.alerts.sweetalerts.error')
</body>
</html>
