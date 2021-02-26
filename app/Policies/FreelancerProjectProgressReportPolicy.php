<?php

namespace App\Policies;

use App\Models\FreelancerProjectProgressReport;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FreelancerProjectProgressReportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function manageFreelancersAndProjects(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "manage_freelancers_and_projects",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to manage freelancers and projects");
    }
    
    
     public function workOnProjects(User $user)
    {
        //

        $permissions = $user->permissions;
        $splitPermissionsString = explode(",",$permissions);
        $isPermitted = in_array( "work_on_projects",$splitPermissionsString);

        return $isPermitted 
        ? Response::allow() 
        : Response::deny("You do not have the permission to work on projects");
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreelancerProjectProgressReport  $freelancerProjectProgressReport
     * @return mixed
     */
    public function view(User $user, FreelancerProjectProgressReport $freelancerProjectProgressReport)
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
     * @param  \App\Models\FreelancerProjectProgressReport  $freelancerProjectProgressReport
     * @return mixed
     */
    public function update(User $user, FreelancerProjectProgressReport $freelancerProjectProgressReport)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreelancerProjectProgressReport  $freelancerProjectProgressReport
     * @return mixed
     */
    public function delete(User $user, FreelancerProjectProgressReport $freelancerProjectProgressReport)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreelancerProjectProgressReport  $freelancerProjectProgressReport
     * @return mixed
     */
    public function restore(User $user, FreelancerProjectProgressReport $freelancerProjectProgressReport)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FreelancerProjectProgressReport  $freelancerProjectProgressReport
     * @return mixed
     */
    public function forceDelete(User $user, FreelancerProjectProgressReport $freelancerProjectProgressReport)
    {
        //
    }
}
