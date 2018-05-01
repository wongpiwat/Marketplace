<?php

namespace App\Policies;

use App\User;
use App\Market;
use App\Reservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReservationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function view(User $user, Market $market, Reservation $reservation) {
        return $user->type === 'organizer' && $user->id === $market->created_by;
    }

    /**
     * Determine whether the user can create reservations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->type === 'seller';
    }

    public function reserve(User $user, Reservation $reservation){
        return $user->type === 'seller';
    }

    /**
     * Determine whether the user can update the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function update(User $user, Reservation $reservation)
    {
        //

        return $user->id === $reservation->reserved_by || $user->type == 'organizer' || $user->type == 'administrator';
    }

    /**
     * Determine whether the user can delete the reservation.
     *
     * @param  \App\User  $user
     * @param  \App\Reservation  $reservation
     * @return mixed
     */
    public function delete(User $user, Reservation $reservation)
    {
        //
    }
}
