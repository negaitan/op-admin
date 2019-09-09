<?php

namespace App\Events\Backend\Amenity;

use Illuminate\Queue\SerializesModels;

/**
 * Class AmenityDeleted.
 */
class AmenityDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $amenities;

    /**
     * @param $amenities
     */
    public function __construct($amenities)
    {
        $this->amenities = $amenities;
    }
}