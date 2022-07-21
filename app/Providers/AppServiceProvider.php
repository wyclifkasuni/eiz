<?php

namespace App\Providers;

use App\Http\View\Composers\DatComposer;
use App\Http\View\Composers\DataComposer;
use Illuminate\Support\Facades\View;
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
        //share data to dashboard
        Schema::defaultStringLength(191);
        View::composer('layouts.dashboard.adm',DataComposer::class);
   
        View::composer('layouts.dashboard.user',DataComposer::class);

    }
}
