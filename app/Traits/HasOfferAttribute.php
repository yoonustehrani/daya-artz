<?php

namespace App\Traits;

trait HasOfferAttribute
{
    public function getOffAttribute()
    {
        if ($this->offer && $this->offer->value) {
            if ($this->offer->value_type === 'percentage') {
                $p = $this->offer->value > 100 ? 100 : $this->offer->value;
                return ($this->total / 100) * $p;
            }
            return $this->offer->value;
        }
        return 0;
    }
}