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
        return view('frontend.showLotteryResults')
            ->with('lottery', $lottery)
            ->with('results', $lottery->results()->paginate(2));
    }
}
