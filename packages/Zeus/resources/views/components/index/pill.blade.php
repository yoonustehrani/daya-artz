<td>
    @isset($attrs['href'])
    <a {{ $attributes->merge($attrs) }} class="pill bg-gray-200 mx-2 py-1"><i class="fas fa-external-link-alt mx-1"></i> {{ $value }}</a>
    @else
    <span class="pill bg-gray-200 mx-2 py-1">{{ $value }}</span>
    @endisset
</td>