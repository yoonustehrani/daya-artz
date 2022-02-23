<?php

namespace App\Models;

use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuidAsPrimaryKey;
    protected $fillable = ['transaction_id', 'status', 'amount', 'provider', 'user_id'];
    protected $hidden = ['transaction_id'];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
