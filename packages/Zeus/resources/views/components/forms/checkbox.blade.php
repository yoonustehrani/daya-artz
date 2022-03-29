<div class="p-3 flex items-center justify-start gap-2">
    <input type="checkbox" class="form-checkbox" name="{{ $row->field }}" value="on" id="id_{{ $row->field }}" {{ $value ? 'checked' : '' }}>
    <label class="py-4" for="id_{{ $row->field }}">@lang($row->title)</label>
</div>