<?php

namespace App\Events\Backend\WebText;

use Illuminate\Queue\SerializesModels;

/**
 * Class WebTextDeleted.
 */
class WebTextRestored
{
    use SerializesModels;

    /**
     * @var
     */
    public $web_texts;

    /**
     * @param $web_texts
     */
    public function __construct($web_texts)
    {
        $this->web_texts = $web_texts;
    }
}
