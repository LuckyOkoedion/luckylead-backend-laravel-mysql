<?php

namespace App\Policies;

use App\Models\MaleDressSizesOptions;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class MaleDressSizesOptionsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function manageOptions(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_options",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage options");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MaleDressSizesOptions  $maleDressSizesOptions
     * @return mixed
     */
    public function view(User $user, MaleDressSizesOptions $maleDressSizesOptions)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MaleDressSizesOptions  $maleDressSizesOptions
     * @return mixed
     */
    public function update(User $user, MaleDressSizesOptions $maleDressSizesOptions)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MaleDressSizesOptions  $maleDressSizesOptions
     * @return mixed
     */
    public function delete(User $user, MaleDressSizesOptions $maleDressSizesOptions)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MaleDressSizesOptions  $maleDressSizesOptions
     * @return mixed
     */
    public function restore(User $user, MaleDressSizesOptions $maleDressSizesOptions)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MaleDressSizesOptions  $maleDressSizesOptions
     * @return mixed
     */
    public function forceDelete(User $user, MaleDressSizesOptions $maleDressSizesOptions)
    {
        //
    }
}
