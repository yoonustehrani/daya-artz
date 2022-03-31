<x-zview-layout-default :title="__('Website')">
    <h1 class="title">Welcome To Your Website !</h1>
    <div class="w-100 p-3 mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">
        @foreach ($modeltypes as $modeltype)
            @can("viewAny-zeus-model", [$modeltype->getModel(), $modeltype->slug])
            <div class="p-3 bg-white shadow-md rounded-md">
                <div class="text-center text-3xl text-gray-700">
                    <i class="{{ $modeltype->details->icon ?? 'fas fa-server' }} fa-2x"></i>
                    <p class="mt-3">@lang($modeltype->name_plural)</p>
                </div>
                <div class="flex gap-2 justify-center mt-5 text-sm">
                    <a href="{{ $modeltype->get_route('index') }}" class="btn-sm bg-mango text-gray-700">
                        <i class="fas fa-list"></i>
                    </a>
                    <a href="{{ $modeltype->get_route('create') }}" class="btn-sm bg-emerald-500 text-white">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            @endcan
        @endforeach
    </div>
</x-zview-layout-default>