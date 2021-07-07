<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //To prefix passeport routes
        Route::group(['prefix' => 'api/v1'], function () {                
            Passport::routes();
        });

        Passport::tokensExpireIn(now()->addDays(30));

        Passport::refreshTokensExpireIn(now()->addDays(45));

        Passport::personalAccessTokensExpireIn(now()->addMonths(6));
    }
}
