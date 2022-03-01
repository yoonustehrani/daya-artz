<x-layout.landing :title="$page->title">
    {{-- start header --}}
    <x-slot name="header">
        {{-- <div class="w-full h-auto bg-gradient-to-r from-indigo-400 to-indigo-600 flex flex-nowrap items-stretch justify-between relative">
            <img src="{{ asset('/images/baloone-right-1.png') }}" alt="baloone-right" class="h-[600px]">
            <img src="{{ asset('/images/baloone-right-2.png') }}" alt="baloone-right" class="h-[600px] absolute right-0 bottom-[6%]">
            <div class="px-2 py-4 text-center flex flex-col justify-evenly items-center">
                <p class="text-4xl text-white w-full font-bold"><span class="text-cyan-300">همین حالا</span> سفارشت رو ثبت کن؛ <span class="text-cyan-300">زمان</span> محدودست</p>
                <ul class="p-0 flex flex-nowrap justify-center items-stretch w-full">
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">45<span class="text-gray-400 text-sm block">ثانیه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">59<span class="text-gray-400 text-sm block">دقیقه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">23<span class="text-gray-400 text-sm block">ساعت</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">09<span class="text-gray-400 text-sm block">روز</span></li>
                </ul>
                <div class="text-center text-2xl w-full text-white rtl leading-[2.5]">
                    <h3 class="font-bold text-[27px]"><span class="text-cyan-300">دایا آرتز</span> در <span class="text-cyan-300">جشنواره افتتاحیه</span> سایتش با رویکرد استارت آپی قصد دارد:</h3>
                    <p>فقط تا پایان مدت این زمان سنج، پکیج های هدف گذاری شده و خدمات یگانه خود را با <span class="text-cyan-300 italic">تخفیف افتتاحیه</span> به کسب و کار های حرفه ای ارائه دهد.
                        <br>
                        <b>زمان را محاسبه نکن! امروز دایا آرتز را کشف کنید.</b> بسته های بهینه شده برای کسب و کار شما آماده هستند.
                    </p>
                </div>    
            </div>
            <img src="{{ asset('/images/baloone-left-2.png') }}" alt="baloone-left" class="h-[600px] hidden md:inline">
            <img src="{{ asset('/images/baloone-left-1.png') }}" alt="baloone-left" class="h-[600px] hidden md:inline absolute left-0 bottom-[6%]">
        </div> --}}
    </x-slot>
    {{-- end header --}}
    {{-- start discount description --}}
    {{-- <div class="w-full my-6 px-12 flex justify-evenly items-stretch">
        <div class="text-2xl text-indigo-600 leading-loose">
            <span class="ml-1 align-middle"><i class="far fa-badge-percent text-3xl text-indigo-600"></i></span>
            <p class="inline"><b>تا 25 درصد تخفیف ویژه افتتاحیه سایت ما؛</b><br>یعنی استارت آپ طراحی گرافیک <b>دایا آرتز</b>...</p>
            <p>و همچنین فقط برای کسانی که خدمات یگانه و منحصر به فردی را می خواهند؛ خدمات تکی دایا آرتز را ضمن تحفیف آماده سفارش قرار دادیم.
            </p>
            <div class="flex justify-between items-center mt-4 flex-wrap text-lg text-slate-50">
                <div>
                    <button class="p-3 ml-2 rounded-2xl bg-orange-500 hover:bg-orange-600 duration-300">مشاهده پکیج ها</button>
                    <button class="p-3 mr-2 rounded-2xl bg-orange-500 hover:bg-orange-600 duration-300">مشاهده خدمات تکی</button>
                </div>
                <button class="p-3 rounded-2xl bg-indigo-500 hover:bg-indigo-600 duration-300">دریافت مشاوره</button>
            </div>
        </div>
        <img src="{{ asset("/images/daya-logo-opening.png") }}" alt="daya-logo" class="w-72 md:mr-12">
    </div>      --}}
    {{-- end discount description --}}
    {{-- start packages --}}
    {{-- <div class="w-full my-6 h-auto py-8 px-6 flex flex-wrap justify-evenly items-stretch bg-gradient-to-bl text-slate-50 from-indigo-600 to-indigo-500">
        <p class="mb-8 font-bold text-2xl w-full"><span class="ml-2 align-middle relative inline-block h-fit"><i class="fas fa-gift text-6xl"></i><i class="fas fa-badge-percent absolute right-1 bottom-0 text-2xl text-orange-500"></i></span>پکیج های بهینه برای نیاز خاص شما !</p>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
        <div class="md:w-2/5 lg:w-2/7 max-w-xs bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8">
            <h3 class="bg-slate-50 text-orange-500 rounded-full p-2 mb-4 mx-auto text-lg w-fit font-bold">بسته فضای مجازی</h3>
            <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
            <ul class="p-0 space-y-5 text-sm my-5">
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span>OFF 15%</span></li>
                <li class="flex justify-between items-center"><span class="align-middle"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span>OFF 15%</span></li>
            </ul>
            <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
            <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-600">ثبت سفارش</button>
        </div>
    </div> --}}
    {{-- end packages --}}
    {{-- start quick order form --}}
    {{-- <x-quick-order-form /> --}}
    {{-- end quick order form --}}
    {{-- start order methods --}}
    {{-- <div class="w-full h-68 my-6 bg-gradient-to-r from-indigo-600 to-indigo-400">
        <div class="w-full h-full py-6 px-10 bg-shaped bg-cover flex justify-between items-stretch">
            <div class="h-full text-right">
                <p class="font-bold text-4xl text-blue-200">روش های ثبت سفارش</p>
                <p class="text-2xl text-slate-50 my-5">علاوه بر سفارش سریع، می توانید از طریق روش های  زیر سفارش خود را ثبت کنید.</p>
            </div>
            <img src="{{ asset("/images/hand-point-lock.png") }}" alt="order-methods" class="h-full">
        </div>
    </div> --}}
    {{-- end order methods --}}
    {{-- start services --}}
    {{-- <div class="w-full h-auto my-6 px-10">
        <p class="mb-4 font-bold text-2xl w-full text-indigo-600"><span class="ml-2 align-middle relative inline-block h-fit"><i class="fas fa-arrow-alt-down text-8xl text-indigo-200"></i><i class="fal fa-percent absolute text-base left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-fuchsia-800 after:content-['OFF'] after:text-base after:mt-px after:font-bold flex flex-col items-center"></i></span>خدمات تکی طراحی گرافیک، آماده سفارش و طراحی!</p>
        <div class="w-full flex justify-evenly items-stretch flex-wrap">
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="far fa-sticky-note"></i></span>
                <h3 class="text-2xl my-5 font-bold">تراکت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-elementor"></i></span>
                <h3 class="text-2xl my-5 font-bold">منو رستوران و کافی شاپ</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-cc-discover"></i></span>
                <h3 class="text-2xl my-5 font-bold">کارت ویزیت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="far fa-sticky-note"></i></span>
                <h3 class="text-2xl my-5 font-bold">تراکت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-elementor"></i></span>
                <h3 class="text-2xl my-5 font-bold">منو رستوران و کافی شاپ</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
            <div class="relative md:w-2/5 lg:w-2/7 max-w-xs bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-6xl text-sky-200"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-cc-discover"></i></span>
                <h3 class="text-2xl my-5 font-bold">کارت ویزیت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-sky-500 px-5 py-2 duration-300 hover:bg-sky-700 text-slate-50">ثبت سفارش</button>
            </div>
        </div>
    </div> --}}
    {{-- end services --}}
    {{-- start daya opening --}}
    {{-- <div class="w-full my-6 bg-gradient-to-r from-indigo-600 to-indigo-400">
        <div class="w-full h-full py-6 px-10 bg-shaped bg-cover">
            <p class="mb-8 font-bold text-3xl w-full text-blue-200"><img src="{{ asset("/images/fire-off.png") }}" class="ml-2 align-middle relative inline-block w-11" />جشنواره افتتاحیه دایا آرتز و مزیت های آن</p>
            <div class="w-5/6 px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-business-time text-4xl text-blue-200"></i></span>سفارش سریع</p>
                <p class="leading-loose text-xl ">امکان سفارش سریع برای تمامی مخاطبان دایا آرتز فراهم شده تا در <b>سریع ترین روش ممکن</b> به ثبت سفارش شما بپردازد.</p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-500 duration-300">آغاز سفارش سریع</button>
                </div>
            </div>
            <div class="w-5/6 px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-box-full text-4xl text-blue-200"></i></span>بسته های همه جانبه</p>
                <p class="leading-loose text-xl ">بسته ها و پکیج های <b>هدفمند</b> و <b>همه جانبه</b> برای شما همراه با <b>تخفیف</b> آماده استفاده و سفارش هستند.</p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-500 duration-300">مشاهده پکیج های من</button>
                </div>
            </div>
            <div class="w-5/6 px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-drafting-compass
                     text-4xl text-blue-200"></i></span>عناصر اصلی طراحی گرافیک</p>
                <p class="leading-loose text-xl ">خدمات تکی طراحی گرافیک به صورت موردی برای شما فراهم شده اند تا ضمن دریافت <b>تخفیف ویژه افتتاحیه، ابزار قدرتمند <b>برند شما</b> باشند.</b></p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-500 duration-300">مشاهده خدمات اصلی من</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- end daya opening --}}
    {{-- start scripts --}}
    <script>APP_PATH = "{{ asset("/") }}"</script>
    <script src="{{ asset("/js/landing-opening.js") }}"></script>
    {{-- end scripts --}}
</x-layout.landing>