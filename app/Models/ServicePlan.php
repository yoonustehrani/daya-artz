<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePlan extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
