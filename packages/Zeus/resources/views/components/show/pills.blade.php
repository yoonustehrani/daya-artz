<div class="p-1">
    <p class="text-md font-semibold text-gray-500 inline mr-2">@lang($row->title)</p>
    @if ($value)
        <div class="p-1">
        @foreach ($value as $item)
            <a {{ $attributes->merge($attrs) }} href="{{ $relation->target->get_route('show', ['id' => $item['key']]) }}">
                <i class="fas fa-external-link-alt mx-1"></i>
                {{ $item['value'] }}
            </a>
        @endforeach
    </div>
    @endif
</div>