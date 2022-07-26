<?php

namespace App\Providers;

use App\Http\View\Composers\DatComposer;
use App\Http\View\Composers\DataComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        //share data to dashboard      

        View::composer('layouts.dashboard.adm',DataComposer::class);
   
        View::composer('layouts.dashboard.user',DataComposer::class);

    }
}
