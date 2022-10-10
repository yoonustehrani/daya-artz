<div class="p-1">
    <p class="text-md font-semibold text-gray-500 inline mr-2">@lang($row->title)</p>
    @if(isset($attrs['href']) && $attrs['href'])
    <a {{ $attributes->merge($attrs) }}><i class="fas fa-external-link-alt mx-1"></i> {{ $value }}</a>
    @else
    <p {{ $attributes->merge($attrs) }}>{{ $value ?: __('unset') }}</p>
    @endif
</div>