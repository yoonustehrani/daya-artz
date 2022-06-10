<x-layout.landing :title="$page->title">
    <x-slot name="header">
        {{-- <div class="w-full h-auto bg-gradient-to-r from-indigo-400 to-indigo-600 flex flex-nowrap items-stretch justify-between relative">
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
        </div> --}}
    </x-slot>
    {{-- Customer Type section --}}
    <section class="w-full text-gray-900 py-10 px-12 text-lg flex flex-col items-center">
        <h2 class="text-4xl text-center font-bold piped">ایده ما چیه و چطور به کسب و کارت کمک میکنیم ؟</h2>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-right m-5" src="{{ asset('images/landing/man-owning-a-business.svg') }}" alt="">
            <div class="p-5 pt-24">
                <p class="font-bold text-2xl">
                    اگر شما دارای یک کسب و کار شخصی هستید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="p-3 mt-3 text-justify text-gray-700">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
        </div>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-left m-5" src="{{ asset('images/landing/man-working-as-manager.svg') }}" alt="">
            <div class="p-5 pt-24">
                <p class="font-bold text-2xl">
                    اگر شما مدیر مسئول یک سازمان یا شرکت هستید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="p-3 mt-3 text-justify text-gray-700">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
        </div>
        <div class="w-full xl:w-10/12">
            <img class="lg:h-96 p-5 float-right m-5 " src="{{ asset('images/landing/man-with-an-idea.svg') }}" alt="">
            <div class="p-5 pt-24">
                <p class="font-bold text-2xl">
                    اگر شما ایده راه اندازی یک کسب و کار در ذهن تان دارید
                    <i class="far fa-caret-circle-down"></i>
                </p>
                <p class="p-3 mt-3 text-justify text-gray-700">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
        </div>
    </section>
    {{-- Six broadways section --}}
    <section class="w-full flex justify-center bg-stone-300 px-12">
        <div class="w-full xl:w-4/5 grid grid-cols-1 md:grid-cols-3 grid-rows-2 place-items-center place-content-center p-5">
            {{-- ITEM 1 --}}
            <div class="relative aspect-square w-full">
                <div class="borderable-circle border-black border-b-transparent rotate-45 overflow-hidden">
                    <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full flex justify-center items-center text-base 2xl:text-2xl">جمع آوری اطلاعات و تعیین اهداف تبلیغاتی</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">01</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot my-4"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 2 --}}
            <div class="relative aspect-square w-full">
                <div class="borderable-circle mt-16 border-transparent border-b-black border-r-black rotate-45">
                    <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">02</span>
                            </div>
                        </div>
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base 2xl:text-2xl grid place-content-center">اعلام اهداف تبلیغاتی به <a href="{{ route('home') }}">دایا آرتز</a></p>
                    </div>
                </div>
                <span class="absolute-dot my-4"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 3 --}}
            <div class="relative aspect-square w-full">
                <div class="borderable-circle border-black border-r-transparent rotate-45">
                    <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base 2xl:text-2xl">
                            <span>پروسه تحقیقات :</span>
                            <ol class="text-base list-decimal list-inside text-center mt-2">
                                <li>آنالیز کسب و کار</li>
                                <li>آنالیز بازار</li>
                                <li>آنالیز رقبا</li>
                            </ol>
                        </div>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">03</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute h-full w-full top-6 -right-2 z-10 items-end justify-center flex my-11">
                    <i class="fas fa-circle p-6 rounded-full border-dashed border-2 border-black border-l-transparent border-b-transparent rotate-45"></i>
                </span>
            </div>
            {{-- ITEM 6 --}}
            <div class="relative aspect-square w-full">
                <div class="borderable-circle mt-2 border-black border-l-transparent rotate-45">
                    <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">06</span>
                            </div>
                        </div>
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base 2xl:text-2xl grid place-content-center">ارائه طراحی های انجام شده بعلاوه برنامه استفاده هدفمند به شما</p>
                    </div>
                </div>
                <span class="absolute-dot -mt-1"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 5 --}}
            <div class="relative aspect-square w-full">
                <div class="borderable-circle -mt-4 border-transparent border-t-black border-l-black rotate-45">
                    <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                        <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base 2xl:text-2xl grid place-content-center">انجام طراحی های مورد نیاز</p>
                        <div class="w-1/3 h-1/3 absolute bottom-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                            <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                                <span class="lg:text-4xl font-bold text-white mt-2">05</span>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="absolute-dot -mt-1"><i class="fas fa-circle"></i></span>
            </div>
            {{-- ITEM 4 --}}
            <div class="borderable-circle mt-2 border-black border-t-transparent rotate-45">
                <div class="w-full h-full relative rounded-full bg-white rotate-[-45deg] flex justify-center items-center p-5">
                    <div class="w-1/3 h-1/3 absolute top-[-10%] rounded-full bg-stone-300 flex justify-center items-center p-2">
                        <div class="w-full h-full rounded-full bg-purple-700 flex justify-center items-center">
                            <span class="lg:text-4xl font-bold text-white mt-2">04</span>
                        </div>
                    </div>
                    <p class="text-center p-3 xl:p-6 h-3/4 rounded-full text-base 2xl:text-2xl grid place-content-center">تهیه لیست پیشنهادی طراحی های موردنیاز جهت دستیابی به هدف تبلیغاتی</p>
                </div>
            </div>
        </div>
    </section>
    <section class="w-full mt-3 flex flex-col items-center">
        <div class="bg-paper rounded-b-3xl shadow-lg mb-10 xl:w-10/12 p-6 break-words">
            <div class="bg-white rounded-xl relative w-full xl:w-1/4 float-right xl:m-5 xl:mt-10 shadow-xl">
                <img class="absolute z-10 -top-4 -right-4" src="{{ asset('images/landing/tape.png') }}" alt="">
                <div class="bg-purple-300/60 rounded-xl relative p-5 pb-0">
                    <img class="w-full h-auto" src="{{ asset('images/landing/fastfood.svg') }}" alt="">
                </div>
                <div class="py-3 px-6">
                    <span class="w-fit px-3 bg-purple-500 text-white rounded-full">کوچک - محلی</span>
                    <p class="mt-3 p-3">
                        <b>نام کسب و کار :</b> فست فود "همگر"
                        <br>
                        <b>سابقه فعالیت :‌</b> ۱۱ ماه
                        <br>
                        <b>هدف تبلیغاتی :</b> تبلیغات محلی و جذب مشتری
                    </p>
                </div>
                <img class="absolute z-10 -bottom-5 -left-5" src="{{ asset('images/landing/tape.png') }}" alt="">
            </div>
            <div class="px-5 pt-[60px] text-lg leading-loose text-[#0102B5]">
                <h4 class="text-2xl">مثال #1</h4>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
        </div>
        <div class="bg-paper rounded-b-3xl shadow-lg mb-10 xl:w-10/12 p-6 break-words">
            <div class="bg-white rounded-xl relative w-full xl:w-1/4 float-left xl:m-5 xl:mt-10 shadow-xl">
                <img class="absolute z-10 -top-4 -right-4" src="{{ asset('images/landing/tape.png') }}" alt="">
                <div class="bg-purple-300/60 p-5 pb-0">
                    <img class="w-full h-auto" src="{{ asset('images/landing/restaurant.svg') }}" alt="">
                </div>
                <div class="py-3 px-6">
                    <span class="w-fit px-3 bg-purple-500 text-white rounded-full">سرشناس - لاکچری</span>
                    <p class="mt-3 p-3">
                        <b>نام کسب و کار :</b> رستوران "پالرمو"
                        <br>
                        <b>سابقه فعالیت :‌</b> ۱۵ سال
                        <br>
                        <b>هدف تبلیغاتی :</b> تبدیل شدن به یک برند خاص در سطح شهر
                    </p>
                </div>
                <img class="absolute z-10 -bottom-5 -left-5" src="{{ asset('images/landing/tape.png') }}" alt="">
            </div>
            <div class="px-5 pt-[60px] text-lg leading-loose text-[#0102B5]">
                <h4 class="text-2xl">مثال #2</h4>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                </p>
            </div>
        </div>
    </section>
</x-layout.landing>