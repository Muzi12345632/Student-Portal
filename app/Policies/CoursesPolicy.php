<?php

namespace App\Policies;

use App\Models\Courses;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursesPolicy
{

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Courses $courses): bool
    {
        //
        return $user->id === $courses->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Courses $courses): bool
    {
        //
        return $user->id === $courses->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Courses $courses): bool
    {
        //
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Courses $courses): bool
    {
        //
        return $user->id === $courses->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Courses $courses): bool
    {
        //
        return false;
    }
}
