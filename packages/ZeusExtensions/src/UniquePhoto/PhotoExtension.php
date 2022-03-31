<?php

namespace ZeusExtensions\UniquePhoto;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ModelType;
use ZeusExtensions\UniquePhoto\Models\Image;
use ZeusExtensions\Contracts\ExtensionFramework;

class PhotoExtension extends ExtensionFramework
{
    public $name = 'photo_exntension';
    public $relation;
    public $relation_name;
    public $multiple = false;

    public function autoConfig($model)
    {
        if (method_exists($model, 'images')) {
            $this->relation_name = 'images';
        } else if (method_exists($model, 'image')) {
            $this->relation_name = 'image';
        }
        if ($this->relation_name) {
            $this->relation = $model->{$this->relation_name}();
            $this->multiple = $this->relation instanceof \Illuminate\Database\Eloquent\Relations\MorphMany;
        }
    }

    public function shouldBeInjected(): bool
    {
        $this->autoConfig($this->modelType->getModel());
        return isset($this->relation) ? $this->relation->getRelated()->getTable() == 'images' : false;
    }

    public function inject(): string
    {
        return "zview::photo-extension.form";
    }

    public function shouldHandleAdjustment(): bool
    {
        $this->autoConfig($this->modelType->getModel());
        return isset($this->relation) ? $this->relation->getRelated()->getTable() == 'images' : false;
    }

    public function handleAdjustment(Request $request, Model $model): void
    {
        $related_request = $request->input($this->getName().'_value');
        if ($related_request && isset($this->relation)) {
            $related_request = json_decode($related_request);
            if ($this->multiple) {
                $images = collect((array) $related_request)->map(function($image) {
                    return ['file_id' => $image->file_id, 'alt' => $image->alt, 'title' => $image->title];
                })->values()->toArray();
                $model->{$this->relation_name}()->createMany($images);
            } else {
                $image = $model->{$this->relation_name}()->first() ?: new Image();
                $image->file_id = $related_request->file_id;
                $image->alt = $related_request->alt;
                $image->title = $related_request->title;
                if ($image->id) {
                    $image->save();
                } else {
                    $model->{$this->relation_name}()->save($image);
                }
            }
        }
    }

    public function fetchImages(Model $model)
    {
        $images = $model->{$this->relation_name}()->with('file'); // ->only(['id', 'file_id', 'alt', 'title'])
        return $this->multiple ? $images->get() : $images->first();
    }
}