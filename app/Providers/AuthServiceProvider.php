<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        Passport::routes();

        //Passport::enableImplicitGrant();

        Passport::tokensExpireIn(now()->addDays(2));

        Passport::refreshTokensExpireIn(now()->addDays(2));

        Passport::personalAccessTokensExpireIn(now()->addMonths(1));

        $gate->define('isAdmin', function($user) {
            return $user->role->role == 'admin';
        });

        $gate->define('isManager', function($user) {
            return $user->role->role == 'manager';
        });

        $gate->define('isDealer', function($user) {
            return $user->role->role == 'dealer';
        });
		
		$gate->define('isAgent', function($user) {
            return $user->role->role == 'agent';
        });
    }
}
