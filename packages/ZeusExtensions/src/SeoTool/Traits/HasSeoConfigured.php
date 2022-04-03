<?php

namespace ZeusExtensions\SeoTool\Traits;

use ZeusExtensions\SeoTool\Models\Indexable;

trait HasSeoConfigured
{
    public function seo_settings()
    {
        return $this->morphOne(Indexable::class, 'indexable');
    }
}