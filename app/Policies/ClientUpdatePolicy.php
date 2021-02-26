<?php

namespace App\Policies;

use App\Models\ClientUpdate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientUpdatePolicy
{
    use HandlesAuthorization;

    public function manageClientsUpdates(User $user)
    {
        //
        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_jobs_and_clients",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage clients");
       
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return mixed
     */
    public function view(User $user, ClientUpdate $clientUpdate)
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
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return mixed
     */
    public function update(User $user, ClientUpdate $clientUpdate)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return mixed
     */
    public function delete(User $user, ClientUpdate $clientUpdate)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return mixed
     */
    public function restore(User $user, ClientUpdate $clientUpdate)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ClientUpdate  $clientUpdate
     * @return mixed
     */
    public function forceDelete(User $user, ClientUpdate $clientUpdate)
    {
        //
    }
}
