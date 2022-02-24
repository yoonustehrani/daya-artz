<nav class="h-14 from-indigo-700 to-indigo-900 flex flex-nowrap justify-between">
    <div class="flex items-center flex-nowrap">
        <a href="tel:+989015045025" class="rounded-full bg-slate-50 p-1 duration-300 hover:border-2 hover:border-purple-400 cursor-pointer mx-3 w-10 h-10 flex justify-center items-center">
            <i class="far fa-phone text-slate-900 duration-300 text-xl hover:text-purple-500"></i>
        </a>
        <a href="#order_page" class="rounded-full py-0.5 px-4 border-2 border-slate-50 text-slate-50 duration-300 hover:border-purple-200 text-lg flex justify-center items-center">
            سفارش
            <i class="far fa-plus text-slate-50 ml-2 text-lg"></i>
        </a>
    </div>
    <div class="flex flex-nowrap items-center">
        <ul class="p-0 flex flex-nowrap justify-start w-fit">
            <li class="mx-3 text-lg"><a href="{{ route("userarea") }}" class="text-slate-50 hover:text-purple-200 duration-300">ورود به حساب</a></li>
            <li class="mx-3 text-lg"><a href="{{ route("contact") }}" class="text-slate-50 hover:text-purple-200 duration-300">پشتیبانی</a></li>
        </ul>
        <a href="{{ route("home") }}" class="ml-3"><img src="{{ asset(get_setting("header.menu.logo")) }}" alt="daya-logo" class="w-14"></a>
    </div>
</nav>
