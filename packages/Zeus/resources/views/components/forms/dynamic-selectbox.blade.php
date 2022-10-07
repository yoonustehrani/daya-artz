<div class="p-3">
    <input type="hidden" name="{{ $row->field }}" value="{{ old($row->field) ?: $value }}">
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <div {{ $attributes->merge($attrs) }} class="relative" zeus-react-selectbox></div>
    @error($row->field)
    <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
        @foreach ($errors->get($row->field) as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    @enderror
</div>