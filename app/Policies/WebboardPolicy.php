<?php

namespace App\Policies;

use App\User;
use App\Webboard;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebboardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the webboard.
     *
     * @param  \App\User  $user
     * @param  \App\Webboard  $webboard
     * @return mixed
     */
    public function view(User $user, Webboard $webboard)
    {
        //

    }

    /**
     * Determine whether the user can create webboards.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the webboard.
     *
     * @param  \App\User  $user
     * @param  \App\Webboard  $webboard
     * @return mixed
     */
    public function update(User $user, Webboard $webboard)
    {
        //
        return $user->id === $webboard->created_by;
    }

    /**
     * Determine whether the user can delete the webboard.
     *
     * @param  \App\User  $user
     * @param  \App\Webboard  $webboard
     * @return mixed
     */
    public function delete(User $user, Webboard $webboard)
    {
        //
        
        return $user->id === $webboard->created_by || $user->isSuperAdmin();
    }

    public function deleteReply(User $user, WebboardReply $webboardReply)
    {
        //

        return $user->id === $webboardReply->created_by || $user->isSuperAdmin();
    }
}
