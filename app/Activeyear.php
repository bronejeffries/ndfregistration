<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activeyear extends Model
{
    //

    protected $guarded = ['id'];

    public function ekns()
    {
        return $this->hasMany(Ekisakaate::class,'activeyear_id');
    }

}
