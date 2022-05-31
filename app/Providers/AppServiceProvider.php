<?php

namespace App\Providers;

use App\Interfaces\ChatCrudInterface;
use App\Interfaces\MessageCrudInterface;
use App\Interfaces\UserCrudInterface;
use App\Services\ChatService;
use App\Services\MessageService;
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

        $this->app->bind(MessageCrudInterface::class, function ($app) {
            return new MessageService();
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
