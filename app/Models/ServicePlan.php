<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    use HasFactory;
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function scopeUnexpired($builder)
    {
        $builder->whereNull('expires_at')->orWhere('expires_at', '>', now());
    }
}
