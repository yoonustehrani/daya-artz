<div class="p-3 col-span-full">
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <div class="mt-3">
        <textarea name="{{ $row->field }}" id="id_{{ $row->field }}" class="rich-text-editor simple-textarea w-full mt-1 ml-2" cols="30" rows="10" {{ $required }}>{{ $value }}</textarea>
    </div>
</div>