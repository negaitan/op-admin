<?php

namespace App\Listeners\Backend\Amenity;

/**
 * Class AmenityEventListener.
 */
class AmenityEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->amenity->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->amenity->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->amenity->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->amenity->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->amenity->title;

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
            \App\Events\Backend\Amenity\AmenityCreated::class,
            'App\Listeners\Backend\Amenity\AmenityEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Amenity\AmenityDeleted::class,
            'App\Listeners\Backend\Amenity\AmenityEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Amenity\AmenityermanentlyDeleted::class,
            'App\Listeners\Backend\Amenity\AmenityEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Amenity\AmenityRestored::class,
            'App\Listeners\Backend\Amenity\AmenityEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Amenity\AmenityUpdated::class,
            'App\Listeners\Backend\Amenity\AmenityEventListener@onUpdated'
        );
    }
}
