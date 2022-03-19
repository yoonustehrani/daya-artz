<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" as="font" href="{{ asset("fonts/IRANSansWeb.ttf") }}" type="font/ttf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>@yield('title') | دایا آرتز</title>
    @stack('head')
</head>
<body>
    <header class="header">
        <x-header />
        @yield('header')
    </header>
    @yield('content')
    <footer class="section w-100 footer mt-5">
        <x-footer />
    </footer>
    <script>APP_PATH = "{{ asset('/') }}";</script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>