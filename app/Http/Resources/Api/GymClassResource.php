<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class GymClassResource extends JsonResource
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
            'club'          => $this->club->name,
            'class_name'    => $this->className->key,
            'teacher'       => $this->teacher,
            'day_time'      => ['manana', 'tarde', 'noche'][$this->day_time],
            'week_days'     => $this->week_days,
            'start_at'      => $this->start_at,
            'finish_at'     => $this->finish_at,
            'room'          => $this->room,
        ];
    }
}
