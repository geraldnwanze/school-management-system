<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Blade;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHelpers();
    }

    public function loadHelpers()
    {
        if (file_exists(app_path().'/Helpers/Role.php')) {
            require_once(app_path().'/Helpers/Role.php');
        }
    }
}
