<?php

namespace App\Events\Backend\ClassGroup;

use Illuminate\Queue\SerializesModels;

/**
 * Class ClassGroupDeleted.
 */
class ClassGroupRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $class_groups;

    /**
     * @param $class_groups
     */
    public function __construct($class_groups)
    {
        $this->class_groups = $class_groups;
    }
}
