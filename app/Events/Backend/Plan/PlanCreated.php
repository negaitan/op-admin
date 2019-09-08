<?php

namespace App\Events\Backend\Plan;

use Illuminate\Queue\SerializesModels;

/**
 * Class PlanCreated.
 */
class PlanCreated
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
