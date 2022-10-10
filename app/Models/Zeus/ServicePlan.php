<?php

namespace App\Models\Zeus;

use Zeus\Models\ZeusModel;

class ServicePlan extends ZeusModel
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function scopeUnexpired($builder)
    {
        $builder->whereNull('expires_at')->orWhere('expires_at', '>', now());
    }
}
