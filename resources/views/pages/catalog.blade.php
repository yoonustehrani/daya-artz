<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/catalog.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>کاتالوگ دایا آرتز</title>
</head>
<body class="w-full h-full overflow-y-auto overflow-x-hidden p-0 m-0 bg-body fixed">
    <div id="react-catalog" class="h-full"></div>
    <script>
        const APP_PATH = "{{ asset('/') }}"
        const API_BASE_URL = "{{ route('api.') }}"
        const APP_ROUTE = "{{ route('home') }}";
    </script>
    <script src="{{ mix('js/catalog.js') }}"></script>
</body>
</html>