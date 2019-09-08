<?php

namespace App\Events\Backend\Setting;

use Illuminate\Queue\SerializesModels;

/**
 * Class SettingCreated.
 */
class SettingCreated
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
