<div class="p-3">
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <input type="hidden" name="tags[value]" value="{{ $value ? $value->pluck('id')->toJson() : null }}">
    <div 
        data-from="{{ $row->field }}[value]"
        data-initial="{{ $value ? $value->toJson() : null }}"
        {{ $attributes->merge($attrs) }}
        zeus-react-multi-select
    ></div>
</div>