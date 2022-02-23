<nav class="h-14 from-indigo-700 to-indigo-900">
    <div class="float-left">
        <a href="{{ route("home") }}"><img src="{{ asset(get_setting("header.menu.logo")) }}" alt="daya-logo" class="float-right h-full ml-4"></a>
        <ul class="p-0 flex flex-nowrap justify-right">
            <li class="mx-5"><a href="{{ route("userarea") }}" class="text-slate-50">ورود به حساب</a></li>
            <li class="mx-5"><a href="{{ route("contact") }}" class="text-slate-50">پشتیبانی</a></li>
        </ul>
        <a href="tel:+989015045025" class="rounded-full bg-slate-50 p-1 duration-300 hover:border hover:boder-slate-900 cursor-pointer mx-3">
            <i class="far fa-phone text-slate-900 duration-300"></i>
        </a>
        <a href="#order_page" class="rounded-full py-2 px-4 border-2 border-slate-50 text-slate-50 duration-300 hover:text-slate-700">
            سفارش
            <i class="far fa-plus text-slate-50 ml-1"></i>
        </a>
    </div>
    <div class="float-right"></div>
</nav>
