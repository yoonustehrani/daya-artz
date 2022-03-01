<!DOCTYPE html>
<html lang="en" dir="rtl" class="w-full h-auto m-0 p-0 overflow-x-hidden overflow-y-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/landing.css') }}">
    <title>{{ $title }}</title>
</head>
<body class="w-full h-auto m-0 p-0 overflow-x-hidden overflow-y-auto">
    <header class="h-auto w-full">
        @include('components.layout.menu')
        {{ $header }}
    </header>
    {{ $slot }}
    {{-- @include('components.layout.footer') --}}
</body>
</html>