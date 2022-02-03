<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
