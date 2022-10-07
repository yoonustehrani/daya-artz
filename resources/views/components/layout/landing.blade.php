<!DOCTYPE html>
<html lang="en" dir="rtl" class="w-full h-full m-0 p-0 overflow-x-hidden overflow-y-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/landing.css') }}">
    <title>{{ $title }}</title>
    @include('components.gstag')
</head>
<body class="w-full h-full m-0 p-0 overflow-x-hidden overflow-y-auto fixed bg-body">
    <script>
        const APP_PATH = "{{ asset('/') }}"
        const API_BASE_URL = "{{ route('api.') }}"
        const APP_ROUTE = "{{ route('home') }}";
    </script>
    <header id="landing-header" class="h-auto w-full">
        @include('components.layout.menu')
        {{ $header }}
    </header>
    {{ $slot }}
    @include('components.layout.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
    @stack('scripts')
</body>
</html>