<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use \Hashids;
class Ekisakaate extends Model
{
    //

    use Hashidable;

    protected $guarded = ['id'];

    protected $attributes = [
        'name'=>'Ekisaakaate',
        'open'=>1,
        "confirmed_participants"=>0
    ];

    public function getTotalRegistrationAmount()
    {
        return (($this->confirmed_participants)*(Participant::REGISTRATION_AMOUNT));
    }

    public function getTotalParticipationAmount()
    {
        $total_amount = 0;
        $confirmed_participants = $this->participants->where("payment_status","success");
        foreach ($confirmed_participants as $key => $participant) {

            $total_amount +=$participant->participation_fees_paid;

        }

        return $total_amount;

    }

    public function activeyear()
    {
        return $this->belongsTo(Activeyear::class,'activeyear_id');
    }

    public function participantsCount()
    {
        return $this->participants->count();
    }

    public function status()
    {
        return (bool)$this->open?"OPEN":"CLOSED";
    }

    public function registrationOpen()
    {
        return (bool)$this->open?"":"disabled";
    }

    public function participants()
    {
        return $this->hasMany(Participant::class,'ekn_id');
    }

}
