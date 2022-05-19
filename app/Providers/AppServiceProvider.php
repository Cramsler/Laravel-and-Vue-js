<?php

namespace App\Providers;

use App\Interfaces\ChatCrudInterface;
use App\Interfaces\UserCrudInterface;
use App\Services\ChatService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserCrudInterface::class, function ($app) {
            return new UserService();
        });

        $this->app->bind(ChatCrudInterface::class, function ($app) {
            return new ChatService();
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
