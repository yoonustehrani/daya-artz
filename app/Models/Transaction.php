<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transaction_id', 'status'];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
