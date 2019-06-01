<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Auth;

use App\Simulation;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $me = Auth::user();

        // $simulations = Simulation::orderBy('id', 'desc');
        
        // $simulations = $simulations->get();

        // return view('admin.home',[
        //     'simulations'=>$simulations
        // ]);

        return redirect()->route('admin.simulation.list');
        

    }



}
