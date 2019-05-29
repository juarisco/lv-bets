<?php

namespace App\Http\Middleware;

use Closure;
use App\Time;
use App\Lottery;

class VerifyLotteriesAndTimesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Lottery::count() == 0 or Time::count() == 0) {
            session()->flash('error', 'You need to add lotteries and times to be able to create a result.');

            return redirect()->route('lotteries.create');
        }

        return $next($request);
    }
}
