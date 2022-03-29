<td>
    @if (gettype($value) === 'object')
    <a target="_blank" class="flex justify-center items-center" href="{{ asset($value->path) }}">
        <img class="max-h-[50px] aspect-auto" src="{{ asset($value->thumbnail_path) }}" alt="{{ $value->name }}">
    </a>
    @else
        @if ($attrs['type'] == 'image' && $value)
        <p class="flex justify-center items-center">
            <img class="max-h-[50px] aspect-auto" src="{{ asset($value) }}" alt="">
        </p>
        @else
        <a class="leading-loose rounded-md whitespace-pre-wrap break-words overflow-clip" href="{{ asset($value) }}">{{ $value }}</a>
        @endif
    @endif
</td>