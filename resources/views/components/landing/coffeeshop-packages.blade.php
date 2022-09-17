<div class="px-3 py-5 snap-always snap-center bg-amber-900/90 flex flex-col justify-between rounded-md text-white w-full min-w-[95%] md:min-w-0 m-1 md:w-[46%] md:m-[2%] lg:w-[31%] lg:m-[1%] xl:w-[23%] xl:m-[1%]">
    <div class="flex flex-col items-center">
        <div class="bg-white px-3 py-2 my-3 w-fit rounded-full">
            <h3 class="text-amber-600 text-xl font-bold text-center">{{ $title }}</h3>
        </div>
        <p class="underline decoration-2 underline-offset-[9px]">{{ $data['subtitle'] }}</p>
        <ul class="w-full list-inside my-4 leading-loose text-lg">
            @foreach ($data['items'] as $item_title => $item_info)
            <li class="px-3 my-2 flex justify-between items-center">
                <span><i class="fas fa-check-circle ml-2"></i>{{ $item_title }}</span>
                <span class="text-sm align-middle">{{ $item_info }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="relative flex flex-col items-center justify-center w-full">
        <div class="text-center my-5">
            <span class="text-4xl">{{ $data['price']['value'] }}</span>
            <sub>/</sub>
            <span>{{ $data['price']['info'] }}</span>
        </div>
        <button class="my-2 font-semibold duration-300 hover:bg-white hover:text-amber-500 bg-amber-600 text-white text-lg px-3 py-2 w-fit min-w-[50%] rounded-md scroll-to-form">درخواست پکیج</button>
    </div>
</div>