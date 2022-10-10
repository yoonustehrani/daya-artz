<?php

namespace ZeusExtensions\SeoTool;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Zeus\Models\ModelType;
use ZeusExtensions\Contracts\ExtensionFramework;
use ZeusExtensions\SeoTool\Models\Indexable;
use ZeusExtensions\SeoTool\Traits\HasSeoConfigured;

class SeoTool extends ExtensionFramework
{
    public $name = 'seoTool';
    public $data;
    const META_ROBOTS = ['nofollow','noindex','notranslate','noimageindex','noarchive','nosnippet'];

    public function shouldBeInjected(): bool
    {
        return in_array($this->modelType->namespace, ['posts', 'services', 'portfolios', 'pages']);
    }
    public function shouldHandleAdjustment(): bool
    {
        if (! $this->modelType) return false;
        return in_array($this->modelType->namespace, ['posts', 'services', 'portfolios', 'pages']);
    }
    public function inject(): string
    {
        return 'zview::seotool.seoform';
    }
    public function handleAdjustment(Request $request, $model): void
    {
        $related_request = $request->input($this->getName());
        if ($related_request && $this->hasSeoTrait($model) && $related_request['meta_description'] && $related_request['primary_keyword']) {
            $indexable = $model->seo_settings()->first() ?: new Indexable();
            $indexable->description = $related_request['meta_description'];
            $indexable->primary_keyword = $related_request['primary_keyword'];
            $indexable->primary_keyword_score = 0;
            $indexable->readability_score = 0;
            $indexable->robots = $related_request['meta_robots'] ?? [];
            $indexable->link_count = 0;
            $indexable->reading_time = 0;
            $indexable->og_title = $model->title ?? null;
            $indexable->og_description = $indexable->description;
            if ($indexable->id) {
                $indexable->save();
            } else {
                $model->seo_settings()->save($indexable);
            }
            \Cache::forever("{$this->modelType->slug}.{$model->id}.seo_settings", $indexable);
        }
    }
    public function hasSeoTrait($model)
    {
        $reflection = new \ReflectionClass($model);
        if (in_array(HasSeoConfigured::class, $reflection->getTraitNames())) return true;
        $parent = $reflection->getParentClass();
        return in_array(
            HasSeoConfigured::class,
            $parent->getTraitNames()
        );
    }
}