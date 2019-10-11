<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //

    protected $guarded = ['id'];

    public function ekn()
    {
        return $this->belongsTo(Ekisakaate::class,'ekn_id');
    }

}
