<?php

namespace App\Listeners\Backend\ClassName;

/**
 * Class ClassNameEventListener.
 */
class ClassNameEventListener
{
    /**
     * @param $event
     */
    public function onCreated($event)
    {
        $user    = auth()->user()->name;

        $newitem = $event->class_name->title;

        \Log::info('User ' . $user . ' has created item ' . $newitem);
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        $user           = auth()->user()->name;

        $updated_item   = $event->class_name->title;

        \Log::info('User ' . $user . ' has updated item ' . $updated_item);
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->class_name->title;

        \Log::info('User ' . $user . ' has deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onPermanentlyDeleted($event)
    {
        $user           = auth()->user()->name;

        $deleted_item   = $event->class_name->title;

        \Log::info('User ' . $user . ' has Permanently Deleted item ' . $deleted_item);
    }

    /**
     * @param $event
     */
    public function onRestored($event)
    {
        $user           = auth()->user()->name;

        $restored_item   = $event->class_name->title;

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
            \App\Events\Backend\ClassName\ClassNameCreated::class,
            'App\Listeners\Backend\ClassName\ClassNameEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\ClassName\ClassNameDeleted::class,
            'App\Listeners\Backend\ClassName\ClassNameEventListener@onDeleted'
        );

        $events->listen(
            \App\Events\Backend\ClassName\ClassNameermanentlyDeleted::class,
            'App\Listeners\Backend\ClassName\ClassNameEventListener@onermanentlyDeleted'
        );

        $events->listen(
            \App\Events\Backend\ClassName\ClassNameRestored::class,
            'App\Listeners\Backend\ClassName\ClassNameEventListener@onRestored'
        );

        $events->listen(
            \App\Events\Backend\ClassName\ClassNameUpdated::class,
            'App\Listeners\Backend\ClassName\ClassNameEventListener@onUpdated'
        );
    }
}
