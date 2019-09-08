<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassGroupResource extends JsonResource
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
            'name' => $this->name,
            'logo_image_id' => $this->logo_image_id,
            'description' => $this->description,
            'cover_image_id' => $this->cover_image_id,
            'video_url' => $this->video_url,
            'classes' => $this->classes,
            'teacher_image_id' => $this->teacher_image_id,
            'teacher_name' => $this->teacher_name,
            'teacher_title' => $this->teacher_title,
            'teacher_text' => $this->teacher_text,
            'playlist_url' => $this->playlist_url,
        ];
    }
}
