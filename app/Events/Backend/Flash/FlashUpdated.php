<?php

namespace App\Events\Backend\Flash;

use Illuminate\Queue\SerializesModels;

/**
 * Class FlashUpdated.
 */
class FlashUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $flashs;

    /**
     * @param $flashs
     */
    public function __construct($flashs)
    {
        $this->flashs = $flashs;
    }
}
