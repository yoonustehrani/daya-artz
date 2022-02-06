<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoiceable()
    {
        return $this->morphTo();
    }
    public function children()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
}
