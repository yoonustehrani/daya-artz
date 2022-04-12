@php
    $seo = get_seo_settings($slug, $instance);
@endphp
@if (isset($instance, $slug))
    @if ($seo)
        <meta name="description" content="{{ $seo->description }}">
    @endif
@endif
<meta property="og:locale" content="fa_IR">
    <meta property="og:site_name" content="دایا آرتز">
    <meta property="og:url" content="{{ request()->url() }}">
@isset($og)
    <meta property="og:type" content="{{ $og['type'] ?? 'website' }}">
    <meta property="og:title" content="{{ $og['title'] ?? '' }}">
    @if ($seo)
    <meta property="og:description" content="{{ $seo->description }}">
    @endif
    @isset ($og['type_details'])
        @foreach ($og['type_details'] as $key => $item)
            <meta property="{{ $og['type'] }}:{{ $key }}" content="{{ $item }}">
        @endforeach
    @endisset
    @isset ($og['image'])
        <meta property="og:image" content="{{ asset($og['image']->path) }}" />
        <meta property="og:image:width" content="400" />
	    <meta property="og:image:height" content="400" />
    @endisset
@endisset