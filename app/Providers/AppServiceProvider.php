<?php

namespace App\Providers;

use App\Contracts\NotificationInterface;
use App\Repositories\ConfirmationCodeLocalRepository;
use App\Repositories\ConfirmationCodeRepositoryInterface;
use App\Repositories\SettingsLocalRepository;
use App\Repositories\SettingsRepositoryInterface;
use App\Repositories\UserLocalRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\Notifications\EmailNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, function () {
            return $this->app->make(UserLocalRepository::class);
        });
        $this->app->bind(SettingsRepositoryInterface::class, function () {
            return $this->app->make(SettingsLocalRepository::class);
        });
        $this->app->bind(ConfirmationCodeRepositoryInterface::class, function () {
            return $this->app->make(ConfirmationCodeLocalRepository::class);
        });
        $this->app->bind(NotificationInterface::class, function () {
            return $this->app->make(EmailNotification::class); // по умолчанию Email
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
