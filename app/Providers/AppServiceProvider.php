<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Setting;
use View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //error_reporting(0);
        if(DB::connection('mysql')->getSchemaBuilder()->hasTable('settings'))
        {
            $site = Setting::first();
            View::share('site', $site);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
