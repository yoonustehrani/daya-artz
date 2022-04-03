<div class="p-3">
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <div class="mt-1 ml-2">
        @foreach ($options as $key => $title)
        <label class="ml-2" for="id_{{ $row->field }}_{{ $key }}">{{ $title }}</label>
        <input type="radio" name="{{ $row->field }}" id="id_{{ $row->field }}_{{ $key }}" value="{{ $key }}" class="form-radio"
        @if($value === $key) checked @endif />
        @endforeach
    </div>
</div>