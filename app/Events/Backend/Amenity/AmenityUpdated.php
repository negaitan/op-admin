<?php

namespace App\Events\Backend\Amenity;

use Illuminate\Queue\SerializesModels;

/**
 * Class AmenityUpdated.
 */
class AmenityUpdated
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
