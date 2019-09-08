<?php

namespace App\Events\Backend\GymClass;

use Illuminate\Queue\SerializesModels;

/**
 * Class GymClassUpdated.
 */
class GymClassUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $gym_classes;

    /**
     * @param $gym_classes
     */
    public function __construct($gym_classes)
    {
        $this->gym_classes = $gym_classes;
    }
}
