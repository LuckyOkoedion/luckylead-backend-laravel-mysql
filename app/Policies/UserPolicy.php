<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function applyForRole(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "apply_for_role",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to apply for role. First create a user account.");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function manageUsers(User $user, User $model)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_users",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage users");
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function createAdminUsers(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "create_admin_users",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to create admin users.");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
