<?php

namespace App\Http\Controllers;

use App\Time;
use App\Result;
use App\Lottery;
use Illuminate\Http\Request;
use App\Http\Requests\results\CreateResultRequest;
use App\Http\Requests\results\UpdateResultRequest;

class ResultsController extends Controller
{
    /**
     * Verify if there're not any lottery or time to redirect to create lotteries and times.
     */
    public function __construct()
    {
        $this->middleware('VerifyLotteriesAndTimesCount')->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('results.index')->withResults(Result::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        if ($type == 'raffle' or $type == 'lottery') {
            return view('results.create')
                ->with('lotteries', Lottery::where('type', $type)->get())
                ->with('times', Time::all());
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateResultRequest $request)
    {
        // dd($request->all());
        Result::create($request->all());

        session()->flash('success', 'Result created successfully.');

        return redirect()->route('results.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        return view('results.edit')
            ->with('result', $result)
            ->with('lotteries', Lottery::where('type', $result->lottery->type)->get())
            ->with('times', Time::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->all());

        session()->flash('success', 'Result updated successfully.');

        // return redirect()->route('results.index');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();

        session()->flash('success', 'Result deleted successfully!');

        return redirect()->route('results.index');
    }
}
