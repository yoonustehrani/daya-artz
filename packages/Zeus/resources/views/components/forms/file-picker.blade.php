<div class="p-3 flex items-center justify-start gap-3">
    @if ($label)
    <label for="id_{{ $row->field ?? $attrs['id'] }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    @endif
    <input type="hidden" name="{{ $attrs['name'] }}" id="id_{{ $row->field ?? $attrs['id'] }}" value="{{ $value }}">
    <div 
        class="react-file-picker"
        data-upload="{{ route('api.zeus.files.store') }}"
        data-search="{{ route('api.zeus.files.index') }}"
        data-set-to="id_{{ $row->field ?? $attrs['id'] }}"
    ></div>
</div>