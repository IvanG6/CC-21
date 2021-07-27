<?php

namespace App\Providers;

use App\Contracts\Client\Services\Authentication\AuthenticationServiceContract;
use App\Contracts\Common\Services\Code\CodeContract;
use App\Services\Client\Authentication\AuthenticationService;
use App\Services\Common\Code\CodeService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Contracts\Coach\Services\Authentication\AuthenticationServiceContract as CoachAuthenticationServiceContract;
use App\Services\Coach\Authentication\AuthenticationService as CoachAuthenticationService;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthenticationServiceContract::class, AuthenticationService::class);
        $this->app->bind(CodeContract::class, CodeService::class);
        $this->app->bind(CoachAuthenticationServiceContract::class, CoachAuthenticationService::class);
    }
}
