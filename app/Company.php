<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function business_type()
    {
        return $this->belongsTo(Definition::class, 'business_type_id');
    }
    public function product_type()
    {
        return $this->belongsTo(Definition::class, 'product_type_id');
    }
}
