<?php

namespace App\Events\Backend\Club;

use Illuminate\Queue\SerializesModels;

/**
 * Class ClubDeleted.
 */
class ClubDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $clubs;

    /**
     * @param $clubs
     */
    public function __construct($clubs)
    {
        $this->clubs = $clubs;
    }
}
