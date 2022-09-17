<!DOCTYPE html>
<html lang="fa" class="w-full h-full m-0 p-0 overflow-x-hidden overflow-y-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page->title }}</title>
    <link rel="stylesheet" href="{{ mix('css/landing.css') }}">
</head>
<body class="w-full h-full m-0 p-0">
    <header class="w-full h-fit bg-coffeeshop-medium lg:bg-coffeeshop 2xl:bg-coffeeshop-high bg-left-top bg-cover bg-no-repeat md:bg-fixed pb-10">
        <nav id="header-nav" class="h-14 w-full p-2 md:px-6 bg-black/50 text-slate-50 text-lg flex flex-nowrap justify-between md:relative z-20 overflow-hidden top-0 animated [animation-duration:0.2s]">
            <div class="flex flex-nowrap items-center">
                <span id="menu-open" class="duration-200"><i class="far fa-bars md:hidden ml-3 text-4xl"></i></span>
                <a href="{{ route("home") }}" class="ml-3 h-[calc(100%_+_0.5rem)]">
                    <img 
                        data-src="{{ asset('images/daya-white-logo.png') }}"
                        alt="دایا آرتز" class="lazyload h-full">
                </a>
                <div id="menu-list" class="p-3 md:p-0 fixed md:static -right-full top-0 duration-700 w-5/6 sm:w-3/5 md:w-fit max-w-2xl md:max-w-none z-30 h-full bg-gradient-to-br from-slate-800/[98%] to-slate-900/[98%] md:h-auto md:bg-none md:inline-block">
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
                <a href="tel:+989015045025" class="header-icon rounded-full bg-slate-50 p-1 duration-300 border-2 border-transparent hover:border-amber-500 cursor-pointer mr-3 w-10 h-10 flex justify-center items-center">
                    <i class="far fa-phone text-slate-900 duration-300 text-xl"></i>
                </a>
            </div>
        </nav>
        <div class="w-fit max-w-full lg:max-w-[45%] mt-5 lg:mt-40 lg:mb-10 text-slate-50 px-4 text-justify pb-10">
            <h1 class="inline bg-black/70 md:bg-black/40 text-4xl font-bold px-2 rounded-lg leading-relaxed text-with-shadow">جذب مشتری و فروش بیشتر در کافی شاپ چه راه حل هایی دارد؟</h1>
            <br>
            <br>
            <p class="inline bg-black/70 md:bg-black/40 text-2xl px-2 leading-relaxed text-white">دایا آرتز یک استارت آپ طراحی گرافیک است.</p>
            <br>
            <br>
            <p class="inline bg-black/70 md:bg-black/40 text-xl px-2 leading-relaxed text-white">همین حالا با ثبت شماره خود، گام اول در مسیر جذب مشتری بیشتر برای کافی شاپ یا کافه رستوران خود را بردارید.</p>
            <div id="react_form" header-form-url="{{ route('api.forms.store', ['key' => 'coffeeshop-landing-header']) }}"></div>
        </div>
    </header>
    {{-- Client types title --}}
    <div class="mt-10 mb-4 py-3 text-center w-full grid place-content-center place-items-center">
        <div class="w-fit grid place-content-center place-items-center text-gray-800">
            <h2 class="font-bold text-2xl">خدمات طراحی گرافیک برای انواع کافی شاپ ها</h2>
            <span class="h-px w-[80%] block bg-gray-800 mt-8"></span>
            <div class="rounded-full bg-white w-10 h-10 -mt-6 z-10 text-lg flex items-center justify-center">
                <i class="far text-2xl fa-coffee-togo"></i>
            </div>
        </div>
    </div>
    {{-- Client types --}}
    <section class="p-3 w-full flex flex-col items-center gap-8 mb-10">
        <div class="w-11/12 md:w-5/6 p-3 flex flex-col items-center md:flex-row md:justify-center">
            <div class="p-3 h-[300px] relative">
                <img class="h-full opacity-30 lazyload" data-src="{{ asset('images/landing/coffee/coffeeshop-back.svg') }}" alt="">
                <img class="h-full absolute z-10 -bottom-2 left-0 lazyload" data-src="{{ asset('images/landing/coffee/coffeeshop.svg') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                {{-- <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span> --}}
                <h4 class="text-gray-800 text-2xl font-bold my-4">کافی شاپ</h4>
                <p class="text-gray-600">
                    برای راه اندازی هر کافی شاپ از هر نوعی یا ترمیم و باز طراحی برند کافی شاپ ها، همراه شما خواهیم بود. تا با جلوگیری از هزینه های اضافی در طراحی و تبلیغات، شاهد رشد کسب و کار خود باشید. از طراحی لوگو و پیج اینستاگرام تا طراحی منو و کارت ویزیت برای کافی شاپ شما به شکل متفاوتی طراحی می‌شود!
                </p>
            </div>
        </div>
        <div class="w-11/12 md:w-5/6 p-3 flex flex-col items-center md:flex-row md:justify-center [direction:ltr]">
            <div class="p-3 h-[300px] relative">
                <img class="h-full opacity-30 lazyload" data-src="{{ asset('images/landing/coffee/coffee-restaurant-back.svg') }}" alt="">
                <img class="h-full absolute z-10 -bottom-8 left-0 lazyload" data-src="{{ asset('images/landing/coffee/coffee-restaurant.svg') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                {{-- <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span> --}}
                <h4 class="text-gray-800 text-2xl font-bold my-4">کافه رستوران</h4>
                <p class="text-gray-600">
                    مدیریت و افزایش فروش یک کافه رستوران کار آسانی نیست! بازاریابی و تبلیغات هدفمند و ایجاد یک برند مشهور از چشم انداز های مهم هر صاحب کافه رستورانی است. اگر شما یک کافه رستوران را اداره می‌کنید دایا آرتز برای توسعه برند و  طراحی تبلیغاتی شما حرف هایی دارد
                </p>
            </div>
        </div>
        <div class="w-11/12 md:w-5/6 p-3 flex flex-col items-center md:flex-row md:justify-center">
            <div class="p-3 h-[300px] relative">
                <img class="h-full opacity-30 lazyload" data-src="{{ asset('images/landing/coffee/takeaway-back.svg') }}" alt="">
                <img class="h-full absolute z-10 bottom-3 left-0 lazyload" data-src="{{ asset('images/landing/coffee/takeaway.svg') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                {{-- <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span> --}}
                <h4 class="text-gray-800 text-2xl font-bold my-4">کافه takeaway</h4>
                <p class="text-gray-600">
                    اگر صاحب یک کافی شاپ بیرون بر هستید یا مدیریت یک کافه Takeaway را برعهده دارید، دایا آرتز برای جذب مشتری جدید و ثابت کردن مشتری های کافه شما ایده های متفاوتی داره. از طراحی کم هزینه پیج ایسنتاگرام و ایده های تولید محتوایی تا طراحی بسته بندی های جذاب و  ایده های خلاقانه بر اساس پتانسیل های کافی شاپ شما!
                </p>
            </div>
        </div>
    </section>
    {{-- Services --}}
    <section class="w-full px-3 py-10 bg-coffeeshop-pattern text-classy-orange bg-cover bg-no-repeat bg-left-top grid grid-cols-1 gap-8 md:grid-cols-3 md:gap-0 place-content-center">
        <ul class="p-5 pb-0 md:pb-5 flex flex-col justify-around gap-4 items-start md:items-end md:gap-0 py-5 font-semibold text-lg md:text-xl">
            <li class="">
                <span>طراحی منو برای کافی شاپ</span>
                <img class="inline w-10 ml-2 md:ml-0 float-right md:float-none md:w-auto lazyload" data-src="{{ asset('images/landing/coffee/21.png') }}" alt="">
            </li>
            <li class="md:ml-10 ">
                <span>طراحی بروشور و کاتالوگ تبلیغاتی</span>
                <img class="inline w-10 ml-2 md:ml-0 float-right md:float-none md:w-auto md:mr-2 lazyload" data-src="{{ asset('images/landing/coffee/22.png') }}" alt="">
            </li>
            <li class="">
                <span>طراحی کارت ویزیت کافی شاپی</span>
                <img class="inline w-10 ml-2 md:ml-0 float-right md:float-none md:w-auto md:mr-2 lazyload" data-src="{{ asset('images/landing/coffee/20.png') }}" alt="">
            </li>
        </ul>
        <div class="flex flex-col justify-center items-center order-first md:order-none">
            <img class="lazyload" data-src="{{ asset('images/landing/orange-logo.png') }}" alt="">
            <p class="text-4xl text-center font-semibold leading-relaxed">خدمات دایا آرتز<br>متناسب با کافی شاپ شما</p>
        </div>
        <ul class="p-5 pb-0 md:pb-5 flex flex-col justify-around gap-4 items-start md:gap-0 py-5 font-semibold text-lg md:text-xl">
            <li>
                <img class="inline w-10 md:w-auto lazyload" data-src="{{ asset('images/landing/coffee/24.png') }}" alt="">
                <span>طراحی و ترمیم لوگو کافی شاپ</span>
            </li>
            <li class="md:mr-10">
                <img class="inline w-10 md:w-auto lazyload" data-src="{{ asset('images/landing/coffee/26.png') }}" alt="">
                <span>طراحی پوستر کافه گالری</span>
            </li>
            <li>
                <img class="inline w-10 md:w-auto lazyload" data-src="{{ asset('images/landing/coffee/23.png') }}" alt="">
                <span>طراحی قالب های  اینستاگرامی</span>
            </li>
        </ul>
    </section>
    {{-- Ideas title --}}
    <div class="mt-10 py-3 text-center w-full grid place-content-center place-items-center">
        <div class="w-fit grid place-content-center place-items-center text-gray-800">
            <h2 class="font-bold text-2xl">طراحی گرافیک مکمل ایده های تبلیغاتی</h2>
            <span class="h-px w-[80%] block bg-gray-800 mt-8"></span>
            <div class="rounded-full bg-white w-10 h-10 -mt-5 z-10 text-lg flex items-center justify-center">
                <i class="far text-2xl fa-lightbulb"></i>
            </div>
        </div>
    </div>
    {{-- Ideas --}}
    <section class="p-3 w-full flex flex-col items-center mb-10">
        <div class="w-11/12 md:w-4/5 p-3 flex flex-col items-center md:flex-row md:justify-center">
            <div class="p-3 h-full">
                <img class="max-h-[350px] lazyload" data-src="{{ asset('images/landing/idea-3.png') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span>
                <h4 class="text-gray-800 text-2xl font-bold my-4">جلوه اینستاگرامی کافی شاپ</h4>
                <p class="text-gray-600">
                    دلتون می خواد با طراحی کارت ویزیت های جذاب و روش های مدیریت طراحی محور مشتری های کافی شاپ خودتون رو دائمی کنید؟! معجزه طراحی گرافیک میزان رفت و آمد به کافی شاپ ها رو زیاد می کنه.
                </p>
            </div>
        </div>
        <div class="w-11/12 md:w-4/5 p-3 flex flex-col items-center md:flex-row md:justify-center [direction:ltr]">
            <div class="p-3 h-full">
                <img class="max-h-[350px] lazyload" data-src="{{ asset('images/landing/idea-2.png') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span>
                <h4 class="text-gray-800 text-2xl font-bold my-4">"کوپن های تخفیف شما" با "طراحی خاص ما" !</h4>
                <p class="text-gray-600">
                    - مشتری ها عاشق تخفیف هستند و کافی شاپی که به آن ها تخفیف بدهد را پاتوق خود می‌کنند. حالا در نظر بگیرید که کوپن های تخفیف شما به شدت خاص باشند،  زیبا و جذاب همراه با لوگو و رنگ برند شما!
                    <br>
                    <span class="font-semibold text-gray-700 text-lg block mt-3">کوپن تخفیف خاص = برندسازی + جذب مشتری</span>
                </p>
            </div>
        </div>
        <div class="w-11/12 md:w-4/5 p-3 flex flex-col items-center md:flex-row md:justify-center">
            <div class="p-3 h-full">
                <img class="max-h-[350px] lazyload" data-src="{{ asset('images/landing/idea-1.png') }}" alt="">
            </div>
            <div class="p-3 pt-5 md:w-3/5">
                <span class="bg-amber-600 text-slate-50 p-1 px-3 rounded-lg inline-block text-lg font-semibold">ایده پیشنهادی</span>
                <h4 class="text-gray-800 text-2xl font-bold my-4">گرافیتی یا دیوارنگاری</h4>
                <p class="text-gray-600">
                    دلتون می خواد با طراحی کارت ویزیت های جذاب و روش های مدیریت طراحی محور مشتری های کافی شاپ خودتون رو دائمی کنید؟! معجزه طراحی گرافیک میزان رفت و آمد به کافی شاپ ها رو زیاد می کنه.
                </p>
            </div>
        </div>
    </section>
    {{-- Packages --}}
    <section class="w-full py-5 h-auto bg-coffee-pattern bg-repeat bg-left-top flex flex-col gap-3 justify-center items-center">
        <div class="w-full py-3 text-center grid place-content-center place-items-center">
            <div class="w-fit bg-white/50 backdrop-blur-md grid place-content-center place-items-center text-gray-800 p-3 rounded-md">
                <h2 class="font-bold text-2xl text-gray-700">بسته های خدماتی متناسب با اهداف شما</h2>
                <span class="h-px w-[80%] block bg-gray-700 mt-8"></span>
                <div class="rounded-full bg-gray-700 text-amber-500 w-10 h-10 -mt-5 z-10 text-lg flex items-center justify-center">
                    <i class="far text-2xl fa-box"></i>
                </div>
            </div>
        </div>
        {{-- 
        <div class="w-full md:w-11/12 backdrop-blur-sm p-5 rounded-md shadow-lg md:text-lg font-semibold
        grid gap-4 md:gap-8 auto-cols-[95%] md:auto-cols-auto grid-flow-col md:grid-flow-row
        md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 md:place-content-around overflow-x-auto snap-x snap-mandatory md:snap-none --}}
        <div class="w-full md:w-11/12 backdrop-blur-sm p-5 rounded-md shadow-lg md:text-lg font-semibold
        flex md:flex-wrap md:justify-center items-stretch
        overflow-x-auto snap-x snap-mandatory md:snap-none">
            <div class="px-3 py-5 snap-always snap-center bg-amber-500 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">افتتاح کافه رستوران</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">راه اندازی تخصصی برای کافه رستوران</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی لوگو ترکیبی</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منوی تراکتی</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کارت ویزیت</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی قالب اینستاگرام</span>
                            <span class="text-sm align-middle">پست و استوری</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی بنر شبکه های اجتماعی</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">5.950</span>
                        <sub>/</sub>
                        <span>میلیون تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-always snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">افتتاح کافی شاپ</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">راه اندازی اقتصادی برای همه کافی شاپ</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی لوگو تصویری</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منو تراکتی</span>
                            <span class="text-sm align-middle">پلن استاندارد</span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">3.950</span>
                        <sub>/</sub>
                        <span>میلیون تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-always snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">افزایش فروش کافی شاپ</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">جذب مشتری بیشتر با آیتم های خلاقانه</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کوپن تخفیف</span>
                            <span class="text-sm align-middle">ویژه کافی شاپ شما</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>قالب پست اینستاگرام</span>
                            <span class="text-sm align-middle">تک پست</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کارت ویزیت</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">780</span>
                        <sub>/</sub>
                        <span>هزار تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">بازسازی برند کافی شاپ شما</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">ری ‌برندینگ و بازطراحی برند کافی شاپ</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>بازطراحی لوگو</span>
                            <span class="text-sm align-middle">ارتقا و ترمیم</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>باز طراحی منو</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کارت ویزیت</span>
                            <span class="text-sm align-middle">پلن اقتصادی</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی پیج اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">2.200</span>
                        <sub>/</sub>
                        <span>میلیون تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">طراحی منو کافی شاپ و کافه رستوران</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">طراحی منو برای همه آیتم ها!</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منو بار سرد</span>
                            <span class="text-sm align-middle">پلن استاندارد</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منو بار گرم</span>
                            <span class="text-sm align-middle">پلن استاندارد</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منو صبحانه</span>
                            <span class="text-sm align-middle">پلن استاندارد</span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی منو شام و ناهار</span>
                            <span class="text-sm align-middle">پلن استاندارد</span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">1,900</span>
                        <sub>/</sub>
                        <span>هزار تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">طراحی پیج اینستاگرام کافی شاپ</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">طراحی قالب هماهنگ اینستاگرام</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی آواتار اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کاور هایلایت اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی قالب استوری اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی قالب پست اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">1,500</span>
                        <sub>/</sub>
                        <span>هزار تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
            <div class="snap-center bg-amber-500 px-3 py-5 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-3 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
                <div class="flex flex-col items-center">
                    <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
                        <h3 class="text-amber-600 text-xl font-bold text-center">طراحی تخصصی پیج اینستاگرام</h3>
                    </div>
                    <p class="underline decoration-2 underline-offset-[9px]">طراحی تخصصی پیج اینستاگرام</p>
                    <ul class="w-full list-inside my-4 leading-loose text-lg">
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی آواتار اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی کاور هایلایت اینستاگرام</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی خاص 10 پست اینستاگرامی</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                        <li class="px-3 my-2 flex justify-between items-center">
                            <span><i class="fas fa-check-circle ml-2"></i>طراحی خاص 10 استوری اینستاگرامی</span>
                            <span class="text-sm align-middle"></span>
                        </li>
                    </ul>
                </div>
                <div class="relative flex flex-col items-center justify-center w-full">
                    <div class="text-center my-5">
                        <span class="text-4xl">4,500</span>
                        <sub>/</sub>
                        <span>هزار تومان</span>
                    </div>
                    <button class="my-2 font-semibold duration-300 bg-white text-amber-500 hover:bg-amber-600 hover:text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
                </div>
            </div>
        </div>
    </section>
    {{-- Mvp form --}}
    <div class="mt-10 py-3 text-center w-full grid place-content-center place-items-center">
        <div class="w-fit grid place-content-center place-items-center text-gray-800">
            <h2 class="font-bold text-2xl">فرم درخواست خدمات دایا آرتز</h2>
            <span class="h-px w-[80%] block bg-gray-800 mt-8"></span>
            <div class="rounded-full bg-white w-10 h-10 -mt-5 z-10 text-lg flex items-center justify-center">
                <i class="far text-2xl fa-paperclip"></i>
            </div>
        </div>
    </div>
    <section class="w-full p-3 mb-10 grid grid-cols-1 md:grid-cols-2">
        <div id="react-coffeeshop-form" data-show="{{ route('api.forms.show', ['key' => 'coffeeshop-landing']) }}" data-store="{{ route('api.forms.store', ['key' => 'coffeeshop-landing']) }}" class="p-3 flex flex-col items-center text-gray-900 xl:pl-6"></div>
        <div class="p-3 xl:pr-6">
            <img src={{ asset('images/landing/mvp-form.jpg') }} alt="coffe" class="w-full xl:w-4/5 mx-auto md:mr-[initial] shadow-lg shadow-orange-500/50 rounded-md" />
            <p class="text-lg md:text-xl w-full xl:w-4/5 mx-auto md:mr-[initial] mt-5 md:mt-12 leading-loose md:leading-loose">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی </p>
        </div>
    </section>
    {{-- Startup path - six --}}
    <section class="w-full flex justify-center bg-[#3f403d] px-0 2xl:px-4 font-bold text-gray-800">
        <div class="w-full lg:w-11/12 xl:w-10/12 2xl:w-4/5 4k:w-3/5 md:grid flex justify-start px-2 py-4 md:px-1 lg:p-5 items-center md:grid-cols-3 md:grid-rows-2 place-items-center snap-mandatory md:snap-none overflow-x-auto md:overflow-x-hidden overflow-y-hidden h-72 md:h-auto">
            {{-- ITEM 1 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle border-classy-orange border-b-transparent rotate-45 flex justify-center items-center overflow-hidden">
                    <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto relative box-border bg-white rotate-[-45deg] flex justify-center p-5 rounded-full">
                        <p class="text-center p-3 xl:p-6 h-full rounded-full flex justify-center items-center text-base lg:text-xl 2xl:text-2xl 4k:text-3xl">جمع آوری اطلاعات و تعیین اهداف تبلیغاتی</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">01</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot md:my-4 left-1/2 top-1/2 -translate-x-1/2 md:left-0 md:top-0"><i class="text-classy-orange bg-[#3f403d] box-border p-3 md:p-5 rounded-full fas fa-circle"></i></span>
            </div>
            {{-- ITEM 2 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:mt-16 border-transparent border-b-classy-orange border-r-classy-orange flex justify-center items-center rotate-45">
                    <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">02</span>
                            </div>
                        </div>
                        <p class="text-center p-3 xl:p-6 h-full rounded-full flex justify-center items-center text-base lg:text-xl 2xl:text-2xl 4k:text-3xl">اعلام اهداف تبلیغاتی به دایا آرتز</p>
                    </div>
                </div>
                <span class="absolute-dot left-full -translate-x-1/2 md:left-0 md:translate-[initial] md:my-4">
                    <i class="text-classy-orange bg-[#3f403d] box-border p-3 md:p-5 rounded-full fas fa-circle"></i>
                </span>
            </div>
            {{-- ITEM 3 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle border-classy-orange border-b-transparent md:border-b-classy-orange border-r-transparent rotate-45 flex justify-center items-center">
                    <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        {{-- <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl grid place-content-center">لیست پیشنهادی طراحی های موردنیاز جهت دستیابی به هدفتان به شما ارائه می شود</p> --}}
                        <div class="text-center p-3 lg:pt-6 xl:p-6 xl:mt-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl">
                            <span class="text-base lg:text-xl 2xl:text-2xl 4k:text-3xl">پروسه تحقیقات</span>
                            <ol class="text-sm lg:text-base 2xl:text-xl 4k:text-2xl list-decimal list-inside text-center mt-1 md:mt-2 font-normal">
                                <li>آنالیز کسب و کار</li>
                                <li>آنالیز بازار</li>
                                <li>آنالیز رقبا</li>
                            </ol>
                        </div>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">03</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot right-[-33px] md:h-full md:w-full md:top-6 md:left-[initial] md:-right-2 md:z-10 md:items-end md:justify-center md:flex md:my-11">
                    <i class="text-classy-orange fas fa-circle p-6 rounded-full border-dashed border-2 border-transparent md:border-classy-orange md:border-l-transparent md:border-b-transparent rotate-45"></i>
                </span>
            </div>
            {{-- ITEM 6 --}}
            <div class="relative aspect-square md:w-full md:mt-0 order-6 md:order-4 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:mt-2 border-classy-orange border-t-transparent md:border-t-classy-orange md:border-l-transparent rotate-45 flex justify-center items-center">
                    <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">06</span>
                            </div>
                        </div>
                        <p class="text-center p-3 xl:p-6 h-3/4 mt-[25%] md:mt-0 rounded-full text-base lg:text-xl 2xl:text-2xl 4k:text-3xl grid place-content-center">ارائه طراحی های انجام شده<br>+<br>برنامه استفاده هدفمند</p>
                    </div>
                </div>
                {{-- class="bg-blue-400 absolute-dot md:-mt-2 -top-1/2 md:top-0 right-1/2 md:right-[initial] md:translate-[initial] translate-x-[40%] md:-left-[0.85rem]" --}}
                <span class="absolute-dot md:my-4 left-1/2 top-1/2 -translate-x-1/2 md:left-0 md:-top-5">
                    <i class="text-classy-orange fas fa-circle bg-[#3f403d] rounded-full box-border p-3 md:p-5"></i>
                </span>
            </div>
            {{-- ITEM 5 --}}
            <div class="relative aspect-square md:w-full md:mt-0 order-5 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:-mt-4 border-transparent border-t-classy-orange border-l-classy-orange rotate-45 flex justify-center items-center">
                    <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base lg:text-xl 2xl:text-2xl 4k:text-3xl grid place-content-center">انجام طراحی های برنامه ریزی شده</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">05</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot left-full -translate-x-1/2 md:left-0 md:translate-[initial] md:my-4 md:-top-5">
                    <i class="text-classy-orange bg-[#3f403d] box-border p-3 md:p-5 rounded-full fas fa-circle"></i>
                </span>
            </div>
            {{-- ITEM 4 --}}
            <div class="borderable-circle aspect-square md:mt-2 border-classy-orange border-t-transparent flex justify-center items-center border-l-transparent md:border-l-classy-orange rotate-45 order-4 md:order-6 snap-always snap-center h-full md:h-auto">
                <div class="w-[190px] h-[190px] md:w-full md:h-full mx-auto box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-0 md:p-5">
                    <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-[#3f403d] flex justify-center items-center p-2">
                        <div class="w-full h-full rounded-full bg-classy-orange flex justify-center items-center">
                            <span class="lg:text-4xl font-bold text-white mt-2">04</span>
                        </div>
                    </div>
                    <p class="text-center p-3 mt-[25%] md:mt-0 md:m-0 xl:p-6 h-3/4 rounded-full text-base lg:text-xl 2xl:text-2xl 4k:text-3xl grid place-content-center">تهیه لیست پیشنهادی طراحی های لازم برای دستیابی به هدف</p>
                </div>
            </div>
        </div>
    </section>
    {{-- FAQ --}}
    <section class="w-full flex flex-col items-center p-3 my-5">
        <div class="my-3 py-3 text-center w-full grid place-content-center place-items-center">
            <div class="w-fit grid place-content-center place-items-center text-gray-800">
                <h2 class="font-bold text-2xl">ممکن است از ما بپرسید</h2>
                <span class="h-px w-[80%] block bg-gray-800 mt-8"></span>
                <div class="rounded-full bg-white w-10 h-10 -mt-5 z-10 text-lg flex items-center justify-center">
                    <i class="fas text-2xl fa-question"></i>
                </div>
            </div>
        </div>
        <div class="w-full md:w-1/2 text-gray-700" id="faq-list">
            <div class="border-t border-gray-400 py-8 px-5 text-2xl">
                <div class="hover:cursor-pointer my-3">
                    <h4 class="inline w-fit font-semibold">بعد از ثبت سفارش، زمان تحویل هر سفارش چه قدر طول می کشه؟</h4>
                    <i class="inline float-left duration-300 fas fa-angle-up mt-2"></i>
                </div>
                <p class="text-base hidden text-gray-500 mt-5 mb-3">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                </p>
            </div>
            <div class="border-t border-gray-400 py-8 px-5 text-2xl">
                <div class="hover:cursor-pointer my-3">
                    <h4 class="inline w-fit font-semibold">پشتیبانی و پیگیری سفارش ها در دایا آرتز چگونه است ؟</h4>
                    <i class="inline float-left duration-300 fas fa-angle-up mt-2"></i>
                </div>
                <p class="text-base hidden my-3">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                </p>
            </div>
            <div class="border-t border-gray-400 py-8 px-5 text-2xl">
                <div class="hover:cursor-pointer my-3">
                    <h4 class="inline w-fit font-semibold">مراحل و شیوه های پرداخت هزینه سفارشات به چه صورت خواهد بود ؟</h4>
                    <i class="inline float-left duration-300 fas fa-angle-up mt-2"></i>
                </div>
                <p class="text-base hidden my-3">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                </p>
            </div>
            <div class="border-t border-gray-400 py-8 px-5 text-2xl">
                <div class="hover:cursor-pointer my-3">
                    <h4 class="inline w-fit font-semibold">دایا آرتز دیگه برای چه کسب و کار هایی طراحی می کنه؟</h4>
                    <i class="inline float-left duration-300 fas fa-angle-up mt-2"></i>
                </div>
                <p class="text-base hidden my-3">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد
                </p>
            </div>
        </div>
    </section>
    {{-- Footer --}}
    <footer class="w-full mt-5 bg-amber-700 text-white">
        <div class="bg-footer-pattern bg-cover bg-left bg-no-repeat p-8 pb-0 grid grid-cols-1 md:grid-cols-3 md:place-items-center justify-center gap-4">
            <div>
                <p class="text-xl font-bold mb-3">درباره ما</p>
                <div class="pt-2 text-sm">
                    <p>گروه طراحی دایا آرتز متشکل از تیمی با تجربه و حرفه ای در زمینه های طراحی گرافیـکی و تبلیغاتی در تلاش است بستر مناسبی را برای کسانی که نیازمند طراحی یا طراحی با کیفیت و در سطح بین المللی و همچنین درآمدزایی برای طراحان حرفه ای و درجه یک کشور ایران ایجاد سازد.</p>
                    <a id="enamad-logo" referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=269100&amp;Code=RUmxsLwfWAGM1kGgdjv4"></a>
                </div>
            </div>
            <div>
                <p class="text-xl font-bold mb-3">شماره تماس</p>
                <div class="pt-2">
                    <ul class="p-0 mb-4 footer-phones text-left w-fit">
                        <li class="[direction:ltr] my-2">
                            <i class="far fa-phone-office"></i>
                            <a href="tel:+982128423542">021 2842 3542</a>
                        </li>
                        <li class="[direction:ltr] my-2">
                            <i class="far fa-mobile"></i>
                            <a href="tel:+989015045025">0901 504 5025</a>
                        </li>
                        <li class="[direction:ltr] my-2">
                            <i class="far fa-mobile"></i>
                            <a href="tel:+989016045025">0901 604 5025</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <p class="text-xl font-bold mb-3">دایا مجازی</p>
                <div class="my-2 grid grid-cols-2 gap-3 text-2xl pt-2">
                    <a class="w-12 h-12 border-2 duration-300 hover:bg-social-media-instagram hover:border-social-media-instagram rounded-full flex justify-center items-center" href="https://instagram.com/dayaartz"><i class="fab fa-instagram"></i></a>
                    <a class="w-12 h-12 border-2 duration-300 hover:bg-social-media-telegram  hover:border-social-media-telegram rounded-full flex justify-center items-center" href="https://t.me/daya_artz"><i class="fab fa-telegram-plane"></i></a>
                    <a class="w-12 h-12 border-2 duration-300 hover:bg-social-media-linkedin  hover:border-social-media-linkedin rounded-full flex justify-center items-center" href="https://www.linkedin.com/company/dayaartz/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="w-12 h-12 border-2 duration-300 hover:bg-social-media-whatsapp  hover:border-social-media-whatsapp rounded-full flex justify-center items-center" href="https://wa.me/989016045025"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <p class="[direction:ltr] text-center w-full col-span-full">
                <span class="">&copy; 2022 Sampi Group. All rights reserved</span>
                <br>
                <span>کلیه حقوق این وب سایت محفوظ و متعلق به شرکت ارمغان کهکشان پارس می باشد</span>
            </p>
        </div>
    </footer>
    <script>
        const APP_PATH = "{{ asset('/') }}"
        const API_BASE_URL = "{{ route('api.') }}"
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
    <script src="{{ mix('js/landing-page.js') }}"></script>
</body>
</html>