<?php

namespace App\Listeners\Backend\Plan;

/**
 * Class PlanEventListener.
 */
class PlanEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->plan->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->plan->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->plan->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->plan->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->plan->title;

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
            \App\Events\Backend\Plan\PlanCreated::class,
            'App\Listeners\Backend\Plan\PlanEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Plan\PlanDeleted::class,
            'App\Listeners\Backend\Plan\PlanEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\Plan\PlanermanentlyDeleted::class,
            'App\Listeners\Backend\Plan\PlanEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\Plan\PlanRestored::class,
            'App\Listeners\Backend\Plan\PlanEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\Plan\PlanUpdated::class,
            'App\Listeners\Backend\Plan\PlanEventListener@onUpdated'
        );
    }
}
