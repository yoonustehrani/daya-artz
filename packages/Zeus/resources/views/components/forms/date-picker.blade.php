@php
    $unit_uuid = $row->field . '_' . \Str::uuid();
@endphp
<div class="p-3">
    @if ($label)
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    @endif
    <div>
        <input type="text" autocomplete="off" readonly id="id_{{ $unit_uuid }}" class="w-full mt-1 ml-2 simple-input">
        <span class="float-right w-10 h-8 bg-transparent items-center justify-center -mt-9 hover:cursor-pointer z-10 sticky clear-date hidden">
            <i class="fas fa-times text-red-500"></i>
        </span>
        <div 
            class="date-picker w-full mt-1 ml-2"
            data-target-id="id_{{ $unit_uuid }}"
            data-options="{{ json_encode(optional($row->details)->date_picker) }}" data-fill="{{ $attrs['name'] }}"
            data-timepicker="{{ isset($timepicker) ? 'true' : '' }}"
        ></div>
        <input type="hidden" name="{{ $attrs['name'] }}" value="{{ $value }}">
    </div>
</div>
@push('scripts')
<script>
    makeUpDatePicker(document.querySelector("div[data-target-id='id_{{ $unit_uuid }}']"));
</script>
@endpush