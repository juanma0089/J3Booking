<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class BooksController extends Controller
{
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]{2,254}$/i', 'min:2', 'max:255'],
            'diners' => ['int', 'min:1'],
            'date' => ['required', 'date_format:Y-m-d'],
            'time' => Rule::in(['afternoon', 'night']),
            'booking' => Rule::in(['phone', 'instagram']),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $fecha_reserva = $this->validatedate($request->date);

        if (!$fecha_reserva) {
            $errors = new MessageBag();
            $errors->add('date', 'La fecha introducida es anterior al día actual.');
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $newBook = new Book;
        $newBook->name = $request->name;
        $newBook->diners = $request->diners;
        $newBook->booking = $request->booking;
        $newBook->date = $request->date;
        $newBook->time = $request->time;
        $newBook->user_id = Auth::id();

        $newBook->save();

        return back()->with('message', 'Reserva registrada correctamente');
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

    public function index(Request $request){
        if($request->input('action') == 'getallbook'){
            return $this->getAllBooks();
        } else if ($request->input('action') == 'getpendingbooks') {
            return $this->getPendingBooks($request->input('time'), $request->input('date'));
        }
        return view('books');
    }

    public function getPendingBooks($time, $date) {


        if ($time === 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.date','=', $date)
                ->where('books.status','=', 'waiting')
                ->get();
        } else if (!$date) {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.time', '=', $time)
                ->where('books.status','=', 'waiting')
                ->get();
        } else{
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.time','=', $time)
                ->where('books.date','=', $date)
                ->where('books.status','=', 'waiting')
                ->get();
        }
        
        return response()->json($books);
    }

    public function getAllBooks(){
        $books = DB::table('books')->get();
        return response()->json($books);
    }

}
