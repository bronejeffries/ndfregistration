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
        'open'=>1
    ];


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
