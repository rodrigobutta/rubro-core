<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Folder;
use App\Field;
class HeaderComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $root_folders = Folder::where('parent_id',-1)->wherePublished(1)->orderBy('sort')->get();

        // var_dump($view->getData()['item']);
        // exit();

        // if($item = $view->getData()['item']){
        //     $view->with('pageTitle', $item->name);
        // }

        $view->with('pageTitle', 'sddddddddd');


        $view->with('root_folders', $root_folders);

        $header_fields = Field::where('name', 'like', 'header_%')->orderBy('order')->get();
        foreach($header_fields as $field) {
            $view->with($field->name, $field->content);
        }

    }
}