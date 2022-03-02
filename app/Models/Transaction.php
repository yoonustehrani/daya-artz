<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuidAsPrimaryKey, HasFactory;
    protected $fillable = ['transaction_id', 'status', 'amount', 'provider', 'user_id'];
    protected $hidden = ['transaction_id'];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function getProviderFaAttribute()
    {
        return __('userarea.transactions.provider.' . $this->provider);
    }
}
