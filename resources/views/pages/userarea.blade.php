<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>حساب کاربری دایا آرتز</title>
    <style>
        .cursor-pointer {
            cursor: pointer;
        }
        .shadowed-text {
            text-shadow: 0 0 5px rgba(255,255,255,0.3),
            0 0 10px rgba(255,255,255,0.3),
            0 0 15px rgba(255,255,255,0.3),
            0 0 20px rgba(255,255,255,0.3),
            0 0 30px rgba(255,255,255,0.3);
        }
        /* .discounts {
            display: grid;
            
        } */
        .discount-item {
            background-image: linear-gradient(to right top,
            #a97df3,
            #6332df)
        }
        .discount-item > div {
            display: grid;
            place-content: center;
            place-items: center;
            background-image: url('{{ asset("images/discount-background.png") }}');
            background-size: cover;
            background-position: top;
        }
        .bg-pink {
            background-color: #ea8e9a;
        }
    </style>
</head>
<body>
    <div id="main"></div>
    <script>
        const APP_PATH = "{{ asset('/') }}"
        const API_BASE_URL = "{{ route('api.') }}"
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/userarea.js') }}"></script>
</body>
</html>