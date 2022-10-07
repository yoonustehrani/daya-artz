<?php

namespace Zeus\Policies;


use Zeus\Models\ZeusModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use Zeus\Models\User;
use Zeus\Traits\ZeusPolicyHelper;

class AdminPolicy
{
    use HandlesAuthorization, ZeusPolicyHelper;
    /**
     * Determine whether the user can view any models.
     *
     * @param  \Zeus\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $admin)
    {
        return $admin->has_role(config('zconfig.roles.full-access', 'superadmin'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Zeus\Models\User  $admin
     * @param  \App\Models\ZeusModel $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $admin, User $user)
    {
        return $this->can_handle_admin_stuff($admin) && $admin->id !== $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Zeus\Models\User  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $admin)
    {
        return true; // $admin->has_permission('create_' . $permission_slug);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Zeus\Models\User  $admin
     * @param  \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $admin, User $user)
    {
        return $this->can_handle_admin_stuff($admin) && $admin->id !== $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Zeus\Models\User  $admin
     * @param  \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $admin, User $user)
    {
        return $this->can_handle_admin_stuff($admin) && $admin->id !== $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Zeus\Models\User  $admin
     * @param  \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $admin, User $user)
    {
        return true; // $admin->has_permission('restore_' . $permission_slug);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Zeus\Models\User  $admin
     * @param  \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $admin, User $user)
    {
        return true; // $admin->has_permission('force_delete_' . $permission_slug);
    }
}
