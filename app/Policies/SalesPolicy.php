<?php

namespace App\Policies;

use App\Models\Sales;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class SalesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function manageOwnShopAndSales(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_own_shop_and_sales",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to own or manage a shop. Apply for trader account");
    }

    public function monitorOthersShopAndSales(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "monitor_others_shop_and_sales",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to monitor others shop and sales");
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
     * @param  \App\Models\Sales  $sales
     * @return mixed
     */
    public function update(User $user, Sales $sales)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sales  $sales
     * @return mixed
     */
    public function delete(User $user, Sales $sales)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sales  $sales
     * @return mixed
     */
    public function restore(User $user, Sales $sales)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Sales  $sales
     * @return mixed
     */
    public function forceDelete(User $user, Sales $sales)
    {
        //
    }
}
