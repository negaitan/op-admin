<?php

namespace App\Listeners\Backend\Club;

/**
 * Class ClubEventListener.
 */
class ClubEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->club->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->club->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->club->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->club->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->club->title;

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
            \App\Events\Backend\Club\ClubCreated::class,
            'App\Listeners\Backend\Club\ClubEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Club\ClubDeleted::class,
            'App\Listeners\Backend\Club\ClubEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Club\ClubermanentlyDeleted::class,
            'App\Listeners\Backend\Club\ClubEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Club\ClubRestored::class,
            'App\Listeners\Backend\Club\ClubEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Club\ClubUpdated::class,
            'App\Listeners\Backend\Club\ClubEventListener@onUpdated'
        );
    }
}
