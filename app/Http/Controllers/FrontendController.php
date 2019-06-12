<?php

namespace App\Http\Controllers;

use App\Result;
use App\Lottery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'resultsLottery' => Result::resultsLastPublishedAt()->whereNotNull('series')->get(),
            'resultsRaffle' => Result::resultsLastPublishedAt()->whereNotNull('time_id')->get(),
            'resultsTotal' => Result::resultsLastPublishedAt()->get(),
        ]);
    }

    public function showLotteryResults(Lottery $lottery)
    {
        if (request()->query('search')) {
            $this->validate(request(), [
                'search' => 'required|sometimes|numeric|digits_between:1,4',
            ]);
        }

        return view('frontend.showLotteryResults')
            ->with('lottery', $lottery)
            ->with('recentResult', ($lottery->is_raffle ? $lottery->results()->take(2)->get() : $lottery->results()->first()))
            ->with('results', $lottery->results()->searched()->simplePaginate(1));
    }
}
