<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use \Hashids;

class Participant extends Model
{
    //
    use Hashidable;
    const REGISTRATION_AMOUNT = 10000;
    protected $guarded = ['id'], $attributes = [

        'payment_status'=>"PENDING",
        'participation_fees_paid'=>0,
        'registration_fees'=>0,
        'isCleared'=>0

    ];

    public function getRegistrationFees()
    {
        return $this->REGISTRATION_AMOUNT;
    }

    public function getParticipationFees()
    {
        return $this->ekn->participation_fees;
    }

    public function hasFullyPaid()
    {
        return (
                        (
                            ($this->getParticipationFees())
                                    -
                            ($this->participation_fees_paid)
                        )==0
                );
    }

    public function ekn()
    {

        return $this->belongsTo(Ekisakaate::class,'ekn_id');

    }

    public function isPending()
    {

        return ($this->payment_status == "PENDING" );

    }

    public function houseAttached()
    {

        return $this->belongsTo(Participanthouse::class,'house_id');

    }

    public function getHousename()
    {

        $house = $this->houseAttached;
        return $house!=null?$house->name:"Not assisgned";

    }


}
