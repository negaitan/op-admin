<?php

namespace App\Listeners\Backend\Setting;

/**
 * Class SettingEventListener.
 */
class SettingEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->setting->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->setting->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->setting->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->setting->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->setting->title;

        \Log::info('User ' . $user . ' has Restored item ' . $restored_item);
    }


    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Setting\SettingCreated::class,
            'App\Listeners\Backend\Setting\SettingEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Setting\SettingDeleted::class,
            'App\Listeners\Backend\Setting\SettingEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Setting\SettingermanentlyDeleted::class,
            'App\Listeners\Backend\Setting\SettingEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Setting\SettingRestored::class,
            'App\Listeners\Backend\Setting\SettingEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Setting\SettingUpdated::class,
            'App\Listeners\Backend\Setting\SettingEventListener@onUpdated'
        );
    }
}
