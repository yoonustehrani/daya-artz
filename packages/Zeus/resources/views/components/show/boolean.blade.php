<div class="p-1">
    <p class="text-md font-semibold {{ $value ? 'text-green-800' : 'text-red-ryb' }}">
        <i class="far fa-dot-circle"></i>
        <span>{{ $value ? '' : __('Not') }} @lang($row->title)</span>
    </p>
</div>