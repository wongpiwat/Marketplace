<?php

namespace App\Policies;

use App\User;
use App\Market;
use App\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarketPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the market.
     *
     * @param  \App\User  $user
     * @param  \App\Market  $market
     * @return mixed
     */
    public function view(User $user, Market $market)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create markets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->isSuperAdmin() || $user->type === 'organizer';
    }

    /**
     * Determine whether the user can update the market.
     *
     * @param  \App\User  $user
     * @param  \App\Market  $market
     * @return mixed
     */
    public function update(User $user, Market $market)
    {
        //
        return $user->id === $market->created_by;
    }

    /**
     * Determine whether the user can delete the market.
     *
     * @param  \App\User  $user
     * @param  \App\Market  $market
     * @return mixed
     */
    public function delete(User $user, Market $market)
    {
        //
        return $user->isSuperAdmin() || $user->id === $market->created_by;
    }

    public function getForm(User $user) {
      return $user->isSuperAdmin() || $user->id === $market->created_by;
    }

}
