<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
