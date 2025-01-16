<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="{{ asset('output.css') }}" rel="stylesheet"> --}}
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logos/takoyaki-babon-logo.svg') }}" />
    <title>@yield('title', 'Takoyaki Babon | Beranda')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>

<body
    class="relative mx-auto w-full max-w-[1200px] overflow-x-hidden bg-white z-0 sm:max-w-[640px] md:max-w-[768px] lg:max-w-[1024px] xl:max-w-[1200px]">
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/home.js"></script>
    @livewireScripts

</body>
