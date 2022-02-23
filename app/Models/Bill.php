<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory, HasUuidAsPrimaryKey;
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
