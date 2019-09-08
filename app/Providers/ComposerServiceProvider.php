<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\Backend\SidebarComposer;
use App\Http\Composers\Backend\WebTextComposer;

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
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        //
    }
}
