<div class="p-3">
    <label for="id_{{ $row->field }}">
        <span class="text-gray-700 italic">@lang($row->title) :</span>
    </label>
    <select class="mt-1 ml-2 w-full simple-select" name="{{ $row->field }}" id="id_{{ $row->field }}">
        @if (isset($attrs['nullable']) && $attrs['nullable'])
        <option value>@lang('zlang::main.messages.nullable-select', ['field' => __($row->title)])</option>
        @endif
        @if ($options)
            @foreach ($options as $key => $title)
            <option value="{{ $key }}" @if($value === $key) selected @endif>{{ $title }}</option>
            @endforeach
        @endif
    </select>
</div>