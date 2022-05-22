<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="preload" as="style" href="{{ mix("css/_fonts.css") }}">
    <link rel="stylesheet" href="{{ mix("css/_fonts.css") }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <title>کاتالوگ دایا آرتز</title>
</head>
<body>
    <div id="main"></div>
    <script>
        const APP_PATH = "{{ asset('/') }}"
        const API_BASE_URL = "{{ route('api.') }}"
        const APP_ROUTE = "{{ route('home') }}";
    </script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
</body>
</html>