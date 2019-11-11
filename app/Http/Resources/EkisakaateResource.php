<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EkisakaateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $ekisakaate = parent::toArray($request);
        $ekisakaate["participants_count"]=$this->participantsCount();
        return $ekisakaate;
    }
}
