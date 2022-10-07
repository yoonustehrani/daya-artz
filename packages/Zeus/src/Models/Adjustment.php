<?php

namespace Zeus\Models;

use Zeus\Traits\HasDetailsAttribute;
use Zeus\Traits\HasUuidAsPrimary;

class Adjustment extends BaseModel
{
    use HasUuidAsPrimary, HasDetailsAttribute;
    protected $table = self::TABLE_PREFIX . 'adjustments';

    public function adjustable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}