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
            'logo_image_url' => $this->logoImage->url,
            'logo_image_alt' => $this->logoImage->alt,
            'description' => $this->description,
            'cover_image_url' => $this->coverImage->url,
            'cover_image_alt' => $this->coverImage->alt,
            'video_url' => $this->video_url,
            'classes' => $this->classes,
            'teacher_image_url' => $this->teacherImage->url,
            'teacher_image_alt' => $this->teacherImage->alt,
            'teacher_name' => $this->teacher_name,
            'teacher_title' => $this->teacher_title,
            'teacher_text' => $this->teacher_text,
            'playlist_url' => $this->playlist_url,
        ];
    }
}
