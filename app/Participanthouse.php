<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;

class Participanthouse extends Model
{
    //
    protected $guarded = ['id'];

    use Hashidable;

    public function participantsAttached()
    {

        return $this->hasMany(Participant::class,'house_id');

    }

}
