<?php

namespace App\Models\Traits\Relationship;

use App\Models\Image;

/**
 * Class ClassGroupRelationship.
 */
trait ClassGroupRelationship
{
    /**
     * @return mixed
     */
    public function logoImage()
    {
        return $this->belongsTo(Image::class, 'logo_image_id');
    }

    /**
     * @return mixed
     */
    public function coverImage()
    {
        return $this->belongsTo(Image::class, 'cover_image_id');
    }

    /**
     * @return mixed
     */
    public function teacherImage()
    {
        return $this->belongsTo(Image::class, 'teacher_image_id');
    }
}
