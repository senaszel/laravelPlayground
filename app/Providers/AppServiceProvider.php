<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\UserService;
use App\Services\NurseService;
use App\Interfaces\UserServiceInterface;
use App\Interfaces\NurseServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NurseServiceInterface::class, function () {
            return new NurseService();
        });

        $this->app->bind(UserServiceInterface::class, function () {
            return new UserService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
