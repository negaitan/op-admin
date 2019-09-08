<?php

namespace App\Events\Backend\Setting;

use Illuminate\Queue\SerializesModels;

/**
 * Class SettingDeleted.
 */
class SettingRestored
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
