<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preload" as="style" href="{{ mix("css/_fonts.css") }}">
    <link rel="stylesheet" href="{{ mix("css/_fonts.css") }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    @stack('head')
    @include('components.gstag')
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
    <script>
        APP_PATH = "{{ asset('/') }}";
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    @stack('scripts')
</body>
</html>