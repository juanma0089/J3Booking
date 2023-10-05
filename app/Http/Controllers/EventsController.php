<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class EventsController extends Controller
{

    // public function index(Request $request)
    // {

    //     switch ($request->input('action')) {
    //         // case 'getbooks':
    //         //     $status = $request->input('status') ? $request->input('status') : 'waiting';
    //         //     return $this->getBooks($request->input('time'), $request->input('date'), $status);
    //         case 'deleteevent':
    //              die('AAAAAAAAAAAAAAA');
    //             return $this->delete($request->input('id'));
    //         case 'acceptbook':
    //             return $this->acceptBook($request->input('id'));
    //         case 'getAcceptedBooks':
    //             return $this->getAcceptedBooks($request->input('date'), $request->input('tramo'));
    //         case 'assignTable':
    //             return $this->assignTable($request->input('bookid'), $request->input('tableid'), $request->input('date'), $request->input('tramo'));
    //         default:
    //             return $this->getAllEvents();
    //     }
    // }



    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'min_vip_esc' => ['int', 'min:0'],
            'min_vip_mesa' => ['int', 'min:0'],
            'min_vip_mesaalta' => ['int', 'min:0'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => Rule::in(['tarde', 'noche']),
            'image' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $fechaEvento = $this->validatedate($request->date);

        if (!$fechaEvento) {
            $errors = new MessageBag();
            $errors->add('date', 'La fecha introducida es anterior al día actual.');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $errors = $request->has('errors');
        if (!$errors) {
            $newEvent = new Event;
            $newEvent->name = $request->name;
            $newEvent->min_vip_esc = $request->min_vip_esc;
            $newEvent->min_vip_mesa = $request->min_vip_mesa;
            $newEvent->min_vip_mesaalta = $request->min_vip_mesaalta;
            $newEvent->date = $request->date;
            $newEvent->time = $request->time;

            // Renombrar y guardar la imagen
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();

                $eventName = str_replace(' ', '_', strtolower($request->name));
                $imageName = $eventName . '.' . $extension;
                $image->move(public_path('assets/img/events'), $imageName);

                $newEvent->image = $imageName;
            }




            $newEvent->save();
            toastr('Se ha creado un nuevo evento', "success", '¡Listo!');
            return redirect()->route('index');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }

    public function editEvent($id)
    {
        if (Event::find($id)) {
            $event = Event::find($id);
            return view('editevent', ['event' => $event]);
        } else {
            return redirect()->route('index');
        }
    }
    public function edit(Request $request, $id)
    {
        $event = Event::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'min_vip_esc' => ['int', 'min:0'],
            'min_vip_mesa' => ['int', 'min:0'],
            'min_vip_mesaalta' => ['int', 'min:0'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => Rule::in(['tarde', 'noche']),
            'image' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $fechaEvento = $this->validatedate($request->date);

        if (!$fechaEvento) {
            $errors = new MessageBag();
            $errors->add('date', 'La fecha introducida es anterior al día actual.');
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $errors = $request->has('errors');
        if (!$errors) {

            $event->min_vip_mesa = $request->min_vip_mesa;
            $event->min_vip_mesaalta = $request->min_vip_mesaalta;
            $event->date = $request->date;
            $event->min_vip_esc = $request->min_vip_esc;
            $event->time = $request->time;
            $event->name = $request->name;

            // Renombrar y guardar la imagen
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension();

                $eventName = str_replace(' ', '_', strtolower($request->name));
                $imageName = $eventName . '.' . $extension;
                $image->move(public_path('assets/img/events'), $imageName);

                $event->image = $imageName;
            }

            $event->save();
            toastr('Se ha modificado el evento', "success", '¡Listo!');
            return redirect()->route('index');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }

    public function validatedate($request)
    {

        $dateBooking = $request;
        // Convertir la fecha en un objeto Carbon
        $dateTime  = Carbon::createFromFormat('Y-m-d', $dateBooking);

        // Verificar si la fecha es válida y no es anterior al día actual
        if (!$dateTime->isValid() || $dateTime->isBefore(Carbon::now()->startOfDay())) {
            return false;
        } else {
            return true;
        }
    }

    public function delete($id)
    {
        // Buscar el evento utilizando el modelo Event
        $event = Event::find($id);

        if (!$event) {
            // Manejar el caso en el que no se encuentre el evento
            return abort(404);
        }

        $event->eliminado = 1;

        $event->save();

        return $this->index();
    }
    public function index()
    {

        $eventos = DB::table('events')->orderby('date', 'ASC')->get();

        return view('index', ['eventos' => $eventos]);
    }

    //* BACKEND BUSQUEDA EN HISTORIAL *//

    public function history(Request $request)
    {
        switch ($request->input('action')) {

            case 'getEventHistory':
                return $this->getEventHistory($request->input('time'), $request->input('date'));
            default:
                return view('eventhistory');
        }
    }
    public function getEventHistory($time, $date)
    {

        // if ($time === 'noche' && $date != 'all') {
        //     $eventos = DB::table('events')->where('time', '=', $time)->where('date', '=', $date)->where('eliminado', '=', 0)->orderby('created_at', 'ASC')->get();
        // } elseif ($time === 'noche' && $date == 'all') {
        //     $eventos = DB::table('events')->where('time', '=', $time)->where('eliminado', '=', 0)->orderby('created_at', 'ASC')->get();
        // } else if ($time === 'tarde' && $date != 'all') {
        //     $eventos = DB::table('events')->where('time', '=', $time)->where('eliminado', '=', 0)->where('date', '=', $date)->orderby('created_at', 'ASC')->get();
        // } else if ($time === 'tarde' && $date == 'all') {
        //     $eventos = DB::table('events')->where('time', '=', $time)->where('eliminado', '=', 0)->orderby('created_at', 'ASC')->get();
        // } else if ($time === 'all' && $date != 'all') {
        //     $eventos = DB::table('events')->where('date', '=', $date)->where('eliminado', '=', 0)->orderby('created_at', 'ASC')->get();
        // } else {
        //     // $eventos = DB::table('events')->where('eliminado', '=', 0)->orderby('created_at', 'ASC')->get();
        //     $eventos =  DB::table('events')
        //         ->select('events.*', 'book_counts.total_books', 'book_counts.total_diners')
        //         ->leftJoin('books', function ($join) {
        //             $join->on('events.id', '=', 'books.event_id');
        //             $join->where('books.eliminado', '=', 0);
        //         })
        //         ->where('events.eliminado', '=', 0)
        //         ->groupBy('events.id')
        //         ->orderBy('events.created_at', 'ASC')
        //         ->selectSub(function ($query) {
        //             $query->select(DB::raw('COUNT(*) as total_books'), DB::raw('SUM(diners) as total_diners'))
        //                 ->from('books')
        //                 ->whereRaw('books.event_id = events.id');
        //         }, 'book_counts')
        //         ->get();
        // }

        // return response()->json($eventos);
        // $query = DB::table('events')
        //     ->leftJoin('books', 'events.id', '=', 'books.event_id')
        //     ->where('events.eliminado', '=', 0)
        //     ->groupBy('events.id')
        //     ->orderBy('events.created_at', 'ASC');

        // if ($time === 'noche') {
        //     $query->where('events.time', '=', 'noche');
        // } elseif ($time === 'tarde') {
        //     $query->where('events.time', '=', 'tarde');
        // }

        // if ($date !== 'all') {
        //     $query->where('events.date', '=', $date);
        // }

        // $eventos = $query
        //     ->select('events.*', DB::raw('COUNT(*) as total_books'), DB::raw('SUM(books.diners) as total_diners'))
        //     ->get();

        // return response()->json($eventos);
        $query = DB::table('events')
            ->leftJoin('books', 'events.id', '=', 'books.event_id')
            ->where('events.eliminado', '=', 0)
            ->groupBy('events.id', 'events.name', 'events.date', 'events.time', 'events.min_vip_esc', 'events.min_vip_mesa', 'events.min_vip_mesaalta', 'events.image', 'events.eliminado', 'events.created_at', 'events.updated_at') // Agrega todas las columnas de 'events'
            ->orderBy('events.created_at', 'ASC');

        if ($time === 'noche') {
            $query->where('events.time', '=', 'noche');
        } elseif ($time === 'tarde') {
            $query->where('events.time', '=', 'tarde');
        }

        if ($date !== 'all') {
            $query->where('events.date', '=', $date);
        }

        $eventos = $query
            ->select('events.*', DB::raw('COUNT(*) as total_books'), DB::raw('SUM(books.diners) as total_diners'))
            ->get();

        return response()->json($eventos);
    }
}
