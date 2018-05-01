<?php

namespace App\Policies;

use App\User;
use App\Feedback;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the feedback.
     *
     * @param  \App\User  $user
     * @param  \App\Feedback  $feedback
     * @return mixed
     */
    public function view(User $user, Feedback $feedback)
    {
        //
        return $user->isSuperAdmin();
    }

    public function viewAll(User $user)
    {

        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can create feedback.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the feedback.
     *
     * @param  \App\User  $user
     * @param  \App\Feedback  $feedback
     * @return mixed
     */
    public function update(User $user, Feedback $feedback)
    {
        //
    }

    /**
     * Determine whether the user can delete the feedback.
     *
     * @param  \App\User  $user
     * @param  \App\Feedback  $feedback
     * @return mixed
     */
    public function delete(User $user, Feedback $feedback)
    {
        //
        return $user->isSuperAdmin();
    }

    public function getForm(User $user)
    {

        return $user->isSuperAdmin();
    }
}
