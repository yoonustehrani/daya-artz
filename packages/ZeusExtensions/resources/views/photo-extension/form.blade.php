@php
    $images = isset($data) ? $extension->fetchImages($data) : null;
    $images = $images ? json_encode($images) : '';
@endphp
<div class="p-3 bg-white my-2 shadow-md zeus-image-form">
    <input 
        type="hidden" 
        name="{{ $extension->getName() }}_value"
        value="{{ old($extension->getName().'_value') ?: $images }}"
    >
    <p class="title">@lang('Image Settings')</p>
    <div class="p-3" id="react-image-picker" data-target="{{ $extension->getName() }}_value" @if($extension->multiple) data-multiple @endif></div>
</div>