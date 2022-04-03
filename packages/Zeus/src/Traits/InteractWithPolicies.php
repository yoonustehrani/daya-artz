<?php

namespace Zeus\Traits;

use Illuminate\Support\Facades\Gate;

trait InteractWithPolicies
{
    public function registerPolicies()
    {
        foreach ($this->policies() as $key => $value) {
            Gate::policy($key, $value);
        }
    }
    public function policies()
    {
        return $this->policies;
    }
}