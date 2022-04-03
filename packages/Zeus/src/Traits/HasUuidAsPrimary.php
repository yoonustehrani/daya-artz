<?php

namespace Zeus\Traits;

use Ramsey\Uuid\Uuid;

trait HasUuidAsPrimary
{
    public static function bootHasUuidAsPrimary()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
   /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}