<?php

namespace App\Events\Backend\Image;

use Illuminate\Queue\SerializesModels;

/**
 * Class ImageDeleted.
 */
class ImageDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $images;

    /**
     * @param $images
     */
    public function __construct($images)
    {
        $this->images = $images;
    }
}
