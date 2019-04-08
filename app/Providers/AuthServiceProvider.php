<?php

namespace App\Providers;

use App\Hasher\Md5SaltHasher\Md5SaltHasher;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        Auth::provider('md5salt', function ($app){
            $model = $this->app['config']['auth.model'];
            return new Md5SaltHashProvider(new Md5SaltHasher(), $model);
        });

        Passport::tokensExpireIn(Carbon::now() -> addDays(2));
        Passport::routes();
        //
    }
}
