<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Folder;

class HeadComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        if(isset($view->getData()['item'])){
            $item = $view->getData()['item'];
            $view->with('pageTitle', $item->name . ' | ' . config('app.name', 'Laravel'));
            $view->with('item', $item);
        }
        else{
            $view->with('pageTitle', config('app.name', 'Laravel') );
        }

    }
}