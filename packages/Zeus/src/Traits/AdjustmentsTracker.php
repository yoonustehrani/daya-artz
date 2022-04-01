<?php

namespace Zeus\Traits;

use Illuminate\Support\Facades\Log;
use Zeus\Models\Adjustment;

trait AdjustmentsTracker
{
    public function adjustments()
    {
        return $this->morphMany(Adjustment::class, 'adjustable');
    }
    public static function bootAdjustmentsTracker()
    {
        static::created(function($model) {
            $model->adjust('create', $model->toArray());
        });
        static::updated(function($model) {
            $model->adjust('update', $model->getAdjustments());
        });
        static::deleted(function($model) {
            $model->adjust('delete', $model->toArray());
        });
        if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses(self::class))) {
            static::restored(function($model) {
                $model->adjust('restore', $model->toArray());
            });
        }
    }
    protected function getAdjustments()
    {
        $before_change = $this->getOriginal();
        $before = [];
        $after = [];
        foreach ($this->getDirty() as $col => $value) {
            if ($col !== $this->getUpdatedAtColumn()) {
                $after[$col] = $value;
                $before[$col] = $before_change[$col] ?? "???";
            }
        }
        return compact('before', 'after');
    }
    /**
     * @param string $type
     * @param string|array $details
     * @return void
     */
    protected function adjust($type, $details)
    {
        $adjustment = new Adjustment();
        $adjustment->type = $type;
        $adjustment->details = is_string($details) ? $details : json_encode($details);
        if (auth('zeus')->id()) {
            $adjustment->user_id = auth('zeus')->id();
            $this->adjustments()->save($adjustment);
        } else {
            Log::emergency("Adjustment without authentication detected !");
            Log::emergency($adjustment->toArray());
        }
    }
}