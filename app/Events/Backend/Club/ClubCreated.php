<?php

namespace App\Events\Backend\Club;

use Illuminate\Queue\SerializesModels;

/**
 * Class ClubCreated.
 */
class ClubCreated
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
