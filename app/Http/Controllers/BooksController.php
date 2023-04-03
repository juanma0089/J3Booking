<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'diners' =>  ['int', 'min:1'],
            'booking' => []
        ]);

        $errors = $request->has('errors');

        if (!$errors) {
            $newBook = new Book;
            $newBook->name = $request->name;
            $newBook->diners = $request->diners;
            $newBook->booking = $request->booking;

            $newBook->save();

            return back()->with('message', 'Reserva registrada correctamente');
        } else {
            $errors = $request->errors();
            return back()->with('errors', $errors);
        }
    }
}
