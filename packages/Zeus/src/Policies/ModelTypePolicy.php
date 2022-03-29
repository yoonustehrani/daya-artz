<?php

namespace Zeus\Policies;

use Zeus\Models\ModelType;
use Illuminate\Auth\Access\HandlesAuthorization;
use Zeus\Models\User;
use Zeus\Traits\ZeusPolicyHelper;

class ModelTypePolicy
{
    use HandlesAuthorization, ZeusPolicyHelper;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Zeus\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;//  $user->has_permission('view_any_model_types');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ModelType  $modelType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ModelType $modelType)
    {
        return true;//  $user->has_permission('view_model_types');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Zeus\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;//  $user->has_permission('create_model_types');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ModelType  $modelType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ModelType $modelType)
    {
        return true;//  $user->has_permission('edit_model_types');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ModelType  $modelType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ModelType $modelType)
    {
        return true;//  $user->has_permission('delete_model_types');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ModelType  $modelType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ModelType $modelType)
    {
        return true;//  $user->has_permission('restore_model_types');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Zeus\Models\User  $user
     * @param  \App\Models\ModelType  $modelType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ModelType $modelType)
    {
        return true;//  $user->has_permission('force_delete_model_types');
    }
}
