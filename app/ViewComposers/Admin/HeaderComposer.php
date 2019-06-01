<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use Auth;


class HeaderComposer
{
 
    public function compose(View $view)
    {

        // $view->with('auth', Auth::user());

    }
}