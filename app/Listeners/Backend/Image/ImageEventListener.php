<?php

namespace App\Listeners\Backend\Image;

/**
 * Class ImageEventListener.
 */
class ImageEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->image->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->image->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->image->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->image->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->image->title;

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
            \App\Events\Backend\Image\ImageCreated::class,
            'App\Listeners\Backend\Image\ImageEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Image\ImageDeleted::class,
            'App\Listeners\Backend\Image\ImageEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Image\ImageermanentlyDeleted::class,
            'App\Listeners\Backend\Image\ImageEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Image\ImageRestored::class,
            'App\Listeners\Backend\Image\ImageEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Image\ImageUpdated::class,
            'App\Listeners\Backend\Image\ImageEventListener@onUpdated'
        );
    }
}
