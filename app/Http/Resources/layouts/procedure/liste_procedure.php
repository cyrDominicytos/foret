<?php

namespace App\Http\Resources\layouts\procedure;

use Illuminate\Http\Resources\Json\JsonResource;

class liste_procedure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
