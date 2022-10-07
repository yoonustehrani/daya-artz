@if (request()->query())
<div class="w-full md:w-1/2 lg:w-1/3 shadow-sm rounded-sm  px-3 py-5">
    <p class="text-lg italic"><i class="fas fa-filter mr-2"></i>Current Filters :</p>
    <ul class="mt-3">
    @foreach (request()->query() as $key => $query)
        <li class="inline-block text-sm px-3 py-2 rounded-full bg-mango-lighter shadow-sm m-1">
            <a href="{{ url()->current() . '?' . http_build_query(request()->except($key)) }}" class="mx-1 text-red-900 hover:cursor-pointer"><i class="fas fa-times"></i></a>
            <span class="font-bold">{{ __($key) }}</span>
            <i class="fas fa-long-arrow-alt-right mr-2 ml-2"></i>
            <span>{{ $query }}</span>
        </li>
    @endforeach
    </ul>
</div>
@endif
