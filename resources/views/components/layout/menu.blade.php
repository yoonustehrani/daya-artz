<nav id="header-nav" class="h-14 w-full p-2 md:px-6 bg-gradient-to-r from-indigo-500 to-indigo-700 text-slate-50 text-lg flex flex-nowrap justify-between md:relative z-20 overflow-hidden top-0 animated [animation-duration:0.2s]">
    <div class="flex flex-nowrap items-center">
        <span id="menu-open" class="duration-200"><i class="far fa-bars md:hidden ml-3 text-4xl"></i></span>
        <a href="{{ route("home") }}" class="ml-3 h-[calc(100%_+_0.5rem)]"><img src="{{ asset(get_setting("header.menu.logo")) }}" alt="daya-logo" class="h-full"></a>
        <div id="menu-list" class="p-3 md:p-0 absolute md:static -right-full top-0 duration-700 w-5/6 sm:w-3/5 md:w-fit max-w-2xl md:max-w-none z-30 h-full bg-gradient-to-br from-indigo-700 to-indigo-500 md:h-auto md:bg-none md:inline-block">
            <div class="w-full flex justify-between items-center md:hidden">
                <a href="{{ route("userarea") }}" class="flex items-center"><span class="text-2xl ml-2"><i class="far fa-user-circle"></i></span>ورود به حساب کاربری</a>
                <span id="menu-close"><i class="far fa-times text-4xl"></i></span>
            </div>
            <p class="text-xl text-center my-4 md:hidden">DAYAARTZ<img src="{{ asset('/images/daya-logo-circular.png') }}" alt="daya-logo" class="mr-2 align-middle w-10 inline-block"></p>
            <ul class="p-0 mt-4 md:mt-0 flex flex-nowrap flex-col md:flex-row justify-start items-start md:items-center overflow-y-auto h-[calc(100%_-_(80px_+_2rem))] hide-scroll">
                <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("home") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-home"></i> خانه</a></li>
                <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("about") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-address-card"></i> درباره ما</a></li>
                <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 hidden md:block"><a href="{{ route("userarea") }}">ورود به حساب</a></li>
                <li class=" md:mx-3 xl:mx-6 p-0 md:p-2 my-4 md:my-0 duration-300 border-b-transparent border-b-2 hover:border-b-sky-400 text-xl md:text-base"><a href="{{ route("contact") }}"><i class="md:hidden ml-3 text-xl align-middle far fa-user-headset"></i> پشتیبانی</a></li>
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
