<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActiveYearResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $activeYear = parent::toArray($request);

        $activeYear["ekns"]=EkisakaateResource::collection($this->ekns);

        return $activeYear;
    }
}
