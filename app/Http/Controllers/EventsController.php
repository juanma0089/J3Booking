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
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'min_vip_esc' => ['int', 'min:0'],
            'min_vip_mesa' => ['int', 'min:0'],
            'min_vip_mesaalta' => ['int', 'min:0'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => Rule::in(['tarde', 'noche']),
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
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
            return back();
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }

    public function index()
    {
        $eventos = DB::table('events')->get();

        return view('index', ['eventos' => $eventos]);
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
}
