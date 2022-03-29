<?php

namespace Zeus\Policies;


use Zeus\Models\ZeusModel;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;
use Zeus\Models\User;

class ZeusModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Zeus\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user, $model, string $permission_slug)
    {
        return true; // $user->has_permission('view_any_' . $permission_slug);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ZeusModel $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ZeusModel $model, string $permission_slug)
    {
        return true; // $user->has_permission('view_' . $permission_slug);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Zeus\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, $model, string $permission_slug)
    {
        return true; // $user->has_permission('create_' . $permission_slug);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ZeusModel $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ZeusModel $model, string $permission_slug)
    {
        return true; // $user->has_permission('edit_' . $permission_slug);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ZeusModel $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ZeusModel $model, string $permission_slug)
    {
        return true; // $user->has_permission('delete_' . $permission_slug);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ZeusModel $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ZeusModel $model, string $permission_slug)
    {
        return true; // $user->has_permission('restore_' . $permission_slug);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ZeusModel $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ZeusModel $model, string $permission_slug)
    {
        return true; // $user->has_permission('force_delete_' . $permission_slug);
    }
}
