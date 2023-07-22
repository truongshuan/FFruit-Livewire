<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FFruit Dashboard - @yield('title', config('app.name', '@Master Layout'))</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.tiny.cloud/1/gtje48vypk7afklewocq1txo16z4yic70wq0rciugqqkzud4/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <x-tinymce-config />
</head>

<body>
    @include('admin.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')

    @livewireScripts
    {{-- <script
        src="https://cdn.tiny.cloud/1/gtje48vypk7afklewocq1txo16z4yic70wq0rciugqqkzud4/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/vendor/tinymce/tinymce.min.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>

</body>

</html>