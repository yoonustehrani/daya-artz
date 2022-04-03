@extends('zview::layouts.default')

@push('head')
<title>Editing {{ $modeltype->namespace }} Model Type | ZEUSCMS</title>
@livewireStyles
@endpush

@section('content')
    <h1 class="title">Editing {{ $modeltype->namespace }} Modeltype</h1>
    <div class="w-full lg:w-1/2 xl:w-1/4 ml-4 mt-4 py-3 pl-2 bg-white shadow-sm rounded-lg">
        <p>Help</p>
        <ul class="ml-4 mt-2 list-disc list-inside inline-block text-sm">
            <li><a data-scroller="true" href="#modeltype-rows">Rows</a></li>
            <li><a data-scroller="true" href="#modeltype-add-row">Add row</a></li>
            <li><a href="{{ route('zeus.modeltypes.relations.index', ['modeltype' => $modeltype->getKey()]) }}">Relations</a></li>
        </ul>
    </div>
    <form action="{{ route('zeus.modeltypes.update', ['modeltype' => $modeltype->getKey()]) }}" class="p-4 mt-3" method="post">
        @csrf
        @method('PUT')
        <div class="w-full xl:w-3/4 bg-white p-4 shadow-md">
            <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-2 grid-flow-row gap-4 place-content-center full-input" >
                <p class="xl:col-span-2 font-sans text-xl font-medium">- General</p>
                <x-zview::forms.text-input :value="old('model_class') ?: $modeltype->model_class" name="model_class" label="Model Class" class="p-2" placeholder="Model class e.g App\Models\User"/>
                <x-zview::forms.text-input :value="old('slug') ?: $modeltype->slug" name="slug" label="Slug" class="p-2" placeholder="slug for model type url"/>
                <x-zview::forms.text-input :value="old('name_singular') ?: $modeltype->name_singular" name="name_singular" label="Singular Name" class="p-2"/>
                <x-zview::forms.text-input :value="old('name_plural') ?: $modeltype->name_plural" name="name_plural" label="Plural Name" class="p-2"/>
            </div>
        </div>
        <div class="w-full xl:w-3/4 bg-white p-4 mt-3 shadow-md">
            <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-4 grid-flow-row gap-4 place-content-center full-input">
                <p class="xl:col-span-2 font-sans text-xl font-medium">- Controller</p>
                <x-zview::forms.text-input :value="old('controller') ?: $modeltype->controller" name="controller" label="Controller" 
                class="p-2 col-span-3" placeholder="Controller class e.g App\\Http\\Controllers\\{{ str_replace(' ', '', $modeltype->name_singular) }}Controller"/>
                <x-zview::forms.text-input :value="old('api_controller') ?: $modeltype->api_controller" name="api_controller" label="Api Controller" 
                class="p-2 col-span-3" placeholder="Controller class e.g App\\Http\\Controllers\\Api\\{{ str_replace(' ', '', $modeltype->name_singular) }}Controller"/>
                <x-zview::forms.text-input :value="old('policy') ?: $modeltype->policy" name="policy" label="Policy" 
                class="p-2 col-span-2" placeholder="Policy class e.g App\\Policies\\{{ str_replace(' ', '', $modeltype->name_singular) }}Policy"/>
            </div>
            <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-2 grid-flow-row gap-4 place-content-center">
                <p class="xl:col-span-2 font-sans text-xl font-medium">- Extra</p>
                @foreach ($option_fields as $name => $field)
                    <div class="p-2">
                        <label for="{{ $name }}">
                            <span class="text-gray-700 italic">{{ $field['title'] }} :</span>
                        </label>
                        @if ($field['type'] === 'select')
                            <select class="solid-select w-full ml-2 mt-1" name="details[{{ $name }}]" id="{{ $name }}">
                                @foreach ($field['options'] as $value => $title)
                                    <option value="{{ $value }}" {{ $modeltype->details->{$name} === $value ? 'selected' : '' }}>{{ $title }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" class="solid-input mt-1 ml-2 w-full md:w-auto" name="details[{{ $name }}]" id="{{ $name }}"
                            value="{{ $modeltype->details->{$name} ?? old('details['.$name.']') }}">
                        @endif
                    </div>
                @endforeach
                <div class="p-2">
                    <label for="pagination">
                        <span class="text-gray-700 italic">Pagination :</span>
                    </label>
                    <input type="number" class="solid-input mt-2 w-full md:w-auto" name="pagination" id="pagination" value="{{ old('pagination') ?: ((int) $modeltype->pagination) }}" step="1" min="0" max="20">
                </div>
                <div class="p-2">
                    <label for="soft_delete" class="flex items-center cursor-pointer relative mb-4">
                        <input type="checkbox" name="soft_delete"
                        @if (old('pagination') ?: intval($modeltype->soft_delete))
                            checked
                        @endif
                        value="on"
                        id="soft_delete" class="sr-only">
                        <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                        <span class="ml-1 text-gray-900 text-sm font-medium">Soft Delete</span>
                    </label>
                </div>
            </div>
            {{-- <input type="hidden" name="details[json]"> --}}
            <div class="ml-2">
                <label for="json_details">
                    <span class="text-gray-700 italic">Details in json :</span>
                </label>
                <textarea name="details[json]" id="json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="12" 
                placeholder="// {}">{{ $modeltype->exclude_from_details(array_keys($option_fields)) ? json_encode($modeltype->exclude_from_details(array_keys($option_fields)), JSON_PRETTY_PRINT) : null }}</textarea>
            </div>
            <div class="w-full bg-white flex justify-center mt-1 p-3">
                <button class="btn btn-green" type="submit"><i class="fas fa-save mr-2"></i>Update</button>
            </div>
        </div>
    </form>
    <div id="modeltype-rows" class="w-full bg-white p-4 mt-5 shadow-md overflow-x-auto">
        <p class="text-2xl italic">+ Rows</p>
        @livewire('zeus.model-types.update', ['rows' => $modeltype->rows, 'relations' => $modeltype->relations, 'modeltype' => $modeltype->id])
    </div>
@endsection

@push('scripts')
@livewireScripts
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('message.processed', (message, component) => {
            // setTimeout(function() {
            //     $('#successMessage').fadeOut('fast');
            // }, 1000); 
        })
        // Livewire.hook('element.updated', (el, component) => {
        //     if (el.classList.contains('extra') && el.classList.contains('hidden')) {
        //         if (openTableRows.indexOf(el.getAttribute('wire:key')) > -1) {
        //             el.classList.remove('hidden')
        //             el.classList.add('table-row')
        //         }
        //     }
        // })
    });
    $('a[data-scroller]').on('click', function(e) {
        e.preventDefault()
        document.querySelector($(this).attr('href')).scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
    })
</script>
@endpush