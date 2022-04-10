<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" @if($image) xmlns:image="http://www.google.com/schemas/sitemap-image/1.1" @endif>
    @foreach ($items as $item)
        <url>
            <loc>{{ $item->url }}</loc>
            @if($item->updated_at)
            <lastmod>{{ $item->updated_at }}</lastmod>
            @endif
            <changefreq>{{ $item->change_frequency }}</changefreq>
            <priority>{{ $item->priority }}</priority>
            @if ($image && $item->images)
                @foreach ($item->images as $img)
                    <image:image>
                        <image:loc>{{ $img->url }}</image:loc>
                        @if ($img->alt)
                            <image:caption>{{ $img->alt }}</image:caption>
                        @endif
                    </image:image>
                @endforeach
            @endif
        </url>
    @endforeach
</urlset>