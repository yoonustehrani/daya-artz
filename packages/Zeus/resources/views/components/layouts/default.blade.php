<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?: __('Untitled') }} - {{ sprintf(config('zconfig.package.name', now()->format('Y'))) }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/zeus/style.css') }}">
        @if (auth('zeus')->user()->lang == 'fa')
            <link rel="stylesheet" href="{{ asset('css/zeus/rtl.css') }}">
        @endif
        @stack('head')
        <style>
            .jsontext {
                border: 2px solid transparent;
                outline: none;
            }
            .jsontext.invalid, input.invalid {
                border-color: red;
            }
        </style>
    </head>
    <body class="h-full w-full overflow-hidden">
        <div class="bg-ghost-white w-full h-full overflow-hidden float-left">
            <x-zview::sidebar />
            <div class="bg-ghost-white w-full md:w-4/5 h-full float-left relative">
                <div id="main-scroller" class="w-full h-full float-left px-5 pt-5 pb-16 md:pb-5 overflow-x-hidden overflow-y-auto r-float">
                    {{ $slot }}
                </div>
            </div>
            <div id="alert-container" class="relative overflow-hidden">

            </div>
            <span id="menu-open" class="fixed w-10 h-10 rounded-full bg-slate-500 bottom-0 left-1/2 -translate-x-1/2 z-40 flex items-center justify-center md:hidden"><i class="fa fa-chevron-double-up text-2xl text-white"></i></span>
        </div>
        <form id="logout-form" action="{{ route('zeus.auth.logout') }}" method="post" class="d-none">@csrf</form>
        {{-- <p class="hidden">{{ sprintf(config('zconfig.copyright'), \Carbon\Carbon::now()->format('Y')) }}</p> --}}
        <script>
            APP_PATH = "{{ asset('/') }}"
            API_PATH = "{{ route('api.zeus.') }}"
            API_BASE_URL = "{{ route('api.') }}"
        </script>
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('js/zeus/app.js') }}"></script>
        @if (request()->session()->has('zeus.flash'))
        <script>
            Swal.fire({
                text: "{{ request()->session()->get('zeus.flash.message') }}",
                icon: "{{ request()->session()->get('zeus.flash.status') }}",
                heightAuto: false,
                timer: 2000
            })
        </script>
        @endif
        {{-- <script>
            // const ValidationErrors = {!! $errors->any() ? $errors->toJson() : '{}' !!};
        </script> --}}
        @stack('scripts')
    </body>
</html>