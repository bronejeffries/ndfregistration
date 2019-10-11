<?php

namespace App\Http\Controllers;

use App\Activeyear;
use Illuminate\Http\Request;

class ActiveyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $activeyears = Activeyear::all();
        return view('activeyear.index',compact('activeyears'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('activeyear.create');
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
        $new_year = $request->validate([
            'name'=>'required|string'
        ]);

        try {
            Activeyear::create($new_year);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('warning','Something Went Wrong');
        }

        return redirect( route('activeyears.index'))->with('success','New Year Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activeyear  $activeyear
     * @return \Illuminate\Http\Response
     */
    public function show(Activeyear $activeyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activeyear  $activeyear
     * @return \Illuminate\Http\Response
     */
    public function edit(Activeyear $activeyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activeyear  $activeyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activeyear $activeyear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activeyear  $activeyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activeyear $activeyear)
    {
        //
    }
}
