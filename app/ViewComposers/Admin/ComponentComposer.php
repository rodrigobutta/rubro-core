<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
// use App\Repositories\UserRepository;
use Auth;

class ComponentComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    // protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    // public function __construct(UserRepository $users)
    // {
    //     // Dependencies automatically resolved by service container...
    //     $this->users = $users;
    // }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $view->with('count', $this->users->count());

        $colors = [
            'rgba(0,0,0,0)'=>'Ninguno',
            // '#ffffff'=>'Blanco',
            '#f6f6f6'=>'Gris Claro',
            '#e6e6e6'=>'Gris Oscuro',
            // '#000000'=>'Negro',
            '#ff0000'=>'Rojo'
        ];

        $view->with('bgcolors', $colors);

    }
}