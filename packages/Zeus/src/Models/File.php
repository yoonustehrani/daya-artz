<?php

namespace Zeus\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zeus\Traits\AdjustmentsTracker;
use Zeus\Traits\HasUuidAsPrimary;

class File extends Model
{
    use SoftDeletes, HasUuidAsPrimary, AdjustmentsTracker;
    public function getValue()
    {
        return $this->path;
    }
}