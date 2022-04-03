<div class="{{ $attributes['class'] }}">
    @isset($label)
    <label for="{{ $attributes['name'] }}">
        <span class="italic text-gray-700 mb-2">{{ $label ?? '' }} :</span> 
    </label>
    @endisset
    <input type="text" class="solid-input ml-2 mt-1" name="{{ $attributes['name'] }}" id="{{ $attributes['name'] }}" value="{{ $value ?? '' }}" placeholder="{{ $attributes['placeholder'] }}">
</div>