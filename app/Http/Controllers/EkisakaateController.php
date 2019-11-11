<?php

namespace App\Http\Controllers;

use App\Activeyear;
use App\Ekisakaate;
use Illuminate\Http\Request;

class EkisakaateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ebkns = Ekisakaate::all();
        return view('ekisakaate.index',compact('ebkns'));

    }

    public function load()
    {
        $ekns = Ekisakaate::latest()->get();
        return view('loadpage.index',compact('ekns'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $c_years = Activeyear::latest()->get();
        return view('ekisakaate.create',compact('c_years'));

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
        // dd($request->all());
        $new_ekn_data = $request->validate([
            'description'=>'required|string',
            'venue'=>'required|string',
            'activeyear_id'=>'required|integer',
            'theme'=>'required|string',
            'translation_version1'=>'required|string',
            'translation_version2'=>'required|string',
            'start_date'=>'required|date',
            'end_date'=>'required|date'
        ]);

        try {
            Ekisakaate::create($new_ekn_data);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('warning','Something went wrong');

        }
        return redirect(route('ekns.index'))->with('success','Started Sucessfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekisakaate  $ekisakaate
     * @return \Illuminate\Http\Response
     */
    public function show(Ekisakaate $ekisakaate)
    {
        //
        $participants = $ekisakaate->participants->where('isPaid',true);
        return view('ekisakaate.show',compact('ekisakaate','participants'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekisakaate  $ekisakaate
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekisakaate $ekisakaate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekisakaate  $ekisakaate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekisakaate $ekisakaate)
    {
        //

            $update_data = $request->validate([
                            'open'=>'required|integer'
                            ]);
            $ekisakaate->update($update_data);
            return back()->with('success','Changes saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekisakaate  $ekisakaate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekisakaate $ekisakaate)
    {
        //
        if ($ekisakaate instanceof Ekisakaate) {
            $ekisakaate->delete();
            return redirect(route('ekns.index'));
        }else {
            return back()->with('info','Sorry, action can not be performed');
        }

    }
}
