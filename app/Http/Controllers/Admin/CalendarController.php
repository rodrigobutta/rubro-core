<?php

namespace App\Http\Controllers\Admin;

use App\CalendarEvent;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CalendarController extends Controller {

    public static $a_types = [
        'Institucional',
        'Deportes',
        'Cultura',
        'Salud',
        'RCyT',
        'Congresos',
        'DAC',
        'Servicio de empleo',
        'Radio',
        'TV',
        'Programas profesionales',
        'Turismo',
        'Otros'
    ];

    public static $b_types = [
        'Bienes Personales',
        'Educación y Promoción Cooperativa',
        'Ganancias',
        'Ganancia Mínima Presunta',
        'Internos',
        'IVA',
        'Monotributo',
        'Otros',
        'Precios de Transferencia',
        'Procedimiento',
        'Retenciones',
        'Seguridad Social',
        'Jurisdicción Conv Multilateral',
        'Jurisdicción Buenos Aires',
        'Jurisdicción CABA',
    ];
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
    public function index(Request $request) {
        $category = strpos($request->path(), '_vencimientos') !== false ? 'b' : 'a';
        $query = CalendarEvent::where('category', $category)->orderBy('event_date', 'desc');
        if($request->input('q')) {
            $query->where(function($query) use ($request) {
                $query->where('title', 'like', "%{$request->input('q')}%")->orWhere('description', 'like', "%{$request->input('q')}%");
            });
        }
        $events = $query->paginate(50)->appends($request->input());
        return view('admin.calendar', [
            'events' => $events,
            'q' => $request->input('q', ''),
            'category' => $category
        ]);
    }

    public function add(Request $request) {
        $category = strpos($request->path(), '_vencimientos') !== false ? 'b' : 'a';
        $event = new \stdClass;
        $event->title = '';
        $event->description = '';
        $event->event_date = '';
        $event->url = '';
        $event->window = '';

        return view('admin.calendar_edit', [
            'event' => $event,
            'types' => $category === 'a' ? self::$a_types : self::$b_types,
            'edit' => false
        ]);
    }

    public function edit(Request $request, $id) {
        $category = strpos($request->path(), '_vencimientos') !== false ? 'b' : 'a';
        $event = CalendarEvent::where('id', $id)->firstOrFail();
        return view('admin.calendar_edit', [
            'event' => $event,
            'types' => $category === 'a' ? self::$a_types : self::$b_types,
            'edit' => true
        ]);
    }

    public function post(Request $request) {

        $validatedData = $request->validate([
            'description' => 'required',
            'event_date' => 'required',
        ]);


        $event = new CalendarEvent;

        $title = $request->input('title');
        $description = $request->input('description');
        $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('event_date'));
        $time = "{$request->input('hour')}:{$request->input('minute')}";
        $category = $request->input('category');

        $event->title = $title;
        $event->description = $description;
        $event->event_date = $date->format('Y-m-d') . " {$time}:00";
        $event->category = $category;
        $event->url = $request->input('url', '');
        $event->window = $request->input('window', '');

        $event->save();

        return redirect()->route($category == 'a' ? 'admin.calendar.index' : 'admin.calendar_vencimientos.index');
    }

    public function put(Request $request, $id) {
        $event = CalendarEvent::where('id',$id)->firstOrFail();

        $title = $request->input('title');
        $description = $request->input('description');
        $date = \Carbon\Carbon::createFromFormat('d/m/Y', $request->input('event_date'));
        $time = "{$request->input('hour')}:{$request->input('minute')}";
        $category = $request->input('category');

        $event->title = $title;
        $event->description = $description;
        $event->event_date = $date->format('Y-m-d') . " {$time}:00";
        $event->url = $request->input('url', '');
        $event->window = $request->input('window', '');

        $event->save();

        return redirect()->route($category == 'a' ? 'admin.calendar.index' : 'admin.calendar_vencimientos.index');
    }

    public function delete(Request $request, $id) {
        $event = CalendarEvent::where('id', $id)->firstOrFail();
        $category = $event->category;
        $event->delete();
        return redirect()->route($category == 'a' ? 'admin.calendar.index' : 'admin.calendar_vencimientos.index');
    }



}
