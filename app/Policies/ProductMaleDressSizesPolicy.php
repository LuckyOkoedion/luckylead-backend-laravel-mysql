<?php

namespace App\Policies;

use App\Models\ProductMaleDressSizes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class ProductMaleDressSizesPolicy
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

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductMaleDressSizes  $productMaleDressSizes
     * @return mixed
     */
    public function view(User $user, ProductMaleDressSizes $productMaleDressSizes)
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
     * @param  \App\Models\ProductMaleDressSizes  $productMaleDressSizes
     * @return mixed
     */
    public function update(User $user, ProductMaleDressSizes $productMaleDressSizes)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductMaleDressSizes  $productMaleDressSizes
     * @return mixed
     */
    public function delete(User $user, ProductMaleDressSizes $productMaleDressSizes)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductMaleDressSizes  $productMaleDressSizes
     * @return mixed
     */
    public function restore(User $user, ProductMaleDressSizes $productMaleDressSizes)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductMaleDressSizes  $productMaleDressSizes
     * @return mixed
     */
    public function forceDelete(User $user, ProductMaleDressSizes $productMaleDressSizes)
    {
        //
    }
}
