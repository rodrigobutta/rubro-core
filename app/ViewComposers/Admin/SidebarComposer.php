<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;

use Route;
use Auth;

class SidebarComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $currentRoute = Route::currentRouteName();

        // var_dump($currentRoute);

        $view->with('auth', Auth::user());

        $view->with('route', $currentRoute);

    }
}