<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
     protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
         'App\User' => 'App\Policies\UserPolicy',
         'App\Market' => 'App\Policies\MarketPolicy',
         'App\Reservation' => 'App\Policies\ReservationPolicy',
         'App\Log' => 'App\Policies\LogPolicy',
         'App\Feedback' => 'App\Policies\FeedbackPolicy',
         'App\Webboard' => 'App\Policies\WebboardPolicy',

     ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


    }
}
