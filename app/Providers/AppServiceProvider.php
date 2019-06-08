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
        $lotteries = Lottery::orderBy('name')->where('type', 'lottery')->get();
        $raffles = Lottery::orderBy('name')->where('type', 'raffle')->get();

        View::share([
            'menu_lotteries' => $lotteries,
            'menu_raffles' => $raffles,
        ]);
        // View::share('menu_lotteries', $lotteries);
        // View::share('menu_raffles', $raffles);
    }
}
