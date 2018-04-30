<?php

namespace App\Policies;

use App\User;
use App\WebboardReply;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebboardReplyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the webboardReply.
     *
     * @param  \App\User  $user
     * @param  \App\WebboardReply  $webboardReply
     * @return mixed
     */
    public function view(User $user, WebboardReply $webboardReply)
    {
        //
    }

    /**
     * Determine whether the user can create webboardReplies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the webboardReply.
     *
     * @param  \App\User  $user
     * @param  \App\WebboardReply  $webboardReply
     * @return mixed
     */
    public function update(User $user, WebboardReply $webboardReply)
    {
        //
    }

    /**
     * Determine whether the user can delete the webboardReply.
     *
     * @param  \App\User  $user
     * @param  \App\WebboardReply  $webboardReply
     * @return mixed
     */
    public function delete(User $user, Webboard $webboard, WebboardReply $webboardReply)
    {
        //
        return $user->id === $webboardReply->created_by || $user->id === $webboard->created_by || $user->isSuperAdmin();
    }
}
