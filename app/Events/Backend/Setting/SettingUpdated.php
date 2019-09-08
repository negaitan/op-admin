<?php

namespace App\Events\Backend\Setting;

use Illuminate\Queue\SerializesModels;

/**
 * Class SettingUpdated.
 */
class SettingUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $settings;

    /**
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
    }
}
