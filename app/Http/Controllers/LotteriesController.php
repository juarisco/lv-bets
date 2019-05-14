<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lottery;

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
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:3|max:20|unique:lotteries',
        //     // 'description' => 'string',
        //     'type' => 'required|in:raffle,lottery',
        //     'image' => 'image'
        // ]);

        // upload the image to storage
        $image = $request->image->store('lotteries');

        // create the object lottery or raffle
        Lottery::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'type' => $request->type,
            'image' => $image,
        ]);

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
