<?php

namespace App\Models\Traits\Relationship;

use App\Models\Image;
use App\Models\WebText;

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
}
