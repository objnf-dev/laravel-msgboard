<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;

class Md5SaltHashProvider extends EloquentUserProvider
{
    public function __construct($hasher, $model)
    {
        parent::__construct($hasher, $model);
    }

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

    }

}
