<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;
use App\Http\Requests\lotteries\CreateLotteryRequest;
use App\Http\Requests\lotteries\UpdateLotteryRequest;
use Illuminate\Support\Facades\Storage;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
            Storage::delete($lottery->image);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lottery $lottery)
    {
        $lottery->delete();

        session()->flash('success', ucfirst($lottery->type) . ' deleted successfully.');

        return redirect()->route('lotteries.index');
    }
}
