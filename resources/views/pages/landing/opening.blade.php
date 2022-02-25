<x-layout.landing :title="$page->title">
    <x-slot name="header">
        <div class="w-full h-auto">
            <img src="{{ asset('/images/baloone-left.png') }}" alt="baloone-left" class="relative left-0">
            <img src="{{ asset('/images/baloone-right.png') }}" alt="baloone-right" class="relative right-0">
            <div class="px-2 py-4 text-center">
                <p class="text-2xl text-white">زودباش سفارشت رو ثبت کن زمان داره میره</p>
                <div class="flex flex-nowrap justify-center items-start"></div>
            </div>
        </div>
    </x-slot>
</x-layout.landing>