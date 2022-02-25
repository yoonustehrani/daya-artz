<x-layout.landing :title="$page->title">
    <x-slot name="header">
        <div class="w-full h-auto bg-gradient-to-b from-indigo-500 to-indigo-600 flex flex-nowrap items-stretch justify-between">
            <img src="{{ asset('/images/baloone-right.png') }}" alt="baloone-right" class="w-fit mr-[-3px]">
            <div class="px-2 py-4 text-center flex flex-col justify-evenly items-center">
                <p class="text-4xl text-white w-full font-bold">زودباش سفارشت رو ثبت کن زمان داره میره</p>
                <ul class="p-0 flex flex-nowrap justify-center items-stretch w-full">
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">45<span class="text-gray-500 text-sm block">ثانیه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">59<span class="text-gray-500 text-sm block">دقیقه</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">23<span class="text-gray-500 text-sm block">ساعت</span></li>
                    <li class="mx-2 bg-slate-50 rounded-md p-3 aspect-square min-w-[88px] inline-block text-gray-900 text-4xl text-center font-bold">09<span class="text-gray-500 text-sm block">روز</span></li>
                </ul>
                <div class="text-center text-2xl w-full text-white rtl leading-[2.5]">
                    <h3 class="font-bold">دایا آرتز در جشنواره افتتاحیه سایتش با رویکرد استارت آپی قصد دارد:</h3>
                    <p>فقط تا پایان مدت این زمان سنج، پکیج های هدف گذاری و خدمات یگانه خود را با تخفیف افتتاحیه به کسب و کار های حرفه ای ارائه دهد. <b>زمان را محاسبه نکنید! امروز دایا آرتز را کشف کنید.</b> بسته های بهینه شده برای کسب و کار شما آماده هستند</p>
                </div>    
            </div>
            <img src="{{ asset('/images/baloone-left.png') }}" alt="baloone-left" class="w-fit">
        </div>
    </x-slot>
</x-layout.landing>