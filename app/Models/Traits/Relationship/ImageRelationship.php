<?php

namespace App\Models\Traits\Relationship;

use App\Models\Club;

/**
 * Class ImageRelationship.
 */
trait ImageRelationship
{
    /**
     * @return mixed
     */
    public function clubs()
    {
        return $this->belongsToMany(Club::class)->withTimestamps();
    }
}
