<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description"
        content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/" />
    <!-- title -->
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FFruit - @yield('title', config('app.name', '@Master Layout'))</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/client/img/pngwing.com.png') }}" />
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/all.min.css') }}" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/client/bootstrap/css/bootstrap.min.css') }}" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/owl.carousel.css') }}" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}" />
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.css') }}" />
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/meanmenu.min.css') }}" />
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}" />
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/skeleton.css') }}" />
    @livewireStyles
</head>

<body>
    @include('client.layouts.header')
    @yield('content')
    @include('client.layouts.footer')
    @livewireScripts
    {{-- <script
        src="https://cdn.tiny.cloud/1/gtje48vypk7afklewocq1txo16z4yic70wq0rciugqqkzud4/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script> --}}
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <!-- jquery -->
    <script src="{{ asset('assets/client/js/jquery-1.11.3.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/client/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- count down -->
    <script src="{{ asset('assets/client/js/jquery.countdown.js') }}"></script>
    <!-- isotope -->
    <script src="{{ asset('assets/client/js/jquery.isotope-3.0.6.min.js') }}"></script>
    <!-- waypoints -->
    <script src="{{ asset('assets/client/js/waypoints.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('assets/client/js/owl.carousel.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- mean menu -->
    <script src="{{ asset('assets/client/js/jquery.meanmenu.min.js') }}"></script>
    <!-- sticker js -->
    <script src="{{ asset('assets/client/js/sticker.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
</body>

</html>