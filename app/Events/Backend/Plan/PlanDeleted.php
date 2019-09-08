<?php

namespace App\Events\Backend\Plan;

use Illuminate\Queue\SerializesModels;

/**
 * Class PlanDeleted.
 */
class PlanDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $plans;

    /**
     * @param $plans
     */
    public function __construct($plans)
    {
        $this->plans = $plans;
    }
}
