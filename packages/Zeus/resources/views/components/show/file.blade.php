<div class="p-1 flex items-center gap-3">
    <p class="text-md font-semibold text-gray-500 mr-2">{{ $row->title }}</p>
    @if ($attrs['type'] == 'image' && $value)
        <img class="max-h-[150px] aspect-auto" src="{{ asset($value) }}" alt="">
    @else
        <a class="leading-loose rounded-md whitespace-pre-wrap break-words overflow-clip" href="{{ asset($value) }}">{{ $value }}</a>
    @endif
</div>