<?php

namespace App\Models\Traits\Relationship;

use App\Models\Image;
use App\Models\WebText;
use App\Models\Amenity;

/**
 * Class ClubRelationship.
 */
trait ClubRelationship
{
    public function webText()
    {
        return $this->belongsTo(WebText::class, 'web_text_id');
    }

    /**
     * @return mixed
     */
    public function images()
    {
        return $this->belongsToMany(Image::class)->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class)->withTimestamps();
    }
}
