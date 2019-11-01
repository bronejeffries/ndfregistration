<?php

namespace App\Http\Traits;

use \Hashids;

trait Hashidable
{
    public function getRouteKey()
    {
        return Hashids::connection(get_called_class())->encode($this->getKey());
    }

    public function resolveRouteBinding($value)
    {
        $id = Hashids::connection(get_called_class())->decode($value)[0] ?? null;
        return $this->where('id', $id)->first() ?? abort(404);

    }

}
