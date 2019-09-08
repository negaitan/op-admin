<?php

namespace App\Listeners\Backend\ClassGroup;

/**
 * Class ClassGroupEventListener.
 */
class ClassGroupEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->class_group->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->class_group->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->class_group->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->class_group->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->class_group->title;

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
            \App\Events\Backend\ClassGroup\ClassGroupCreated::class,
            'App\Listeners\Backend\ClassGroup\ClassGroupEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\ClassGroup\ClassGroupDeleted::class,
            'App\Listeners\Backend\ClassGroup\ClassGroupEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\ClassGroup\ClassGroupermanentlyDeleted::class,
            'App\Listeners\Backend\ClassGroup\ClassGroupEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\ClassGroup\ClassGroupRestored::class,
            'App\Listeners\Backend\ClassGroup\ClassGroupEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\ClassGroup\ClassGroupUpdated::class,
            'App\Listeners\Backend\ClassGroup\ClassGroupEventListener@onUpdated'
        );
    }
}
