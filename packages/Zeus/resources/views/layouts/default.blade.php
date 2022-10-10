<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    @stack('head')
    {{-- <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito&display=swap');
    </style> --}}
    <link rel="stylesheet" href="{{ asset('css/zeus/style.css') }}">
    @if (auth('zeus')->user()->lang == 'fa')
        <link rel="stylesheet" href="{{ asset('css/zeus/rtl.css') }}">
    @endif
    <style>
        .jsontext {
            border: 2px solid transparent;
            outline: none;
        }
        .jsontext.invalid, input.invalid {
            border-color: red;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="h-full w-full overflow-hidden">
    <div class="bg-ghost-white w-full h-full overflow-hidden float-left">
        <x-zview::sidebar />
        <div class="bg-ghost-white w-full md:w-4/5 h-full float-left relative">
            <div id="main-scroller" class="w-full h-full float-left p-5 overflow-x-hidden overflow-y-auto r-float">
                @if ($errors->any())
                    <p>Err</p>
                @endif
                {{-- @foreach ($errors->all() as $e)
                    <p>{{ $e }}</p>
                @endforeach --}}
            @yield('content')
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('zeus.auth.logout') }}" method="post" class="d-none">
        @csrf
    </form>
    {{-- <p class="hidden">{{ sprintf(config('zconfig.copyright'), \Carbon\Carbon::now()->format('Y')) }}</p> --}}
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/zeus/app.js') }}"></script>
    @stack('scripts')
</body>
</html>