<?php

namespace App\Http\Controllers;

use App\Time;
use Illuminate\Http\Request;
use App\Http\Requests\times\CreateTimeRequest;
use App\Http\Requests\times\UpdateTimeRequest;

class TimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('times.index')->withTimes(Time::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('times.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTimeRequest $request)
    {
        // attributes
        $data = $request->only(['number_time', 'alias', 'description']);

        // create the object time
        Time::create($data);

        // flash message
        session()->flash('success', 'Time ' . ucfirst($request->alias) . ' created successfully.');

        // redirect ..
        return redirect()->route('times.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        return view('times.edit')->withTime($time);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTimeRequest $request, Time $time)
    {
        // attributes
        $data = $request->only(['number_time', 'alias', 'description']);

        // update attributes
        $time->update($data);

        // flash message
        session()->flash('success', 'Time ' . ucfirst($request->alias) . ' updated successfully.');

        // redirect ..
        return redirect()->route('times.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $time = Time::withTrashed()->where('slug', $slug)->firstOrFail();

        if ($time->results->count() > 0) {
            session()->flash('error', 'Time ' . ucfirst($time->alias) . ' cannot be deleted, because it has some results.');

            return redirect()->back();
        }

        if ($time->trashed()) {
            $time->forceDelete();
        } else {
            $time->delete();
        }

        session()->flash('success', 'Time ' . ucfirst($time->alias) . ' deleted successfully.');

        return redirect()->route('times.index');
    }

    /**
     * Display a list of all trashed times.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $trashed = Time::onlyTrashed()->get();

        return view('times.index')->withTimes($trashed);
    }

    /**
     * Restore the specified resource in storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function restore($slug)
    {
        $time = Time::withTrashed()->where('slug', $slug)->firstOrFail();

        $time->restore();

        session()->flash('success', 'Time ' . ucfirst($time->alias) . ' restored successfully.');

        return redirect()->back();
    }
}
