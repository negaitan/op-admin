<?php

namespace App\Models\Traits\Relationship;

use App\Models\ClassName;


/**
 * Class GymClassRelationship.
 */
trait GymClassRelationship
{
    public function className()
    {
        return $this->belongsTo(ClassName::class, 'class_name_id');
    }

}
