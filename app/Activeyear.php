<?php

namespace App;

use App\Http\Traits\Hashidable;
use Illuminate\Database\Eloquent\Model;

class Activeyear extends Model
{
    //

    use Hashidable;

    protected $guarded = ['id'];

    public function ekns()
    {
        return $this->hasMany(Ekisakaate::class,'activeyear_id');
    }

    public function eknsCount()
    {
        return $this->ekns->count();
    }

}
