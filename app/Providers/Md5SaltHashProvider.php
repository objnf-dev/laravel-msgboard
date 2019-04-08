<?php

namespace App\Providers;

use App\Hasher\Md5SaltHasher\Md5SaltHasher;
use Illuminate\Support\ServiceProvider;

class Md5SaltHashProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('hash', function (){
            return new Md5SaltHasher();
        });
    }

}
