<?php

namespace Zeus\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Zeus\Models\User;
use Zeus\Traits\ZeusPolicyHelper;

class PermissionPolicy
{
    use HandlesAuthorization, ZeusPolicyHelper;

    public function viewAny(User $user)
    {
        return $this->can_handle_admin_stuff($user);
    }

    public function create(User $user)
    {
        return $this->can_handle_admin_stuff($user);
    }
}