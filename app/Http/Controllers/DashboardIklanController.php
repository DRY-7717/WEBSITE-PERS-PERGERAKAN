<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardIklanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.ads.index', [
            'title' => 'Pers pergerakan | Ads',
            'ads' => iklan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.ads.create', [
            'title' => 'Pers pergerakan | Create ads',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'link' => 'required|unique:iklans',
            'image' => 'file|mimes:image,png,jpg,jpeg,gif',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('ads-image');
        }

        iklan::create($validated);

        return redirect('/dashboard/iklan')->with('message', '<div class="alert alert-success" role="alert">
        Ads has been created!
      </div>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function show(Iklan $iklan)
    {
        //
        return $iklan;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function edit(Iklan $iklan)
    {
        //
        return view('dashboard.ads.edit', [
            'title' => 'Pers pergerakan | Edit ads',
            'ads' => $iklan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iklan $iklan)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'link' => 'required|unique:iklans',
            'image' => 'file|mimes:image,png,jpg,jpeg,gif',
        ]);

        if ($request->file('image')) {
            if ($iklan->image) {
                Storage::delete($iklan->image);
            }
            $validated['image'] = $request->file('image')->store('ads-image');
        }

        Iklan::where('id',$iklan->id)
        ->update($validated);
        return redirect('/dashboard/iklan')->with('message', '<div class="alert alert-success" role="alert">
        Ads has been updated!
      </div>');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iklan  $iklan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iklan $iklan)
    {
        //
        if ($iklan->image) {
            Storage::delete($iklan->image);
        }

        Iklan::destroy($iklan->id);
        return redirect('/dashboard/iklan')->with('message', '<div class="alert alert-success" role="alert">
        Ads has been deleted!
      </div>');
    }
}
