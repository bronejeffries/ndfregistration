<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Hashidable;

class Participant extends Model
{
    //

    use Hashidable;

    protected $guarded = ['id'], $attributes = [
        'payment_reference'=>0
    ];

    public function ekn()
    {
        return $this->belongsTo(Ekisakaate::class,'ekn_id');
    }

    public function resolveRouteBinding($value)
    {
        $id = Hashids::connection(get_called_class())->decode($value)[0] ?? null;
        return $this->where('id', $id)->first() ?? abort(404);

    }


}
