<?php

namespace App\Policies;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function managePortfolio(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_company_portfolio",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage company assets");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Portfolio  $portfolio
     * @return mixed
     */
    public function view(User $user, Portfolio $portfolio)
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
     * @param  \App\Models\Portfolio  $portfolio
     * @return mixed
     */
    public function update(User $user, Portfolio $portfolio)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Portfolio  $portfolio
     * @return mixed
     */
    public function delete(User $user, Portfolio $portfolio)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Portfolio  $portfolio
     * @return mixed
     */
    public function restore(User $user, Portfolio $portfolio)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Portfolio  $portfolio
     * @return mixed
     */
    public function forceDelete(User $user, Portfolio $portfolio)
    {
        //
    }
}
