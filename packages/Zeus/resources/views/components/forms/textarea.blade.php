<div class="p-3 lg:col-span-2">
    @if ($label)
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    @endif
    <textarea name="{{ $attrs['name'] }}" id="id_{{ $row->field }}" class="simple-textarea w-full mt-1 ml-2 {{ $errors->has($attrs['name']) ? 'invalid' : '' }}" cols="30" rows="10" {{ $required }}>{{ $value }}</textarea>
    @error($attrs['name'])
    <ul class="mt-1 ml-2 w-full list-inside list-disc text-salsa">
        @foreach ($errors->get($attrs['name']) as $err)
        <li>{{ $err }}</li>
        @endforeach
    </ul>
    @enderror
</div>