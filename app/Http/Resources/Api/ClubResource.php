<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ClubResource extends JsonResource
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
            'name'          => $this->name,
            'web_text_id'   => $this->webText->value,
            'address'       => $this->address,
            'opening_time'  => $this->opening_time,
            'latitude'      => $this->latitude,
            'longitude'     => $this->longitude,
            'images'        => $this->images,
            'amenities'     => $this->amenities,
            'plans'         => $this->plans,
        ];
    }
}
