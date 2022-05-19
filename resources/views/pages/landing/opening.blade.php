<x-layout.landing :title="$page->title">
    {{-- start header --}}
    <x-slot name="header">
        <div class="w-full h-auto bg-gradient-to-r from-indigo-400 to-indigo-600 flex flex-nowrap items-stretch justify-between relative">
            <img data-src="{{ asset('/images/baloone-right-1.png') }}" alt="baloone-right" class="lazyload h-full md:h-[400px] lg:h-[500px] xl:h-[600px] absolute md:static opacity-20 md:opacity-100 right-0">
            <img data-src="{{ asset('/images/baloone-right-2.png') }}" alt="baloone-right" class="lazyload md:h-[400px] lg:h-[500px] xl:h-[600px] hidden md:inline absolute right-0 md:bottom-[4%] lg:bottom-[6%]">
            <div class="w-full md:w-auto px-4 md:px-2 py-4 text-center flex flex-col justify-evenly items-center">
                <p class="text-xl md:text-2xl lg:text-3xl xl:text-4xl text-white w-full font-bold leading-normal my-3 xl:my-0"><span class="text-cyan-300">همین حالا</span> سفارشت رو ثبت کن؛ <span class="text-cyan-300">زمان</span> محدودست</p>
                <ul class="p-0 flex flex-nowrap justify-center items-stretch w-full text-gray-900 text-xl md:text-2xl lg:text-3xl xl:text-4xl text-center font-bold my-3 xl:my-0">
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">45<span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">ثانیه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">59<span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">دقیقه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">23<span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">ساعت</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">09<span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">روز</span></li>
                </ul>
                <div class="text-center text-sm md:text-base lg:text-xl xl:text-2xl w-full text-white rtl my-3 xl:my-0">
                    <h3 class="font-bold text-base md:text-xl lg:text-2xl xl:text-3xl leading-normal mb-2 md:mb-4"><span class="text-cyan-300">دایا آرتز</span> در <span class="text-cyan-300">جشنواره افتتاحیه</span> سایتش با رویکرد استارت آپی قصد دارد:</h3>
                    <p>فقط تا پایان مدت این زمان سنج، پکیج های هدف گذاری شده و خدمات یگانه خود را با <span class="text-cyan-300 italic">تخفیف افتتاحیه</span> به کسب و کار های حرفه ای ارائه دهد.
                        <br>
                        <b>زمان را محاسبه نکن! امروز دایا آرتز را کشف کنید.</b> بسته های بهینه شده برای کسب و کار شما آماده هستند.
                    </p>
                </div>    
            </div>
            <img data-src="{{ asset('/images/baloone-left-2.png') }}" alt="baloone-left" class="lazyload h-full md:h-[400px] lg:h-[500px] xl:h-[600px] hidden sm:inline absolute md:static opacity-20 md:opacity-100 left-0">
            <img data-src="{{ asset('/images/baloone-left-1.png') }}" alt="baloone-left" class="lazyload md:h-[400px] lg:h-[500px] xl:h-[600px] hidden md:inline absolute left-0 md:bottom-[4%] lg:bottom-[6%]">
        </div>
    </x-slot>
    {{-- end header --}}
    {{-- start discount description --}}
    <div class="w-full my-6 px-2 md:px-12 flex justify-evenly items-center xl:items-start flex-wrap md:flex-nowrap">
        <div class="text-lg md:text-xl lg:text-2xl text-indigo-600 leading-loose">
            <span class="ml-1 align-middle"><i class="far fa-badge-percent md:text-xl lg:text-3xl text-indigo-600"></i></span>
            <p class="inline"><b>تا 25 درصد تخفیف ویژه افتتاحیه سایت ما؛</b><br>یعنی استارت آپ طراحی گرافیک <b>دایا آرتز</b>...</p>
            <p>و همچنین فقط برای کسانی که خدمات یگانه و منحصر به فردی را می خواهند؛ خدمات تکی دایا آرتز را ضمن تحفیف آماده سفارش قرار دادیم.
            </p>
            <div class="flex justify-between items-center mt-4 flex-wrap text-base lg:text-lg text-slate-50">
                <div>
                    <button class="p-3 md:ml-1 lg:ml-2 rounded-2xl bg-orange-400 hover:bg-orange-500 shadow-lg shadow-orange-400/50 duration-300">مشاهده پکیج ها</button>
                    <button class="p-3 md:mx-1 lg:mr-2 rounded-2xl bg-orange-400 hover:bg-orange-500 shadow-lg shadow-orange-400/50 duration-300">مشاهده خدمات تکی</button>
                </div>
                <button class="p-3 mt-2 md:mt-0 md:mr-1 rounded-2xl bg-indigo-500 hover:bg-indigo-600 shadow-md shadow-indigo-500/50 duration-300">دریافت مشاوره</button>
            </div>
        </div>
        <img data-src="{{ asset("/images/daya-logo-opening.png") }}" alt="daya-logo" class="lazyload absolute opacity-[0.08] md:opacity-100 md:static w-100 md:w-48 lg:w-[17rem] mb-2 md:mb-0 md:mr-12 order-first md:order-last">
    </div>     
    {{-- end discount description --}}
    {{-- start packages --}}
    <div class="w-full my-6 h-auto py-8 px-2 md:px-6 bg-gradient-to-bl text-slate-50 from-indigo-600 to-indigo-500">
        <p class="font-bold text-2xl w-full leading-loose"><span class="ml-2 align-middle relative inline-block h-fit"><i class="fas fa-gift text-5xl md:text-6xl"></i><i class="fas fa-badge-percent absolute right-1 bottom-0 text-xl md:text-2xl text-orange-400"></i></span>پکیج های بهینه برای نیاز خاص شما !</p>
        <div class="w-full flex md:flex-wrap md:justify-evenly items-stretch snap-x snap-mandatory overflow-x-auto">
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="min-w-full xs:min-w-[20rem] md:min-w-0 md:w-80 mx-2 md:mx-4 bg-gradient-to-b from-indigo-500 to-indigo-400 py-8 px-5 text-white shadow-xl text-center rounded-xl my-8 snap-always snap-start">
                <h3 class="bg-slate-50 text-orange-500 rounded-full p-3 mb-4 mx-auto text-lg w-fit font-bold shadow-sm shadow-orange-500/50">بسته فضای مجازی</h3>
                <p class="text-lg leading-normal font-bold"><i class="fad fa-diamond align-middle text-sky-300 ml-1"></i>بهترین بازخورد بازار یابی</p>
                <ul class="p-0 space-y-5 text-sm my-5">
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>آواتار</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i> 5 کاور هایلایت (آیکونی)</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب پست</span><span class="min-w-fit">OFF 15%</span></li>
                    <li class="flex justify-between items-center"><span class="align-middle text-right"><i class="ml-1 fad fa-check-circle"></i>قالب استوری</span><span class="min-w-fit">OFF 15%</span></li>
                </ul>
                <p class="text-3xl font-bold my-2"><span class="text-sm font-normal">هزار تومان / </span>934</p>
                <button class="my-2 rounded-md bg-slate-50 text-orange-500 py-2 px-5 duration-300 hover:text-slate-50 hover:bg-orange-500 shadow-sm shadow-orange-500/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
        </div>
    </div>
    {{-- end packages --}}
    {{-- start quick order form --}}
    <x-quick-order-form />
    {{-- end quick order form --}}
    {{-- start order methods --}}
    <div class="w-full h-auto md:h-72 my-6 bg-gradient-to-r from-indigo-600 to-indigo-400">
        <div class="w-full h-full py-6 px-3 md:px-10 bg-shaped bg-cover flex justify-between items-stretch flex-wrap md:flex-nowrap">
            <div class="h-full text-right">
                <p class="font-bold text-2xl md:text-4xl text-blue-200">روش های ثبت سفارش</p>
                <p class="text-xl md:text-2xl text-slate-50 mt-2 mb-4 md:my-6 leading-loose">علاوه بر سفارش سریع، می توانید از طریق روش های  زیر سفارش خود را ثبت کنید.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 md:gap-y-8 text-slate-50 text-lg md:text-xl">
                    <a href="#fast-order" class="[direction:ltr] w-fit group duration-300 hover:text-sky-300">فرم سفارش سریع<span class="ml-2 text-sky-300 text-xl md:text-2xl"><i class="fab fa-wpforms group-hover:scale-125 duration-300"></i></span></a>
                    <a href="#telegram" class="[direction:ltr] w-fit group duration-300 hover:text-sky-300">@DayaBot<span class="ml-2 text-sky-300 text-xl md:text-2xl"><i class="fab fa-telegram-plane group-hover:scale-125 duration-300"></i></span></a>
                    <a href="tel:+989015045025" class="[direction:ltr] w-fit group duration-300 hover:text-sky-300">+98 901 504 5025<span class="ml-2 text-sky-300 text-xl md:text-2xl"><i class="far fa-phone group-hover:scale-125 duration-300"></i></span></a>
                    <a href="#whatsapp" class="[direction:ltr] w-fit group duration-300 hover:text-sky-300">+98 901 604 5025<span class="ml-2 text-sky-300 text-xl md:text-2xl"><i class="fab fa-whatsapp group-hover:scale-125 duration-300"></i></span></a>
                </div>
            </div>
            <img data-src="{{ asset("/images/hand-point-lock.png") }}" alt="order-methods" class="lazyload w-40 mx-auto mb-4 md:m-0 md:w-auto h-auto md:h-full order-first md:order-last">
        </div>
    </div>
    {{-- end order methods --}}
    {{-- start services --}}
    <div class="w-full h-auto my-6 px-2 md:px-6">
        <p class="mb-4 font-bold text-xl md:text-2xl w-full text-indigo-600"><span class="ml-2 align-middle relative inline-block h-fit"><i class="fas fa-arrow-alt-down text-7xl md:text-8xl text-indigo-200"></i><i class="fal fa-percent absolute text-sm md:text-base left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-fuchsia-800 after:content-['OFF'] after:text-sm md:after:text-base after:mt-px after:font-bold flex flex-col items-center"></i></span>خدمات تکی طراحی گرافیک، آماده سفارش و طراحی!</p>
        <div class="w-full flex justify-evenly items-stretch flex-wrap">
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-pied-piper-pp"></i></span>
                <h3 class="text-2xl my-5 font-bold">لوگو ترکیبی</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="far fa-sticky-note"></i></span>
                <h3 class="text-2xl my-5 font-bold">تراکت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-elementor"></i></span>
                <h3 class="text-2xl my-5 font-bold">منو رستوران و کافی شاپ</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-cc-discover"></i></span>
                <h3 class="text-2xl my-5 font-bold">کارت ویزیت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="far fa-sticky-note"></i></span>
                <h3 class="text-2xl my-5 font-bold">تراکت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-elementor"></i></span>
                <h3 class="text-2xl my-5 font-bold">منو رستوران و کافی شاپ</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
            <div class="relative w-full max-w-xs md:w-80 mx-2 md:mx-4 bg-on-white py-8 px-5 text-neutral-900 shadow-2xl text-center rounded-lg my-8">
                <span class="absolute top-0 left-0 -translate-x-1/3 -translate-y-1/3 text-5xl md:text-6xl text-indigo-300"><i class="fas fa-badge after:content-['25%'] after:text-black after:text-lg md:after:text-xl after:font-sans after:font-bold after:absolute after:left-1/2 after:top-1/2 after:-translate-x-1/2 after:-translate-y-1/2"></i></span>
                <span class="bg-icon text-6xl h-full bg-contain bg-no-repeat bg-center"><i class="fab fa-cc-discover"></i></span>
                <h3 class="text-2xl my-5 font-bold">کارت ویزیت</h3>
                <p class="text-lg my-2 line-through decoration-2"><span class="text-sm">تومان / </span>5,500,000</p>
                <p class="text-2xl font-bold my-2"><span class="text-sm font-normal">تومان / </span>4,125,000</p>
                <button class="my-2 rounded-md bg-indigo-500 px-5 py-2 duration-300 hover:bg-indigo-600 text-slate-50 shadow-sm shadow-indigo-600/50 hover:shadow-lg">ثبت سفارش</button>
            </div>
        </div>
    </div>
    {{-- end services --}}
    {{-- start daya opening --}}
    <div class="w-full my-6 bg-gradient-to-r from-indigo-600 to-indigo-400">
        <div class="w-full h-full py-6 px-4 md:px-10 bg-shaped bg-cover">
            <p class="mb-8 font-bold text-3xl w-full text-blue-200"><img data-src="{{ asset("/images/fire-off.png") }}" class="lazyload ml-2 align-middle relative inline-block w-11" />جشنواره افتتاحیه دایا آرتز و مزیت های آن</p>
            <div class="w-full xl:w-5/6 sm:px-5 md:px-8 lg:px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-xl md:text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-business-time text-3xl md:text-4xl text-blue-200"></i></span>سفارش سریع</p>
                <p class="leading-loose text-lg md:text-xl">امکان سفارش سریع برای تمامی مخاطبان دایا آرتز فراهم شده تا در <b>سریع ترین روش ممکن</b> به ثبت سفارش شما بپردازد.</p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-300 duration-300 shadow-sm shadow-blue-300/50 hover:shadow-lg">آغاز سفارش سریع</button>
                </div>
            </div>
            <div class="w-full xl:w-5/6 sm:px-5 md:px-8 lg:px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-xl md:text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-box-full text-3xl md:text-4xl text-blue-200"></i></span>بسته های همه جانبه</p>
                <p class="leading-loose text-lg md:text-xl">بسته ها و پکیج های <b>هدفمند</b> و <b>همه جانبه</b> برای شما همراه با <b>تخفیف</b> آماده استفاده و سفارش هستند.</p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-300 duration-300 shadow-sm shadow-blue-300/50 hover:shadow-lg">مشاهده پکیج های من</button>
                </div>
            </div>
            <div class="w-full xl:w-5/6 sm:px-5 md:px-8 lg:px-16 text-slate-50 text-right my-8">
                <p class="mb-4 font-bold text-xl md:text-2xl w-full"><span class="ml-2 align-middle inline-block h-fit"><i class="far fa-drafting-compass text-3xl md:text-4xl text-blue-200"></i></span>عناصر اصلی طراحی گرافیک</p>
                <p class="leading-loose text-lg md:text-xl">خدمات تکی طراحی گرافیک به صورت موردی برای شما فراهم شده اند تا ضمن دریافت <b>تخفیف ویژه افتتاحیه، ابزار قدرتمند <b>برند شما</b> باشند.</b></p>
                <div class="w-full my-4">
                    <button class="mx-auto p-2 rounded-full text-gray-900 bg-blue-200 hover:bg-blue-300 duration-300 shadow-sm shadow-blue-300/50 hover:shadow-lg">مشاهده خدمات اصلی من</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end daya opening --}}
    {{-- start scripts --}}
    <script>APP_PATH = "{{ asset("/") }}"</script>
    <script src="{{ mix("/js/landing-opening.js") }}"></script>
    {{-- end scripts --}}
</x-layout.landing>