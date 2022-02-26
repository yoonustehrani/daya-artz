<nav class="h-14 w-full py-2 px-6 bg-gradient-to-r from-indigo-500 to-indigo-700 flex flex-nowrap justify-between">
    <div class="flex flex-nowrap items-center">
        <a href="{{ route("home") }}" class="ml-3"><img src="{{ asset(get_setting("header.menu.logo")) }}" alt="daya-logo" class="w-12"></a>
        <ul class="p-0 flex flex-nowrap justify-start w-fit">
            <li class="mx-3 text-lg"><a href="{{ route("userarea") }}" class="text-slate-50 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 pb-3">ورود به حساب</a></li>
            <li class="mx-3 text-lg"><a href="{{ route("contact") }}" class="text-slate-50 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 pb-3">پشتیبانی</a></li>
        </ul>
    </div>
    <div class="flex items-center flex-nowrap">
        <a href="#order_page" class="rounded-full py-0.5 px-4 border-2 border-slate-50 text-slate-50 duration-300 hover:border-purple-500 text-lg flex justify-center items-center">
            <i class="far fa-plus text-slate-50 ml-2 text-lg"></i>
            سفارش
        </a>
        <a href="tel:+989015045025" class="header-icon rounded-full bg-slate-50 p-1 duration-300 border-2 border-transparent hover:border-purple-500 cursor-pointer mx-3 w-10 h-10 flex justify-center items-center">
            <i class="far fa-phone text-slate-900 duration-300 text-xl"></i>
        </a>
    </div>
</nav>
