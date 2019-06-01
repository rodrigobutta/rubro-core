<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Folder;
use App\Field;
class FooterComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $footer_fields = Field::where('name', 'like', 'footer_%')->orderBy('order')->get();
        foreach($footer_fields as $field) {
            $view->with($field->name, $field->content);
        }

    }
}