<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class FieldsController extends Controller
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
    public function index(Request $request)
    {
        $fields = Field::orderBy('order')->get();
        $sections = [
            'header' => [],
            'footer' => []
        ];

        foreach($fields as $field) {
            if(strpos($field->name, 'header') === 0) {
                $sections['header'][] = $field;
            } else if(strpos($field->name, 'footer') === 0) {
                $sections['footer'][] = $field;
            }
        }
        return view('admin.fields', [
            'sections' => $sections
        ]);
    }
    public function save(Request $request) {
        $fields = Field::all();
        foreach($fields as $field) {
            echo "{$field->name}: {$request->input($field->name)}";
            $field->content = $request->input($field->name);
            $field->save();
        }

        return redirect()->route('admin.fields.index');
    }
}