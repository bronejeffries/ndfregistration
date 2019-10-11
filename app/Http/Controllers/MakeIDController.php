<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class MakeIDController extends Controller
{
    //


    public function participantID(Participant $participant)
    {

        return view('tags.participantTag',compact('participant'));
    }

}
