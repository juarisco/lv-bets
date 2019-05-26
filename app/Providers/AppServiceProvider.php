<?php

namespace App\Providers;

use App\Lottery;
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
        $lotteries = Lottery::orderBy('type')->orderBy('name')->get();

        View::share('menu_lotteries', $lotteries);
    }
}
