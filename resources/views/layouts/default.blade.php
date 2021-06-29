<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('head')
</head>
<body>
    <header class="header">
        @include('components.header')
        @yield('header')
    </header>
    @yield('content')
    <footer class="section w-100 footer">
        @include('components.footer')
    </footer>
</body>
</html>