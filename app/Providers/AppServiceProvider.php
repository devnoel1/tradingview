<?php

namespace App\Providers;

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
        $this->register();
        \Gate::define('admin', function ($user) {
    if ($user->type == 'admin') {
        return true;
    }
    return false;
     });
    \Gate::define('affiliate', function ($user) {
    if ($user->type == 'affiliate') {
        return true;
    }
    return false;
     });
        \Gate::define('employee', function ($user) {
     if ($user->type == 'employee') {
        return true;
    }
    return false;
     });
  \Gate::define('isAllow', function ($user) {
     if ($user->type == 'employee' || $user->type == 'admin') {
        return true;
    }
    return false;
     });        

    }
}
