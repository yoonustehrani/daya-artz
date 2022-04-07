@if (isset($instance, $slug))
    @php
        $seo = get_seo_settings($slug, $instance);
    @endphp
    @if ($seo)
        <meta name="description" content="{{ $seo->description }}">
    @endif
@endif