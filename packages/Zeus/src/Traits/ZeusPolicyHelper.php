<?php

namespace Zeus\Traits;

use Zeus\Models\User;

trait ZeusPolicyHelper
{
    public function can_handle_admin_stuff(User $user)
    {
        return $user->has_role(config('zconfig.roles.full-access', 'superadmin'));
    }
}