<?php

namespace App\Listeners\Backend\Flash;

/**
 * Class FlashEventListener.
 */
class FlashEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->flash->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->flash->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->flash->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->flash->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->flash->title;

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
            \App\Events\Backend\Flash\FlashCreated::class,
            'App\Listeners\Backend\Flash\FlashEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Flash\FlashDeleted::class,
            'App\Listeners\Backend\Flash\FlashEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Flash\FlashermanentlyDeleted::class,
            'App\Listeners\Backend\Flash\FlashEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Flash\FlashRestored::class,
            'App\Listeners\Backend\Flash\FlashEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Flash\FlashUpdated::class,
            'App\Listeners\Backend\Flash\FlashEventListener@onUpdated'
        );
    }
}
