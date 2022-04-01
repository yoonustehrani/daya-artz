<?php

namespace App\Models\Zeus;

use App\Traits\HasDetailsAttribute;
use App\Traits\HasUuidAsPrimaryKey;
use Zeus\Models\ZeusModel;

class Company extends ZeusModel
{
    use HasUuidAsPrimaryKey, HasDetailsAttribute;
    public function getAsTextAttribute()
    {
        return "{$this->title} {$this->title_en}";
    }
    public function business_type()
    {
        return $this->belongsTo(Definition::class, 'business_type_id');
    }
    public function product_type()
    {
        return $this->belongsTo(Definition::class, 'product_type_id');
    }
}
