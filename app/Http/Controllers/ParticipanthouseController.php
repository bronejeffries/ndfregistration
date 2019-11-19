<?php

namespace App\Http\Controllers;

use App\Ekisakaate;
use App\Participanthouse;
use Illuminate\Http\Request;

class ParticipanthouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $houses = Participanthouse::all();
        return view('participanthouse.index',compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('participanthouse.create');
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
        $new_house = $request->validate([

            'name'=>'required|string'
        ]);

        try {

            Participanthouse::create($new_house);

        } catch (\Throwable $th) {
            throw $th;
            // return back()->with('warning','Something Went Wrong');

        }

        return redirect( route('participanthouses.index'))->with('success','New House Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participanthouse  $participanthouse
     * @return \Illuminate\Http\Response
     */
    public function show(Participanthouse $participanthouse)
    {
        //
        return view('participanthouse.show',compact('participanthouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participanthouse  $participanthouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Participanthouse $participanthouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participanthouse  $participanthouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participanthouse $participanthouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participanthouse  $participanthouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participanthouse $participanthouse)
    {
        //
        $participanthouse->delete();
        return redirect(route('participanthouses.index'))->with('success',"Participant house removed successfully");
    }

    public function assignToParticipants(Ekisakaate $ekisakaate)
    {

        $participantsToAssign = $ekisakaate->participants->where('house_id',null);
        $participanthouses = Participanthouse::all();

        return view('participanthouse.assign',compact('participantsToAssign','participanthouses'));

    }
}
