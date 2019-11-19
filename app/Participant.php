<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;
use \Hashids;

class Participant extends Model
{
    //

    use Hashidable;

    protected $guarded = ['id'], $attributes = [
        'payment_status'=>"PENDING"
    ];

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


}
