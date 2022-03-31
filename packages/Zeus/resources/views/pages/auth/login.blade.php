@extends('zview::layouts.auth')

@push('head')
    <title>Login to zeus</title>
@endpush

@section('body')
    <section class="h-full w-full flex justify-center items-center text-lg">
        <form class="bg-white bg-opacity-30 backdrop-blur shadow-lg rounded-md w-10/12 md:w-3/4 lg:w-1/2 xl:w-1/3 grid grid-cols-1 gap-6 place-items-center py-10" action="{{ route('zeus.auth.login') }}" method="post">
            @csrf
            <div>
                <img src="{{ asset('images/zeus-images/zeus-logoart-dark.png') }}" alt="Zeus logo">
                <p class="my-4 text-center text-2xl font-semibold">Login to ZeusCMS</p>
            </div>
            <div class="w-3/4">
                <label for="email">
                    <span><i class="fas mr-1 fa-user"></i> Email or Username</span>
                </label>
                <input class="w-full solid-input mt-2 ml-2" type="text" name="email" id="email" placeholder="Email or Username">
            </div>
            <div class="w-3/4">
                <label for="password">
                    <span><i class="fas mr-1 fa-lock"></i> Password</span>
                </label>
                <input class="w-full solid-input mt-2 ml-2" type="password" name="password" id="password" placeholder="Password">
            </div>
            <div>
                <button class="btn bg-ghost-white text-gray-700" type="submit">@lang('zlang::auth.login')</button>
            </div>
        </form>
    </section>
@endsection