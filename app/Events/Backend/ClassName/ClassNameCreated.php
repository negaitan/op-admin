<?php

namespace App\Events\Backend\ClassName;

use Illuminate\Queue\SerializesModels;

/**
 * Class ClassNameCreated.
 */
class ClassNameCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $class_names;

    /**
     * @param $class_names
     */
    public function __construct($class_names)
    {
        $this->class_names = $class_names;
    }
}
