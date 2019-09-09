<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\Backend\SidebarComposer;
use App\Http\Composers\Backend\WebTextComposer;
use App\Http\Composers\Backend\GymClassComposer;
use App\Http\Composers\Backend\ImageComposer;
use App\Http\Composers\Backend\AmenityComposer;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     */
    public function boot()
    {
        // Global
        View::composer(
        // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );

        // Frontend

        // Backend
        View::composer(
            // This binds items like number of users pending approval when account approval is set to true
            'backend.includes.sidebar',
            SidebarComposer::class
        );
        View::composer(
            // This binds web texts that are exposed
            'backend.club.includes.form',
            WebTextComposer::class
        );
        View::composer(
            // This binds web texts that are exposed
            'backend.gym_class.includes.form',
            GymClassComposer::class
        );
        View::composer(
            // This binds images
            ['backend.class_group.includes.form', 'backend.club.includes.form'],
            ImageComposer::class
        );
        View::composer(
            // This binds amenities
            ['backend.club.includes.form'],
            AmenityComposer::class
        );
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
