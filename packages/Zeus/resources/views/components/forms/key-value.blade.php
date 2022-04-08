<div class="p-3 lg:col-span-2">
    <label>
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <textarea {{ $attributes->merge($attrs) }} class="hidden">{{ old($attrs['name']) ?: json_encode($value) }}</textarea>
    <div data-target="{{ $attrs['name'] }}" zeus-key-valuue-editor></div>
</div>