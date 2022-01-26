<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopePublished($builder)
    {
        $builder->where('published', 1);
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
