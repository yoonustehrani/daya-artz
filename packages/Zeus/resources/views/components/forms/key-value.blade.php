<div class="p-3">
    <textarea {{ $attributes->merge($attrs) }} class="hidden">{{ old($attrs['name']) ?: json_encode($value) }}</textarea>
    <div data-target="{{ $attrs['name'] }}" zeus-key-valuue-editor></div>
</div>