<?php

namespace App\Listeners\Backend\WebText;

/**
 * Class WebTextEventListener.
 */
class WebTextEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->web_text->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->web_text->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->web_text->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->web_text->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->web_text->title;

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
            \App\Events\Backend\WebText\WebTextCreated::class,
            'App\Listeners\Backend\WebText\WebTextEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\WebText\WebTextDeleted::class,
            'App\Listeners\Backend\WebText\WebTextEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\WebText\WebTextermanentlyDeleted::class,
            'App\Listeners\Backend\WebText\WebTextEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\WebText\WebTextRestored::class,
            'App\Listeners\Backend\WebText\WebTextEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\WebText\WebTextUpdated::class,
            'App\Listeners\Backend\WebText\WebTextEventListener@onUpdated'
        );
    }
}
