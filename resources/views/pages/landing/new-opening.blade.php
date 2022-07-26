<x-layout.landing :title="$page->title">
    @php
        $date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2022-08-01 00:00:00', 'Asia/Tehran')->toISOString();
    @endphp
    <x-slot name="header">
        <div class="w-full h-auto bg-gradient-to-r from-indigo-400 to-indigo-600 flex flex-nowrap items-stretch justify-between relative">
            <img data-src="{{ asset('/images/baloone-right-1.png') }}" alt="baloone-right" class="animate-pulse lazyload h-full md:h-[400px] lg:h-[500px] xl:h-[650px] 2xl:h-fit absolute md:static opacity-20 md:opacity-100 right-0">
            <img data-src="{{ asset('/images/baloone-right-2.png') }}" alt="baloone-right" class="lazyload md:h-[400px] lg:h-[500px] xl:h-[650px] 2xl:h-fit hidden md:inline absolute right-0 md:bottom-[4%] lg:bottom-[6%]">
            <div class="w-full md:w-auto px-4 md:px-2 py-4 text-center flex flex-col justify-evenly items-center">
                <p class="text-2xl md:text-2xl lg:text-3xl xl:text-4xl text-white w-full font-bold landing-title mb-6">
                    &rdquo;
                    هدف های بزرگ تبلیغاتی،
                    <span class="text-cyan-300 underline underline-offset-[15px] xl:underline-offset-[20px] whitespace-nowrap">نیاز های پنهانی</span>
                    دارند !
                    &ldquo;
                </p>
                <ul data-countdown="{{ $date }}" class="p-0 flex flex-nowrap justify-center items-stretch w-full text-gray-900 text-xl md:text-2xl lg:text-3xl xl:text-4xl text-center font-bold mb-4 md:mb-6">
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">
                        <span class="number"></span>
                        <span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">ثانیه</span>
                    </li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">
                        <span class="number"></span>
                        <span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">دقیقه</span>
                    </li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">
                        <span class="number"></span>
                        <span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">ساعت</span>
                    </li>
                    <li class="mx-2 bg-slate-50 rounded-md p-2 md:p-3 aspect-square min-w-[60px] md:min-w-[76px] lg:min-w-[80px] xl:min-w-[88px] inline-block relative shadow-lg">
                        <span class="number"></span>
                        <span class="text-gray-400 text-sm inline-block md:block absolute md:static left-1/2 bottom-1 -translate-x-1/2 md:translate-x-0">روز</span>
                    </li>
                </ul>
                <div class="text-center text-sm md:text-base lg:text-xl xl:text-2xl w-full text-white rtl my-2 xl:my-4 2xl:my-0">
                    <p class="font-bold text-xl md:text-xl lg:text-2xl xl:text-3xl leading-normal mb-2 md:mb-8">
                        دایا آرتز یک
                        <span class="text-cyan-300">استارت آپ</span> <span class="text-red-300">طراحی گرافیک</span>
                        با ایده های نوین است
                        <i class="fal fa-lightbulb-on text-2xl md:text-3xl lg:text-4xl mr-1"></i>
                    </p>
                    <p class="text-lg my-4 leading-loose">
                        ما در دایا آرتز برای 
                        <span class="bg-rose-400/80 rounded-full px-3 text-white whitespace-nowrap">رشد کسب و کار</span>
                        شما در زمینه 
                        <span class="bg-cyan-300/50 rounded-full px-3 text-white whitespace-nowrap">تبلیغات و برند سازی</span>
                        از برنامه ریزی تا رسیدن به هدف هاتون همراه شما هستیم
                    </p>
                    <p class="text-2xl md:text-3xl font-semibold mt-8">اما چطوری ؟! به زودی میفهمی !</p>
                    <p class="text-xl md:text-2xl md:my-4 leading-loose text-center"><span class="font-bold">زمان را محاسبه نکنید</span> و همین امروز ایده ما رو کشف کنید.</p>
                    <div class="mt-8 text-gray-200">
                        <i id="double-arrow" class="fal text-6xl md:text-7xl xl:text-8xl p-4 animate-bounce fa-angle-double-down cursor-pointer hover:text-indigo-300 duration-200"></i>
                    </div>
                </div>
            </div>
            <img data-src="{{ asset('/images/baloone-left-2.png') }}" alt="baloone-left" class="animate-pulse lazyload h-full md:h-[400px] lg:h-[500px] xl:h-[600px] hidden sm:inline absolute md:static opacity-20 md:opacity-100 left-0">
            <img data-src="{{ asset('/images/baloone-left-1.png') }}" alt="baloone-left" class="lazyload md:h-[400px] lg:h-[500px] xl:h-[600px] hidden md:inline absolute left-0 md:bottom-[4%] lg:bottom-[6%]">
        </div>
    </x-slot>
    {{-- Customer Type section --}}
    <section id="customers-section" class="w-full text-gray-900 p-4 md:py-10 md:px-12 text-lg flex flex-col items-center">
        <h2 class="text-2xl lg:text-4xl text-center font-bold piped mb-4 md:mb-8">ایده ما چیه و چطور به کسب و کارت کمک می کنیم ؟</h2>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-right m-5" src="{{ asset('images/landing/man-owning-a-business.svg') }}" alt="">
            <div class="p-2 md:p-5 pt-24">
                <p class="font-bold text-xl lg:text-2xl">
                    اگر شما دارای یک کسب و کار شخصی هستید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="lg:p-3 mt-3 text-justify text-gray-700">اگر شما دارای یک کسب و کار و بیزینس شخصی هستین، مثلا یک فروشگاه یا شرکت خدماتی یا حتی یک کافی شاپ، دایا آرتز در خدمت شماست تا به رشد کسب و کار شما کمک کنه. اما چطوری ما این کار رو انجام میدیم؟!</p>
                <p class="lg:px-3 text-justify text-gray-700">ما به عنوان یک استارت آپ طراحی گرافیک، با بررسی اهداف کاری شما، پیش نیاز های طراحی گرافیکی آن‌ها را شناسایی می‌کنیم و با اجرای هدفمند این طراحی ها، در مسیر 
                <span class="underline underline-offset-[12px] decoration-dashed">رشد تبلیغاتی و برندینگ</span>
                همراهتان هستیم.
                <br>
                <i class="fas fa-hashtag"></i>
                اگر می‌خواهید فروش بیشتری داشته باشید یا برند خودتون رو قوی کنید ما خدمات طراحی گرافیک مورد نیاز برای دستیابی به این اهداف تبلیغاتی  رو به شما پیشنهاد و فرآیند طراحی تخصصی آن‌ها را  اجرا می‌کنیم.
                <span class="text-gray-900 font-semibold">(مانند طراحی  قالب اینستاگرام، طراحی منو کافی شاپ/رستوران و طراحی بروشور تبلیغاتی)</span>
                </p>
            </div>
        </div>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-left m-5" src="{{ asset('images/landing/man-working-as-manager.svg') }}" alt="">
            <div class="p-2 md:p-5 pt-24"">
                <p class="font-bold text-xl lg:text-2xl">
                    اگر شما مدیر مسئول یک سازمان یا شرکت هستید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="lg:p-3 mt-3 text-justify text-gray-700">
                    اگر شما  یکی از مدیران دارای مسئولیت در شرکت یا سازمان خود هستید - برای مثال مدیر ارشد بازاریابی یا مدیر دیجیتال مارکتینگ یک شرکت به ‌خصوص - ما آماده هستیم تا بر اساس اهداف کاریتون، به شما بهینه ترین خدمات طراحی گرافیک رو پس از بررسی اهداف کاریتون پیشنهاد بدیم. بنابراین دایا آرتز بر اساس هدف و نیاز های واقعی کسب و کار شما، براتون طراحی خدمات گرافیک انجام میده.
                </p>
                <p class="lg:px-3 text-justify text-gray-700">
                    <i class="fas fa-hashtag"></i>
                    اگر یک مدیر ارشد دیجیتال مارکتینگ در یک شرکت هستید و قصد دارید نرخ تبدیل خودتون رو بالا ببرید، دایا آرتز با بررسی هدف و ساختار شرکت یا سازمان شما براتون مناسب ترین خدمات طراحی گرافیک رو پیشنهاد می کنه.
                    <span class="text-gray-900 font-semibold">(مانند طراحی کاتالوگ محصولات/خدمات، طراحی ست اداری و طراحی بنر تبلیغاتی)</span>
                </p>
            </div>
        </div>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-right m-5 " src="{{ asset('images/landing/man-with-an-idea.svg') }}" alt="">
            <div class="p-2 md:p-5 pt-24"">
                <p class="font-bold text-xl lg:text-2xl">
                    اگر شما ایده راه اندازی یک کسب و کار در ذهن تان دارید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="lg:p-3 mt-3 text-justify text-gray-700">اگر شما در حال راه اندازی یک کسب و کار و بیزینس تازه هستین، مثلا اگر دارید یک استارت آپ یا رستوران یا حتی یک کارگاه تولیدی رو راه اندازی می‌کنید، ما اینجا هستیم تا خدمات تخصصی طراحی گرافیک خود را بر اساس هدف برندینگ یا دغدغه تبلیغاتی شما، با حداقل بودجه برایتان برنامه‌ریزی و اجرا کنیم.</p>
                <p class="lg:px-3 text-justify text-gray-700">
                    <i class="fas fa-hashtag"></i>
                    بر اساس نوع کسب و کار شما، برایتان بهترین پیشنهاد های زمینه توسعه و طراحی برند را آماده می‌کنیم تا به یک برند قوی تبدیل شوید.
                    <span class="text-gray-900 font-semibold">(مانند طراحی لوگو،‌ طراحی هویت بصری و طراحی کارت ویزیت / تراکت)</span>
                </p>
            </div>
        </div>
    </section>
    {{-- Six broadways section --}}
    <section class="w-full flex justify-center bg-stone-300 px-0 2xl:px-4">
        <div class="w-full lg:w-11/12 xl:w-10/12 2xl:w-4/5 4k:w-3/5 md:grid flex justify-start px-2 py-4 md:px-1 lg:p-5 items-center md:grid-cols-3 md:grid-rows-2 place-items-center place-content-centersnap-x snap-mandatory md:snap-none overflow-x-auto md:overflow-x-hidden overflow-y-hidden h-72 md:h-auto">
            {{-- ITEM 1 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle border-black border-b-transparent rotate-45 overflow-hidden">
                    <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full flex justify-center items-center text-sm lg:text-base 2xl:text-xl 4k:text-2xl">شما هدف تبلیغاتی یا برنامه برندسازی خود را به ما اعلام می کنید</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">01</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot md:my-4 left-1/2 top-1/2 -translate-x-1/2 md:left-0 md:top-0"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 2 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:mt-16 border-transparent border-b-black border-r-black rotate-45">
                    <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">02</span>
                            </div>
                        </div>
                        <div class="text-center p-3 lg:pt-6 xl:p-6 xl:mt-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl">
                            <span>دایا آرتز پروسه تحقیقات درباره هدف شما را آغاز می کند :</span>
                            <ol class="text-sm lg:text-base 2xl:text-xl 4k:text-2xl list-decimal list-inside text-center mt-1 md:mt-2">
                                <li>آنالیز کسب و کار</li>
                                <li>آنالیز بازار</li>
                                <li>آنالیز رقبا</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot left-full -translate-x-1/2 md:left-0 md:translate-[initial] md:my-4"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 3 --}}
            <div class="relative aspect-square md:w-full md:mt-0 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle border-black border-b-transparent md:border-b-black border-r-transparent rotate-45">
                    <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl grid place-content-center">لیست پیشنهادی طراحی های موردنیاز جهت دستیابی به هدفتان به شما ارائه می شود</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">03</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot right-[-33px] md:h-full md:w-full md:top-6 md:left-[initial] md:-right-2 md:z-10 md:items-end md:justify-center md:flex md:my-11">
                    <i class="fas fa-circle p-6 rounded-full border-dashed border-2 border-transparent md:border-black md:border-l-transparent md:border-b-transparent rotate-45"></i>
                </span>
            </div>
            {{-- ITEM 6 --}}
            <div class="relative aspect-square md:w-full md:mt-0 order-6 md:order-4 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:mt-2 border-black border-t-transparent md:border-t-black md:border-l-transparent rotate-45">
                    <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">06</span>
                            </div>
                        </div>
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl grid place-content-center">حالا شما همه پیش نیاز های لازم برای دستیابی به هدف تبلیغاتی خود را دارید</p>
                    </div>
                </div>
                <span class="absolute-dot md:-mt-2 -top-1/2 md:top-0 right-1/2 md:right-[initial] md:translate-[initial] translate-x-[40%] md:-left-[0.85rem]"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 5 --}}
            <div class="relative aspect-square md:w-full md:mt-0 order-5 snap-always snap-center h-full md:h-auto">
                <div class="borderable-circle md:-mt-4 border-transparent border-t-black border-l-black rotate-45">
                    <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl grid place-content-center">طراحی های انجام شده بعلاوه برنامه استفاده هدفمند از آنها به شما ارائه می شود</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">05</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot right-0 translate-x-1/2 md:right-[initial] md:translate-[initial] md:-mt-2 md:-left-4"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 4 --}}
            <div class="borderable-circle aspect-square md:mt-2 border-black border-t-transparent border-l-transparent md:border-l-black rotate-45 order-4 md:order-6 snap-always snap-center h-full md:h-auto">
                <div class="w-full h-full relative box-border rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-0 md:p-5">
                    <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                        <div class="w-full h-full rounded-full bg-violet-700 flex justify-center items-center">
                            <span class="lg:text-4xl font-bold text-white mt-2">04</span>
                        </div>
                    </div>
                    <p class="text-center p-3 mt-2 md:m-0 xl:p-6 h-3/4 rounded-full text-sm lg:text-base 2xl:text-xl 4k:text-2xl grid place-content-center">
                        این طراحی ها به صورت تخصصی و هدفمند توسط طراحان دایا آرتز 
                        <span class="text-rose-500">(با ۲۵٪ تخفیف افتتاحیه)</span>
                        طراحی می شود.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full p-4 lg:p-6 flex flex-col items-center">
        <div class="w-full md:w-10/12 lg:w-full 2xl:w-10/12 grid lg:grid-cols-2 xl:gap-4">
            <div class="lg:p-5 self-center text-lg">
                <h3 class="font-bold text-2xl lg:text-4xl"><i class="text-4xl lg:text-6xl fal fa-clipboard-list"></i> فرم درخواست استفاده از خدمات دایا آرتز</h3>
                <p class="mt-3 p-3">با تکمیل و ارسال این فرم، کارشناسان ما با شما تماس حاصل خواهند کرد تا طی یک مکالمه مختصر از جزئیات بیشتر هدف شما آگاه شوند و در اسرع وقت لیستی از پیشنهادهای تخصصی تیم کارشناسان دایا آرتز بر اساس نیاز های واقعی طراحی گرافیک کسب و کارتان برای شما ارسال شود.
                    <br>
                    <br>
                    <span class="font-semibold">- فرآیند همکاری پس از دریافت لیست پیشنهادهای تخصصی ما چگونه است ؟</span>
                </p>
                <ul class="px-5 list-inside">
                    <li>۱. لیست خدمات پیشنهادی به تأیید شما می‌رسد</li>
                    <li class="mt-2 md:mt-0">۲. جزئیات این خدمات طراحی وارد پروسه سفارش می‌شود</li>
                    <li class="mt-2 md:mt-0">۳. لیست سفارش‌ها بر اساس برنامه دقیق و منظم توسط ما طراحی می‌شوند</li>
                    <li class="mt-2 md:mt-0">۴. طراحی های تکمیل شده طی دو مرحله به شما ارائه میشوند</li>
                </ul>
            </div>
            <div class="flex flex-col items-center text-gray-900" id="form" data-answer="{{ route('api.forms.store', ['key' => 'opening-mvp']) }}"></div>
        </div>
    </section>
    {{-- The 2 examples section --}}
    <section class="w-full mt-3 flex flex-col items-center">
        <h3 class="text-2xl lg:text-4xl mb-4 text-center font-bold piped px-2">طراحی تبلیغاتی بر اساس هدف شما</h3>
        {{-- Example #1 --}}
        <div class="md:bg-paper rounded-b-3xl shadow-lg mb-10 xl:w-10/12 p-2 md:p-6 md:pb-12 break-words flex md:block flex-col items-center md:mt-4 relative">
            <div class="bg-white rounded-xl relative w-2/3 md:w-1/3 xl:w-1/4 md:float-right mx-4 md:m-5 md:mt-10 shadow-xl">
                <img class="absolute z-10 -top-4 -right-4" src="{{ asset('images/landing/tape.png') }}" alt="">
                <div class="bg-violet-300/60 rounded-xl p-5 pb-0">
                    <img class="w-full h-auto" src="{{ asset('images/landing/fastfood.svg') }}" alt="">
                </div>
                <div class="py-3 p-2 md:px-6">
                    <span class="w-fit px-3 bg-violet-500 text-white rounded-full">کوچک - محلی</span>
                    <p class="my-2 md:my-3 p-1 md:p-3">
                        <b>نام کسب و کار :</b> فست فود "همگر"
                        <br>
                        <b>سابقه فعالیت :‌</b> ۱۱ ماه
                        <br>
                        <b>هدف تبلیغاتی :</b> تبلیغات محلی و جذب مشتری
                    </p>
                </div>
                <img class="absolute z-10 -bottom-5 -left-5" src="{{ asset('images/landing/tape.png') }}" alt="">
            </div>
            <div class="md:px-5 px-3 pt-6 md:pt-[60px] text-lg leading-loose text-[#0102B5] text-justify">
                <h4 class="text-2xl"><i class="fas fa-hashtag"></i> نمونه تبلیغاتی</h4>
                <p>مدیر فست فود کوچک و دنج
                    <span class="font-semibold">«همگر»</span>
                    با هدف جذب مشتری بیشتر به یک طراح گرافیک مراجعه می‌کند و از او می‌خواهد تا برایش یک منو جدید و یک کارت ویزیت طراحی کند.
                </p>
                <p>مدیر «همگر» پس از آشنایی با
                    <span class="font-semibold text-red-600">دایا آرتز</span>
                    و در میان گذاشتن هدف تبلیغاتی اش با کارشناسان ما، لیست پیشنهادی زیر که شامل طراحی های مورد نیاز برای دستیابی به این هدف است را دریافت می کند :
                </p>
                <ul class="list-outside">
                    <li>1. <span class="font-bold">طراحی تراکت یک رو</span> (برای جذب مشتریان جدید و افزایش فروش با آن ها)</li>
                    <li>2. <span class="font-bold">طراحی کارت ویزیت دو رو</span> (برای جذب مشتریان جدید و حفظ مشتری‌های قدیمی)</li>
                    <li>3. <span class="font-bold">طراحی قالب تک پست اینستاگرام</span> (برای جذب مشتری در فضای آنلاین)</li>
                </ul>
                <p>
                    مدیر فست فود «همگر» پس از دریافت لیست پیشنهادی دایا آرتز بدلیل دقیق و تخصصی بودن این لیست و همچنین 
                    <span class="underline underline-offset-[10px] text-red-600 font-bold">حذف هزینه های اضافی</span>
                     به همکاری با ما تمایل پیدا میکند. ما پس از طراحی این پیش نیاز ها، آن‌ها را بعلاوه یک برنامه استفاده هدفمند (برای دستیابی به هدف تبلیغاتی) به مدیریت «همگر» ارائه می کنیم. حالا فست فود همگر می تواند به راحتی فرآیند تبلیغاتی خود را شروع کرده و به مشتری‌های بیشتر دست یابد.
                </p>
            </div>
            <div class="lg:absolute lg:-bottom-3 text-center left-0 bottom-0 p-5 text-xl font-iransans font-bold">
                شما هم پیشنهاد های ویژه کسب و کارتان را از ما بشنوید 
                <i class="fas fa-arrow-left"></i>
                <button class="py-2 px-3 mx-4 mt-3 md:mt-0 duration-300 bg-purple-500 text-white rounded-full ring-4 ring-transparent hover:ring-purple-200 animate-heartbeat button-to-form">درخواست پیشنهاد ما</button>
            </div>
        </div>
        <h3 class="text-2xl lg:text-4xl my-4 text-center font-bold piped px-2">طراحی برندینگ بر اساس هدف شما</h3>
        {{-- Example #2 --}}
        <div class="md:bg-paper rounded-b-3xl shadow-lg mb-10 xl:w-10/12 p-2 md:p-6 md:pb-12 break-words flex md:block flex-col items-center md:mt-4 relative">
            <div class="bg-white rounded-xl relative w-2/3 md:w-1/3 xl:w-1/4 md:float-left mx-4 md:m-5 md:mt-10 shadow-xl">
                <img class="absolute z-10 -top-4 -right-4" src="{{ asset('images/landing/tape.png') }}" alt="">
                <div class="bg-violet-300/60 rounded-xl p-5 pb-0">
                    <img class="w-full h-auto" src="{{ asset('images/landing/restaurant.svg') }}" alt="">
                </div>
                <div class="py-3 p-2 md:px-6"">
                    <span class="w-fit px-3 bg-violet-500 text-white rounded-full">سرشناس - لاکچری</span>
                    <p class="my-2 md:my-3 p-1 md:p-3">
                        <b>نام کسب و کار :</b> رستوران "پالرمو"
                        <br>
                        <b>سابقه فعالیت :‌</b> ۱۵ سال
                        <br>
                        <b>هدف تبلیغاتی :</b> تبدیل شدن به یک برند خاص در سطح استان
                    </p>
                </div>
                <img class="absolute z-10 -bottom-5 -left-5" src="{{ asset('images/landing/tape.png') }}" alt="">
            </div>
            <div class="md:px-5 px-3 pt-6 md:pt-[60px] text-lg leading-loose text-[#0102B5] text-justify">
                <h4 class="text-2xl"><i class="fas fa-hashtag"></i> نمونه برندسازی</h4>
                <p>مؤسس
                    <span class="font-semibold">رستوران" پالرمو"</span>
                    از مدیر اجرایی رستورانش می‌خواهد که ظرف یک سال آینده این رستوران به یک برند خاص و مطرح در سطح استان تبدیل شود.
                    <br>
                    مدیر ارشد اجرایی رستوران پالرمو دچار سردرگمی است و با دوست طراح گرافیک خود درباره این مسئله مشورت می کند. طراح به او توصیه می‌کند برای ارتقا جلوه بصری رستوران با او قرار دادی ببندد تا تمامی اقلام منو، کارت ویزیت و ست اداری بازطراحی شود و همچنین برای لباس‌های پرسنل سنجاق سینه طراحی شود. مدیر اجرایی رستوران تسلیم پیشنهادهای دوستش می‌شود چرا که هیچ راه حل دیگری برای برند شدن در سراسر استان به ذهنش نمی رسد. بنابراین تصمیم به ارزان کردن خدمات رستوران با هدف معروف شدن ضمن پیشنهاد های دوستش می کند.
                </p>
                <br>
                <p>مدیر اجرایی این رستوران پس از آشنایی با
                    <span class="font-semibold text-red-600">دایا آرتز</span>
                    و در میان گذاشتن اهداف برندینگ رستوران پالرمو با کارشناسان ما، لیست پیشنهادی زیر که شامل پیش نیاز های گرافیکی مخصوص فرآیند برندسازی آنهاست را دریافت می کند :
                </p>
                <ul class="pr-3">
                    <li>1- <span class="font-bold">ترمیم و بازطراحی لوگو و هویت بصری</span>
                        <i class="text-red-600 fas fa-arrow-left"></i>
                        (با هدف بروز شدن هویت بصری مطابق بازار مدرن)
                    </li>
                    <li>2- <span class="font-bold">پکیج طراحی های اینستاگرامی</span>
                        <i class="text-red-600 fas fa-arrow-left"></i>
                        (با هدف جذب مخاطب و معرفی رستوران در سطح فضای مجازی)
                    </li>
                    <li>3- <span class="font-bold">طراحی یک بنر تبلیغاتی</span>
                        <i class="text-red-600 fas fa-arrow-left"></i>
                        (با هدف استفاده به صورت بیلبورد در سطح شهر و تبلیغات محیطی)
                    </li>
                    <li>4- <span class="font-bold">طراحی کارت ویزیت حرفه‌ای</span>
                        <i class="text-red-600 fas fa-arrow-left"></i>
                        (بجهت نگهداری مشتریان فعلی رستوران)
                    </li>
                </ul>
                <br>
                <p>حالا مدیر اجرایی رستوران پالرمو با خاطر جمعی از استراتژی هدفمند دایا آرتز مسئولیت اجرای طراحی های گرافیک رستوران را به ما می سپارد. ما طرح توسعه و تبدیل "پالرمو" به یک برند خاص در سطح استان را به آن‌ها ارائه می دهیم و با هزینه‌های استاندارد و متناسب با هدف بزرگ و کلان مؤسس رستوران، بازدهی قابل توجهی بجهت برند نوسازی شده رستوران را به آن‌ها هدیه می کنیم.</p>
            </div>
            <div class="lg:absolute lg:-bottom-3 text-center left-0 bottom-0 p-5 text-xl font-iransans font-bold">
                شما هم پیشنهاد های ویژه برندتان را از ما بشنوید 
                <i class="fas fa-arrow-left"></i>
                <button class="py-2 px-3 mx-4 mt-3 md:mt-0 duration-300 bg-purple-500 text-white rounded-full ring-4 ring-transparent hover:ring-purple-200 animate-heartbeat button-to-form">درخواست پیشنهاد ما</button>
            </div>
        </div>
    </section>
    <section class="w-full flex flex-col items-center mt-6 bg-gradient-to-l from-daya-purple-light via-daya-purple-medium to-daya-purple-dark text-stone-100 p-3 md:p-6">
        <h2 class="text-3xl lg:text-4xl text-center font-bold piped">سوالات متداول</h2>
        <div class="w-full lg:10/12 xl:w-8/12 md:p-4 mt-4 grid grid-cols-1 gap-4 lg:gap-8" id="faq-list">
            <div class="border-b-2 border-stone-100 py-3 md:px-6">
                <p class="font-bold select-none text-lg lg:text-xl md:pl-4 hover:cursor-pointer duration-200 hover:text-purple-300">وجه تمایز دایا آرتز با دیگر طراحان گرافیک در چیست ؟ <i class="float-left far fa-times-circle"></i></p>
                <p class="mt-6 text-base lg:text-xl transition duration-500 ease-in-out !leading-loose">
                    <i class="fas fa-plus m-2"></i>
                    طراحی گرافیک در دایا آرتز بر مبنای هدف تبلیغاتی شما انجام می‌شود. به این شکل که شما فقط به کارشناسان دایا آرتز هدف تبلیغاتی خود را اعلام می کنید و ما به شما لیستی از طراحی های موردنیاز برای دستیابی به هدفتان را (بر مبنای آنالیز دقیق کسب و کار شما، بازار شما و رقبایتان) به شما ارائه می کنیم.
                    <br>
                    فقط کافیست با
                    <button type="button" class="bg-rose-400/80 hover:bg-rose-400 duration-300 rounded-full px-3 button-to-form">تکمیل فرم درخواست پیشنهادات ما</button>
                    با رویکرد تخصصی متفاوت دایا آرتز آشنا شوید و با مقایسه راهکار ما با راهکار های موجود در بازار بهترین تصمیم ممکن را بگیرید.
                </p>
            </div>
            <div class="border-b-2 border-stone-100 py-3 md:px-6">
                <p class="font-bold select-none text-lg lg:text-xl md:pl-4 hover:cursor-pointer duration-200 hover:text-purple-300">خدمات طراحی گرافیک دایا آرتز چیست ؟ <i class="float-left far fa-caret-circle-down"></i></p>
                <p class="mt-6 text-base lg:text-xl transition duration-500 ease-in-out !leading-loose hidden">
                    <i class="fas fa-plus m-2"></i>
                    خدمات ما شامل سه گروه است :
                    <br>
                    1. طراحی های تبلیغاتی (مانند طراحی تراکت، کارت ویزیت،‌ کاتالوگ و …)
                    <br>
                    2. طراحی های هویت بصری برند (مانند طراحی لوگو، طراحی ست اداری، طراحی بسته بندی و…)
                    <br>
                    3. طراحی های تبلیغات در شبکه‌های اجتماعی (مانند طراحی قالب پیج اینستاگرام،‌ آواتار شبکه‌های اجتماعی،‌ طراحی پست های تبلیغاتی و ...)
                    </ul>
                </p>
            </div>
            <div class="border-b-2 border-stone-100 py-3 md:px-6">
                <p class="font-bold select-none text-lg lg:text-xl md:pl-4 hover:cursor-pointer duration-200 hover:text-purple-300">خدمات دایا آرتز مناسب چه کسانی است ؟ <i class="float-left far fa-caret-circle-down"></i></p>
                <p class="mt-6 text-base lg:text-xl transition duration-500 ease-in-out !leading-loose hidden">
                    <i class="fas fa-plus m-2"></i>
                    تمامی صاحبان و مدیران کسب و کار در هر زمینه شغلی و در هر اندازه سازمانی و یا هر سطح از بودجه تبلیغاتی می‌توانند برای استفاده از خدمات طراحی گرافیک دایا آرتز اقدام کنند.
                    <span id="to-customers" class="underline underline-offset-8 text-blue-300 hover:text-blue-400 duration-200 cursor-pointer">(توضیحات بیشتر)</span>
                </p>
            </div>
            {{-- <div class="border-b-2 border-stone-100 py-3 md:px-6">
                <p class="font-bold select-none text-xl lg:text-2xl md:pl-4 hover:cursor-pointer duration-200 hover:text-purple-300"> <i class="float-left far fa-caret-circle-down"></i></p>
                <p class="mt-6 text-base lg:text-xl transition duration-500 ease-in-out leading-loose hidden">
                    دایا آرتز صاحب یک شخصیت حقوقی است و با عنوان اقتصادی
                    <span class="font-bold underline underline-offset-[10px]">"شرکت ارمغان کهکشان پارس"</span>
                    فعالیت می کند فلذا تمامی قرارداد های سازمانی از رسمیت و اعتبار بالا برخوردار هستند.
                    <br>
                    ساختار سازمانی دایا آرتز به این شکل تنظیم شده است که همه پروسه های سازمانی اعم از ثبت سفارش،‌ پشتیبانی مشتریان و طراحی گرافیک توسط متخصصین همان بخش انجام می شود و تضمین می شود که مشتریان ما رفتار حرفه ای سازمانی و قابل اعتماد را تجربه خواهند کرد.
                </p>
            </div> --}}
            <div class="border-b-2 border-stone-100 py-3 md:px-6">
                <p class="font-bold select-none text-xl lg:text-2xl md:pl-4 hover:cursor-pointer duration-200 hover:text-purple-300">از چه راهی می‌توانم با شما تماس حاصل کنم ؟ <i class="float-left far fa-caret-circle-down"></i></p>
                <p class="mt-6 text-base lg:text-xl transition duration-500 ease-in-out leading-loose hidden">
                    <i class="fas fa-plus m-2 leading-loose"></i>
                    تنها کافیست با
                    <button type="button" class="bg-rose-400/80 hover:bg-rose-400 duration-300 rounded-full px-3 button-to-form whitespace-nowrap">تکمیل فرم درخواست خدمات</button>
                    دایا آرتز
                    قدم اول همکاری با ما را بردارید و همچنین می‌توانید با استفاده از راه‌های ارتباطی زیر با کارشناسان ما در ارتباط باشید :
                    <br>
                    <br>
                    - تماس تلفنی با شماره ثابت : <a class="inline-block [direction:ltr]" href="tel:+982128423542">021 2842 3542</a> – کلید 1 (واحد فروش)
                    <br>
                    - تماس تلفنی با شماره تلفن : <a class="inline-block [direction:ltr]" href="tel:+989015045025">0901 504 5025</a>
                    <br>
                    - از طریق واتس اپ با شماره : <a class="inline-block [direction:ltr]" href="https://wa.me/989016045025">0901 604 5025</a>
                </p>
            </div>
        </div>
    </section>
    @push('scripts')
        <script src="{{ mix('js/landing-opening.js') }}"></script>
    @endpush
</x-layout.landing>