<?php

namespace ZeusExtensions\SeoTool\Models;

use Illuminate\Database\Eloquent\Model;

class Indexable extends Model
{
    public $table = 'seo_indexables';
    public $timestamps = false;
    public function indexable()
    {
        return $this->morphTo();
    }
    public function setRobotsAttribute($robots)
    {
        $robots = is_array($robots) ? $robots : [];
        $this->attributes['robots'] = serialize($robots);
    }
    public function getRobotsAttribute($robots)
    {
        return unserialize($robots);
    }
}