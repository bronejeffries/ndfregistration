<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;
use \PDF;

class MakeIDController extends Controller
{
    //


    public function participantID(Participant $participant)
    {

        $pdf = PDF::loadView('tags/participantTag',compact('participant'));
        return $pdf->stream("participant-TAG-ID".$participant->getRouteKey().".pdf");
    }

}
