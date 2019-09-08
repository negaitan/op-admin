<?php

namespace App\Events\Backend\Club;

use Illuminate\Queue\SerializesModels;

/**
 * Class ClubUpdated.
 */
class ClubUpdated
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
