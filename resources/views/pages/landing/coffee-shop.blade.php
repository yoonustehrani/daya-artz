<!DOCTYPE html>
<html lang="en" class="w-full h-full overflow-x-hidden overflow-y-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->title }}</title>
    <link rel="stylesheet" href="{{ mix('css/landing.css') }}">
    <style>
        .text-with-shadow {
            text-shadow: -0.125rem 0.25rem 2px rgba(0,0,0,0.7);
        }
    </style>
</head>
<body class="w-full h-full">
    <header class="w-full h-fit bg-coffeeshop bg-left-top bg-cover bg-no-repeat bg-fixed pb-10">
        <nav id="header-nav" class="h-14 w-full p-2 md:px-6 bg-black/50 text-slate-50 text-lg flex flex-nowrap justify-between md:relative z-20 overflow-hidden top-0 animated [animation-duration:0.2s]">
            <div class="flex flex-nowrap items-center">
                <span id="menu-open" class="duration-200"><i class="far fa-bars md:hidden ml-3 text-4xl"></i></span>
                <a href="{{ route("home") }}" class="ml-3 h-[calc(100%_+_0.5rem)]">
                    <img 
                        data-src="{{ asset('images/daya-white-logo.png') }}"
                        {{-- data-src="{{ asset(get_setting("header.menu.logo")) }}" --}}
                        alt="دایا آرتز" class="lazyload h-full">
                </a>
                <div id="menu-list" class="p-3 md:p-0 absolute md:static -right-full top-0 duration-700 w-5/6 sm:w-3/5 md:w-fit max-w-2xl md:max-w-none z-30 h-full bg-gradient-to-br from-indigo-700 to-indigo-500 md:h-auto md:bg-none md:inline-block">
                    <div class="w-full flex justify-between items-center md:hidden">
                        <a href="{{ route("userarea") }}" class="flex items-center"><span class="text-2xl ml-2"><i class="far fa-user-circle"></i></span>ورود به حساب کاربری</a>
                        <span id="menu-close"><i class="far fa-times text-4xl"></i></span>
                    </div>
                    <p class="text-xl text-center my-4 md:hidden">DAYAARTZ<img data-src="{{ asset('/images/daya-logo-circular.png') }}" alt="لوگوی دایا" class="lazyload mr-2 align-middle w-10 inline-block"></p>
                    <ul class="p-0 mt-4 md:mt-0 flex flex-nowrap flex-col md:flex-row justify-start items-start md:items-center overflow-y-auto h-[calc(100%_-_(80px_+_2rem))] hide-scroll">
                        <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("home") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-home"></i> خانه</a></li>
                        <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("about") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-address-card"></i> درباره ما</a></li>
                        <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 hidden md:block"><a href="{{ route("userarea") }}">ورود به حساب</a></li>
                        <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("contact") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-user-headset"></i> پشتیبانی</a></li>
                    </ul>
                </div>
            </div>
            <div class="flex items-center flex-nowrap">
                {{-- <a href="#order_page" class="rounded-full py-0.5 px-4 border-2 border-slate-50 duration-300 hover:border-transparent hover:bg-slate-50 hover:text-indigo-500 flex justify-center items-center group">
                    <i class="far fa-plus ml-2 group-hover:text-indigo-500 duration-300"></i>
                    سفارش
                </a> --}}
                <a href="tel:+989015045025" class="header-icon rounded-full bg-slate-50 p-1 duration-300 border-2 border-transparent hover:border-purple-500 cursor-pointer mr-3 w-10 h-10 flex justify-center items-center">
                    <i class="far fa-phone text-slate-900 duration-300 text-xl"></i>
                </a>
            </div>
        </nav>
        {{-- backdrop-blur-sm backdrop-opacity-70 md:backdrop-opacity-50 --}}
        <div class="w-fit max-w-full lg:max-w-[45%] mt-5 lg:mt-40 lg:mb-10 text-slate-50 px-4 text-justify pb-10">
            <p class="inline bg-black/70 md:bg-black/40 text-4xl font-bold px-2 rounded-lg leading-relaxed text-with-shadow">میدونی چقدر ایده های جذاب طراحی گرافیک می تونه کافی شاپتون رو ایده آل کنه ؟</p>
            <br>
            <br>
            <p class="inline bg-black/70 md:bg-black/40 text-2xl px-2 leading-relaxed text-white">اگه صاحب کافی شاپ هستید و یا در حال افتتاح همچین جایی هستی،‌ شمارت رو تو باکس این زیر برامون بزار تا باهات تماس بگیریم و کلی ایده رو با شما در میون بزاریم.</p>
            <form class="block w-fit p-4" onsubmit="void()">
                <div class="flex flex-col md:flex-row items-center justify-center gap-4">
                    <div class="p-3 font-semibold">
                        <div>
                            <label class="text-with-shadow" for="time-morning">تماس از ساعت 8 الی 14</label>
                            <input type="radio" name="time-to-call" id="time-morning">
                        </div>
                        <div>
                            <label class="text-with-shadow" for="time-evening">تماس از ساعت 17 الی 21</label>
                            <input type="radio" name="time-to-call" id="time-evening">
                        </div>
                    </div>
                    <div class="p-3">
                        <input
                        class="text-left placeholder:text-right [direction:ltr] text-xl form-input bg-black/50 px-4 py-3 rounded-md border-transparent shadow-sm focus:outline-none focus:border-gray-600 focus:ring focus:ring-white focus:ring-opacity-10" 
                        {{-- focus:ring focus:ring-gray-900 focus:ring-opacity-10 --}}
                        type="text" name="phone_number" placeholder="شماره موبایل">
                    </div>
                </div>
                <div class="w-full px-3">
                    <button class="float-left text-gray-800 text-xl bg-gray-300/80 py-1 px-6 rounded-md shadow-md" type="button">ارسال</button>
                </div>
            </form>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
</body>
</html>