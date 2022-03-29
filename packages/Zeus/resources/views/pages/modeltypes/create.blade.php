@extends('zview::layouts.default')

@push('head')
<title>Creating Model Type | ZEUSCMS</title>
{{-- @livewireStyles --}}
@endpush

@php
$table_name_unslugified = str_replace('_', ' ', $table);
$helper = [
    'name_singular' => ucwords(\Illuminate\Support\Str::singular($table_name_unslugified)),
    'name_plural' => ucwords(\Illuminate\Support\Str::plural($table_name_unslugified, 3)),
    'slug' => \Illuminate\Support\Str::slug($table_name_unslugified),
];
@endphp

@section('content')
<h1 class="title">Creating Model type from `{{ $table }}` table</h1>
<form action="{{ route('zeus.modeltypes.store') }}" class="p-4 mt-3" method="post">
    @csrf
    <input type="hidden" name="namespace" value="{{ $table }}">
    <div class="w-full xl:w-3/4 bg-white p-4 shadow-md">
        <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-2 grid-flow-row gap-4 place-content-center full-input" >
            <p class="xl:col-span-2 font-sans text-xl font-medium">- General</p>
            <x-zview::forms.text-input value="" name="model_class" label="Model Class" class="p-2" placeholder="Model class e.g App\Models\User"/>
            <x-zview::forms.text-input :value="$helper['slug']" name="slug" label="Slug" class="p-2" placeholder="slug for model type url"/>
            <x-zview::forms.text-input :value="$helper['name_singular']" name="name_singular" label="Singular Name" class="p-2"/>
            <x-zview::forms.text-input :value="$helper['name_plural']" name="name_plural" label="Plural Name" class="p-2"/>
        </div>
    </div>
    <div class="w-full xl:w-3/4 bg-white p-4 mt-3 shadow-md">
        <div class="w-full mb-3 grid grid-cols-1 xl:grid-cols-4 grid-flow-row gap-4 place-content-center full-input">
            <p class="xl:col-span-2 font-sans text-xl font-medium">- Controller</p>
            <x-zview::forms.text-input value="" name="controller" label="Controller" 
            class="p-2 col-span-3" placeholder="Controller class e.g App\\Http\\Controllers\\{{ str_replace(' ', '', $helper['name_singular']) }}Controller"/>
            <x-zview::forms.text-input value="" name="api_controller" label="Api Controller" 
            class="p-2 col-span-3" placeholder="Controller class e.g App\\Http\\Controllers\\Api\\{{ str_replace(' ', '', $helper['name_singular']) }}Controller"/>
            <x-zview::forms.text-input value="" name="policy" label="Policy" 
            class="p-2 col-span-2" placeholder="Policy class e.g App\\Policies\\{{ str_replace(' ', '', $helper['name_singular']) }}Policy"/>
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
                                <option value="{{ $value }}">{{ $title }}</option>
                            @endforeach
                        </select>
                    @else
                        <input type="text" class="solid-input mt-1 ml-2 w-full md:w-auto" name="details[{{ $name }}]" id="{{ $name }}" value="{{ old('details['.$name.']') }}">
                    @endif
                </div>
            @endforeach
            {{-- <div class="p-2">
                <label for="icon">
                    <span class="text-gray-700 italic">Icon :</span>
                </label>
                
            </div> --}}
            <div class="p-2">
                <label for="pagination">
                    <span class="text-gray-700 italic">Pagination :</span>
                </label>
                <input type="number" class="solid-input mt-2 w-full md:w-auto" name="pagination" id="pagination" value="0" step="1" min="0" max="20">
            </div>
            <div class="p-2">
                <label for="soft_delete" class="flex items-center cursor-pointer relative mb-4">
                    <input type="checkbox" name="soft_delete"
                    id="soft_delete" class="sr-only">
                    <div class="toggle-bg bg-gray-200 border-2 border-gray-200 h-6 w-11 rounded-full"></div>
                    <span class="ml-1 text-gray-900 text-sm font-medium">Soft Delete</span>
                </label>
            </div>
        </div>
        <div class="ml-2">
            <label for="json_details">
                <span class="text-gray-700 italic">Details in json :</span>
            </label>
            <textarea name="details[json]" id="json_details" class="jsontext mt-3 w-full bg-blue-yonder-dark rounded-md p-3 text-yellow-300" rows="12" placeholder="// {}"></textarea>
        </div>
    </div>
    @include('zview::pages.modeltypes.create-rows')
    {{-- @livewire('zeus.model-types.create', ['cols' => $columns]) --}}
    <div class="w-full bg-white flex justify-center mt-1 p-3">
        <button class="btn btn-green" type="submit"><i class="fas fa-save mr-2"></i>Save</button>
    </div>
</form>
@endsection
{{-- 
@push('scripts')
@livewireScripts
<script>
    document.addEventListener("DOMContentLoaded", () => {
        Livewire.hook('element.updated', (el, component) => {
            if (el.classList.contains('extra') && el.classList.contains('hidden')) {
                if (openTableRows.indexOf(el.getAttribute('wire:key')) > -1) {
                    el.classList.remove('hidden')
                    el.classList.add('table-row')
                }
            }
        })
    });
</script>
@endpush --}}