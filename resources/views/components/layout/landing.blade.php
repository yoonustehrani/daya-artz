<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('/css/landing.css') }}">
    <title>{{ $title }}</title>
</head>
<body>
    <header class="h-auto w-full py-2 px-6 bg-gradient-to-r from-indigo-500 to-indigo-600">
        @include('components.layout.menu')
        {{ $header }}
    </header>
    {{ $slot }}
</body>
</html>