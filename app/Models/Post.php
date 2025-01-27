<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Zeus\Models\ZeusModel;

class Post extends ZeusModel
{
    use HasFactory;

    public function scopePublished($builder)
    {
        $builder->whereNull('publishes_at')->orWhere('publishes_at', '<', now());
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
    /**
     * Get all of the tags that are assigned this post.
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function category()
    {
        return $this->morphOne(Category::class, 'categoreable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function related()
    {
        if (is_null($this->getKey())) {
            return [];
        }
        return static::whereHas('tags', function($q) {
            $q->whereIn('name', $this->tags->pluck('name'));
        })->where('id', '<>', $this->getKey());
    }
}
