<form method="GET" id="filterable-form" class="w-full p-3">
@php
    $filters = [
        'exact' => 'Exactly',
        'contains' => 'Contains',
        'starts_with' => 'Starts with',
        'ends_with' => 'Ends with'
    ];
    $text_rows = $modeltype->rows->filter(fn($r) => in_array($r->type, ['text', 'email', 'number', 'textarea', 'richtext', 'slug']));
    // $bool_rows = $modeltype->rows->filter(fn($r) => in_array($r->type, ['checkbox']));
@endphp
    <div id="filters-list" data-initial="{{ json_encode(request()->query()) }}"></div>
    <div class="w-1/2 flex">
        <div class="p-3">
            <select class="mt-1 mx-1 simple-select" id="filter_row_name">
                @foreach ($text_rows as $row)
                    <option value="{{ $row->field }}">@lang($row->title)</option>
                @endforeach
            </select>
            <select class="mt-1 mx-1 simple-select" id="filter_row_filter_name">
                @foreach ($filters as $filter => $title)
                    <option value="{{ $filter }}">@lang($title)</option>
                @endforeach
            </select>
            <input type="text" class="mt-1 mx-1 simple-input" id="filter_value">
        </div>
        {{-- @foreach ($bool_rows as $row)
            <div class="p-3">
                <input type="checkbox" id="filter_checkbox_{{ $row->field }}">
                <label for="filter_checkbox_{{ $row->field }}">@lang($row->title)</label>
            </div>
        @endforeach --}}
        {{-- 
            <input type="text" name="q" class="simple-input glue-right" id="query" placeholder="@lang('search_by', ['key' => __($searchkey)])" value="{{ old('q') ?: request()->query('q') }}">
        --}}
    </div>
    <div class="flex justify-end">
        <button type="button" id="filter-extension" class="btn bg-blue-yonder text-ghost-white">@lang('Search') <i class="fas fa-search"></i></button>
    </div>
</form>