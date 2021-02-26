<?php

namespace App\Policies;

use App\Models\BlogComments;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BlogCommentsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function manageOwnComments(User $user, BlogComments $blogComments)
    {
        //

        $isCommenter = $user->id === $blogComments->commenter;
        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array("manage_own_comment",$splitPermissionsString);

        return $isCommenter && $isPermitted 
        ? Response::allow() 
        : Response::deny('You do not have the permission to manage the comment');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogComments  $blogComments
     * @return mixed
     */
    public function manageOthersComments(User $user, BlogComments $blogComments)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array("manage_others_comment",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage others' comment");
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
     * @param  \App\Models\BlogComments  $blogComments
     * @return mixed
     */
    public function update(User $user, BlogComments $blogComments)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogComments  $blogComments
     * @return mixed
     */
    public function delete(User $user, BlogComments $blogComments)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogComments  $blogComments
     * @return mixed
     */
    public function restore(User $user, BlogComments $blogComments)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogComments  $blogComments
     * @return mixed
     */
    public function forceDelete(User $user, BlogComments $blogComments)
    {
        //
    }
}
