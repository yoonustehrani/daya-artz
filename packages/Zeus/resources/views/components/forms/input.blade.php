<div class="p-3">
    @if ($label)
    <label for="id_{{ $row->field ?? $attrs['id'] }}">
        <span class="text-gray-700 italic">@lang($row->title) :
            @component('zview::components.forms.utils.required', ['required' => $required]) @endcomponent
        </span>
    </label>
    @endif
    <input {{ $attributes->merge($attrs) }} placeholder="{{ $row->placeholder }}" value="{{ old($attrs['name']) ?: $value }}"
    class="mt-1 ml-2 w-full simple-input {{ $attrs['additional_class'] ?? '' }} {{ $errors->has($attrs['name']) ? 'invalid' : '' }}">
    @error($attrs['name'])
    <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
        @foreach ($errors->get($attrs['name']) as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    @enderror
</div>