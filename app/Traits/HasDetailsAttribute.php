<?php

namespace App\Traits;

trait HasDetailsAttribute
{
    protected function setDetailsAttribute($details)
    {
        if (is_string($details)) {
            $details = json_decode($details);
        }
        $this->attributes['details'] = json_encode($details ?? []);
    }
    protected function getDetailsAttribute($details)
    {
        return json_decode($details);
    }
    /**
     * @param array $keys
     * @return void
     */
    public function exclude_from_details($keys)
    {
        $details = collect((array) json_decode($this->attributes['details']));
        $details = $details->filter(fn($value, $key) => ! in_array($key, $keys));

        $this->attributes['details'] = $details;
    }
}