<?php

namespace App\Policies;

use App\User;
use App\Log;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function view(User $user, Log $log)
    {
        //
        return $user->isSuperAdmin();
    }

    public function viewAll(User $user)
    {
        //
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can create logs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function update(User $user, Log $log)
    {
        //
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can delete the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function delete(User $user, Log $log)
    {
        //
        return $user->isSuperAdmin();
    }

    public function getForm(User $user) {
      return $user->isSuperAdmin();
    }
}
