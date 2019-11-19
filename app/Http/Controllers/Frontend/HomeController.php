<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Routing\Redirector
     */
    public function index()
    {
        $sessions = [];

        if(session()->has('errors')) {
            $sessions['errors'] = session()->get('errors');
        }

        if( auth()->check() ) {
            if (auth()->user()->can('view backend')) {
                return redirect()->route('admin.dashboard')->with($sessions);
            }
            return redirect()->route('frontend.user.dashboard')->with($sessions);
        }
        return redirect()->route('frontend.auth.login')->with($sessions);
    }
}
