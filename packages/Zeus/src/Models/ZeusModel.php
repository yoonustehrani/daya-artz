<?php

namespace Zeus\Models;

use Illuminate\Database\Eloquent\Model;
use ZeusExtensions\SeoTool\Traits\HasSeoConfigured;
use Zeus\Traits\AdjustmentsTracker;
use Zeus\Traits\FiltersQuery;

class ZeusModel extends Model
{
    use FiltersQuery, AdjustmentsTracker, HasSeoConfigured;
    public $asText;
    public function getAsTextAttribute()
    {
        return $this->asText ? $this->getAttribute($this->asText) : "{$this->getKeyName()}:{$this->getKey()}";
    }
}