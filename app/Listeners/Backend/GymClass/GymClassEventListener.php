<?php

namespace App\Listeners\Backend\GymClass;

/**
 * Class GymClassEventListener.
 */
class GymClassEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->gym_class->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->gym_class->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->gym_class->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->gym_class->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->gym_class->title;

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
            \App\Events\Backend\GymClass\GymClassCreated::class,
            'App\Listeners\Backend\GymClass\GymClassEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\GymClass\GymClassDeleted::class,
            'App\Listeners\Backend\GymClass\GymClassEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\GymClass\GymClassermanentlyDeleted::class,
            'App\Listeners\Backend\GymClass\GymClassEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\GymClass\GymClassRestored::class,
            'App\Listeners\Backend\GymClass\GymClassEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\GymClass\GymClassUpdated::class,
            'App\Listeners\Backend\GymClass\GymClassEventListener@onUpdated'
        );
    }
}
