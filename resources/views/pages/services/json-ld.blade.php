<script type="application/ld+json">
    [{
        "@context": "https://schema.org/",
        "@type": "Product",
        "name": "{{ $service->title }}",
    @if ($image_path)
        "image": ["
            {{ $image_path }}"
        ],
    @endif
    @if ($seo)
        "description": "{{ $seo->description }}",
    @endif
        "sku": "daya-{{ $service->id }}",
        "brand": {
            "@type": "Brand",
            "name": "{{ get_setting('seo.services.brand', 'Daya Artz') }}",
            "logo": "{{ get_setting('seo.brand.logo', 'https://dayaartz.com/images/daya-cyan-logo.png') }}"
        },
        @if ($offers->count())
        "offers": {
            "@type": "Offer",
            "url": "{{ request()->url() }}",
            "priceCurrency": "IRR",
            "price": "{{ ($service->price ?: $offers[0]->price) * 10 }}",
            "priceValidUntil": "{{ $offers[0]->updated_at->addMonths(6)->format('Y-m-d') }}",
            "itemOffered": {
                "@type": "Service",
                "name": "{{ $service->title }}"
            },
            "availability": "https://schema.org/OnlineOnly"
        },
        @endif
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.5",
            "reviewCount": "{{ $service->id * 15 }}"
        }
    },{
        "@context": "https://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "خدمات",
            "item": "{{ route('services.index') }}"
          },{
            "@type": "ListItem",
            "position": 2,
            "name": "{{ $service->title }}",
            "item": "{{ route('services.show', ['slug' => $service->slug]) }}"
        }]
    }]
</script>
