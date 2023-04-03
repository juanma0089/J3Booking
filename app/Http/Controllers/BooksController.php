<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BooksController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'diners' =>  ['int', 'min:1'],
            'date' => ['required'],
            'time' => Rule::in(['afternoon','night']),
            'booking' => Rule::in(['phone','instagram']),

        ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $newBook = new Book;
            $newBook->name = $request->name;
            $newBook->diners = $request->diners;
            $newBook->booking = $request->booking;
            $newBook->date = $request->date;
            $newBook->time = $request->time;
            $newBook->user_id = Auth::id();

            $newBook->save();

            return back()->with('message', 'Reserva registrada correctamente');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }


    }
}
