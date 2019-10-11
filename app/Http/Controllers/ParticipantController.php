<?php

namespace App\Http\Controllers;

use Throwable;
use App\Ekisakaate;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\ValidationException;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(request()->ekn_d);
        request()->validate([
            'ekn_d'=>'required|integer'
        ]);

        $ekisakaate = Ekisakaate::find(request()->ekn_d);

        return view('participant.create',compact('ekisakaate'));

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

        try {

            $participant_data = $request->validate([
                'name'=>'required|string',
                'gender'=>'required|string',
                'age'=>'required|integer',
                'class'=>'required|string',
                'school'=>'required|string',
                'residence'=>'required|string',
                'religion'=>'required|string',
                'image_name'=>'nullable|file|image',
                'health_notes'=>'required|string',
                'first_time'=>'required|string',
                // 'years'=>'nullable|string',
                'mother_name'=>'nullable|string',
                'mother_contact'=>'nullable|string',
                'father_name'=>'nullable|string',
                'father_contact'=>'nullable|string',
                'emergency_contact_name'=>'required|string',
                'emergency_contact_tel'=>'required|string',
                'emergency_contact_relationship'=>'required|string',
                'specialNotes'=>'required|string',
                'response'=>'required|string',
                'luganda_classes'=>'required|integer',
                'conscent'=>'required|integer',
                'conscent_date'=>'required|date',
                'agree'=>'required|integer',
                'agree_date'=>'required|date',
                'ekn_id'=>'required|integer'
            ]);

            $newParticipant = Participant::create($participant_data);
        } catch (ValidationException $th) {

            //  dd($th);
            throw $th;

        }catch(Throwable $th){
            // return back()->with('warning','Something Went Wrong');
            dd($th);
        }

        $this->storeImage($newParticipant);

        return redirect(route('participants.show',[$newParticipant]));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
        return view('participant.show',compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
        $ekn = $participant->ekn;
        $image_path = $participant->image_name;

        if ($image_path) {
            File::delete(public_path('storage/'.$image_path));
        }
        $participant->delete();
        return redirect(route('ekns.show',[$ekn]))->with('success','Participant removed successfully');
    }

    public function storeImage(Participant $participant)
    {
        if (request()->has('image_name')) {
            $participant->update(
                [
                    'image_name'=>request()->image_name->store('uploads','public')
                ]
            );

            // $image = Image::make(public_path('storage/'.$participant->image_name))->fit(200,180);
            // $image->save();
        }
    }
}
