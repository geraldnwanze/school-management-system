<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        $this->loadHelpers();
    }

    public function loadHelpers()
    {
        if (file_exists(app_path().'/Helpers/Role.php')) {
            require_once(app_path().'/Helpers/Role.php');
        }
        if (file_exists(app_path().'/Helpers/Authorize.php')) {
            require_once(app_path().'/Helpers/Authorize.php');
        }
    }

}
