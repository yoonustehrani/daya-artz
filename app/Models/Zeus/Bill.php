<?php

namespace App\Models\Zeus;

use App\Traits\HasUuidAsPrimaryKey;
use Zeus\Models\ZeusModel;

class Bill extends ZeusModel
{
    use HasUuidAsPrimaryKey;
    protected $fillable = ['code', 'amount', 'title', 'active'];
    public function scopeActive($builder)
    {
        $builder->where('active', true);
    }
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
