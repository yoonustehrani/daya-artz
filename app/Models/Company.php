<?php

namespace App\Models;

use App\Traits\HasDetailsAttribute;
use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasUuidAsPrimaryKey, HasDetailsAttribute;
    public function business_type()
    {
        return $this->belongsTo(Definition::class, 'business_type_id');
    }
    public function product_type()
    {
        return $this->belongsTo(Definition::class, 'product_type_id');
    }
}
