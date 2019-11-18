<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'                  => $this->name,
            'description'           => $this->description,
            'price_month'           => $this->price_month,
            'price_matriculation'   => $this->price_matriculation,
        ];
    }
}
