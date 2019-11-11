<?php

namespace App\Http\Controllers;

use App\Activeyear;
use App\Ekisakaate;
use App\Http\Resources\ActiveYearResource;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function dashboard()
    {

        $lastyears = Activeyear::latest()->limit(5)->get();
        return view('admin.dashboard',compact('lastyears'));

    }

    public function dashboardtitleApiSummary(){

        $yearscount = Activeyear::all()->count();
        $userscount = User::all()->count();
        $eknsCount = Ekisakaate::all()->count();
        $active_year = new ActiveYearResource(Activeyear::latest()->first());
        $summary = ["yearscount"=>$yearscount,"usersCount"=>$userscount,"eknsCount"=>$eknsCount,"active_year"=>$active_year];
        return response()->json($summary);

    }

    public function yearSummary($yearId)
    {
        $year = Activeyear::find(1);
        $active_year = new ActiveYearResource($year);
        $summary = ["active_year"=>$active_year];
        return response()->json($summary);
    }

}
