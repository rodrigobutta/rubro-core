<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class LayoutComposer
{

    public function compose(View $view)
    {

        if(\Request::is('admin/*')){
            $view->with('isEditing', true);
        }
        else{
            $view->with('isEditing', false);
        }

    }
}