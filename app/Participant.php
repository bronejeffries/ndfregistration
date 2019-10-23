<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //

    protected $guarded = ['id'], $attributes = [
        'payment_reference'=>0
    ];

    public function ekn()
    {
        return $this->belongsTo(Ekisakaate::class,'ekn_id');
    }

}
