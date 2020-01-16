<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class FlashResource extends JsonResource
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
            'zona'                  => $this->zona,
            'name_plan'             => $this->name_plan,
            'precio_flash'          => $this->precio_flash,
            'label_flash'           => $this->label_flash,
            'precio_especial'       => $this->precio_especial,
            'label_especial'        => $this->label_especial,
            'precio_onSale'         => $this->precio_onSale,
            'label_onSale'          => $this->label_onSale,
            'precio_regular'        => $this->precio_regular,
            'label_regular'         => $this->label_regular,
        ];
    }
}
