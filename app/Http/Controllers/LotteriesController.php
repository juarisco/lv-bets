<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;
use App\Http\Requests\lotteries\CreateLotteryRequest;
use App\Http\Requests\lotteries\UpdateLotteryRequest;

class LotteriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lotteries.index')->with('lotteries', Lottery::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lotteries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLotteryRequest $request)
    {
        // attributes
        $data = $request->only(['name', 'description', 'type']);

        // check if image
        if ($request->hasFile('image')) {
            // upload the image to storage
            $image = $request->image->store('lotteries');

            $data['image'] = $image;
        }

        // create the object lottery or raffle
        Lottery::create($data);

        // flash message
        session()->flash('success', ucfirst($request->type) . ' created successfully.');

        // redirect ..
        return redirect()->route('lotteries.index');
    }

    /**
     * Display the specified result's resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function showResults(Lottery $lottery)
    {
        return view('results.index')
            ->with('lottery', $lottery)
            ->with('results', $lottery->results);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function edit(Lottery $lottery)
    {
        return view('lotteries.edit')->with('lottery', $lottery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lottery  $lottery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLotteryRequest $request, Lottery $lottery)
    {
        $data = $request->only(['name', 'description', 'type']);

        // check if new image
        if ($request->hasFile('image')) {
            // upload it
            $image = $request->image->store('lotteries');

            // delete old one
            $lottery->deleteImage();

            $data['image'] = $image;
        }

        // update attributes
        $lottery->update($data);

        // flash message
        session()->flash('success', ucfirst($request->type) . ' Updated successfully.');

        // redirect ..
        return redirect()->route('lotteries.index');
    }

    /**
     * Remove the specified resource in storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $lottery = Lottery::withTrashed()->where('slug', $slug)->firstOrFail();

        if ($lottery->trashed()) {
            $lottery->deleteImage();

            $lottery->forceDelete();
        } else {
            $lottery->delete();
        }

        session()->flash('success', ucfirst($lottery->type) . ' deleted successfully.');

        return redirect()->route('lotteries.index');
    }

    /**
     * Display a list of all trashed lotteries.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Lottery::onlyTrashed()->get();

        return view('lotteries.index')->withLotteries($trashed);
    }

    /**
     * Restore the specified resource in storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function restore($slug)
    {
        $lottery = Lottery::withTrashed()->where('slug', $slug)->firstOrFail();

        $lottery->restore();

        session()->flash('success', ucfirst($lottery->type) . ' restored successfully.');

        return redirect()->back();
    }
}
