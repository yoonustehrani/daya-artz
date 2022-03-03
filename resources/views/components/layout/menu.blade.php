<nav id="header-nav" class="h-14 w-full p-2 md:px-6 bg-gradient-to-r from-indigo-500 to-indigo-700 text-slate-50 text-lg flex flex-nowrap justify-between md:relative z-20 overflow-hidden top-0 animated [animation-duration:0.2s]">
    <div class="flex flex-nowrap items-center">
        <span id="menu-open"><i class="far fa-bars md:hidden ml-3 text-4xl duration-300"></i></span>
        <a href="{{ route("home") }}" class="ml-3 h-[calc(100%_+_0.5rem)]"><img src="{{ asset(get_setting("header.menu.logo")) }}" alt="daya-logo" class="h-full"></a>
        <div id="menu-list" class="p-4 md:p-0 absolute md:static -right-full top-0 duration-500 w-3/4 md:w-fit max-w-2xl md:max-w-none z-30">
            <ul class="p-0 flex flex-nowrap justify-start">
                <li class="mx-3"><a href="{{ route("userarea") }}" class="duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 pb-2">ورود به حساب</a></li>
                <li class="mx-3"><a href="{{ route("contact") }}" class="duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 pb-2">پشتیبانی</a></li>
            </ul>
        </div>
    </div>
    <div class="flex items-center flex-nowrap">
        <a href="#order_page" class="rounded-full py-0.5 px-4 border-2 border-slate-50 duration-300 hover:border-transparent hover:bg-slate-50 hover:text-indigo-500 flex justify-center items-center group">
            <i class="far fa-plus ml-2 group-hover:text-indigo-500 duration-300"></i>
            سفارش
        </a>
        <a href="tel:+989015045025" class="header-icon rounded-full bg-slate-50 p-1 duration-300 border-2 border-transparent hover:border-purple-500 cursor-pointer mr-3 w-10 h-10 flex justify-center items-center">
            <i class="far fa-phone text-slate-900 duration-300 text-xl"></i>
        </a>
    </div>
</nav>
