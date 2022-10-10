<?php

namespace App\Models\Zeus;

use App\Traits\HasDetailsAttribute;
use App\Traits\HasUuidAsPrimaryKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Zeus\Models\ZeusModel;

class Transaction extends ZeusModel
{
    use HasFactory, HasDetailsAttribute;
    const VERIFIED_STATUS = 'verified';
    const APPROVED_STATUS = 'approved';
    const CANCELED_STATUS = 'canceled';
    const PENDING_STATUS = 'pending';
    protected $fillable = ['transaction_id', 'status', 'amount', 'provider', 'user_id'];
    protected $hidden = ['transaction_id'];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
