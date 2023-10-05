<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bottle;
use App\Models\Event;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Faker\Core\Barcode;
use Faker\Core\Number;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use PHPUnit\Framework\Constraint\IsNan;

use function Symfony\Component\String\b;

class BooksController extends Controller
{
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'event_id' => ['required', 'int', 'min:1'],
            'name' => ['required', 'string', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ]+)?$/i', 'min:2', 'max:255'],
            'surname' => ['required', 'string', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+(\s[a-zA-ZáéíóúÁÉÍÓÚñÑ]+)?$/i', 'min:2', 'max:255'],
            'type' => Rule::in(['pista', 'vip']),
            'diners' => ['int', 'min:1'],
            // 'date' => ['required', 'date_format:Y-m-d'],
            // 'time' => Rule::in(['afternoon', 'night']),
            // 'booking' => Rule::in(['phone', 'instagram']),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->type === 'vip' && !empty($request->table_id)) {
            $existingBooking = Book::where('table_id', $request->table_id)->where('status', '!=', 'cancelled')->where('event_id', $request->event_id)->first();

            if ($existingBooking) {
                toastr('La mesa VIP ya está asignada a una reserva existente.', 'error');
                return back()->with('errors', 'La mesa VIP ya está asignada a una reserva existente.');
            }
        }

        if (!empty($request->table_id)) {
            if (!Table::where('id', $request->table_id)->exists()) {
                return back()->with('errors', 'La mesa no se encuentra disponible.');
            }
        }

        if ($request->type === 'vip') {
            $table = Table::where('id', $request->table_id)->first();
            $event = Event::where('id', $request->event_id)->first();
            $minbottles = 0;
            switch ($table->type) {
                case 'escenario':
                    $minbottles = $event->min_vip_esc;
                    break;
                case 'mesa':
                    $minbottles = $event->min_vip_mesa;
                    break;
                case 'mesaalta':
                    $minbottles = $event->min_vip_mesaalta;
                    break;
                default:
            }

            foreach ($request->bottles as $value) {
                if(!preg_match('/^-?\d+$/', $value)){
                    toastr('No se han registrado correctamente las botellas', 'error');
                    return back()->with('errors', 'No se han registrado correctamente las botellas');
                }
            }

            if (!$request->bottles || count($request->bottles) < $minbottles) {
                toastr('No se ha registrado el mínimo de botellas ('. $minbottles .')', 'error');
                return back()->with('errors', 'No se ha registrado el mínimo de botellas ('. $minbottles .')');
            }
        }

        if (Book::where('event_id', $request->event_id)
            ->where('name', $request->name)
            ->where('surname', $request->surname)
            ->exists()
        ) {
            toastr('Ya existe una reserva con esos datos', 'error');
            return back()->with('errors', 'Ya existe una reserva con esos datos');
        }


        // $fecha_reserva = $this->validatedate($request->date);

        // if (!$fecha_reserva) {
        //     $errors = new MessageBag();
        //     $errors->add('date', 'La fecha introducida es anterior al día actual.');
        //     return redirect()->back()->withErrors($errors)->withInput();
        // }

        $errors = $request->has('errors');
        if (!$errors) {
            $newBook = new Book;
            $newBook->event_id = $request->event_id;
            $newBook->name = $request->name;
            $newBook->surname = $request->surname;
            $newBook->diners = $request->diners;
            $newBook->type = $request->type;
            $newBook->table_id = $request->table_id;
            // $newBook->time = $request->time;
            $newBook->user_id = Auth::id();

            $newBook->save();

            try {
                $newBook->bottles()->attach($request->bottles);
            } catch (\Exception $e) {
                // Manejar el error, por ejemplo, registrar el mensaje de error
                Log::error($e->getMessage());
            }
            // $newBook->save();
            toastr('Se ha creado una nueva reserva', "success", '¡Listo!');
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

    public function index(Request $request)
    {
        switch ($request->input('action')) {
            case 'getallbook':
                return $this->getAllBooks();
            case 'getbooks':
                $status = $request->input('status') ? $request->input('status') : 'waiting';
                return $this->getBooks($request->input('time'), $request->input('date'), $status);
            case 'cancelbook':
                return $this->cancelBook($request->input('id'));
            case 'acceptbook':
                return $this->acceptBook($request->input('id'));
            case 'getAcceptedBooks':
                return $this->getAcceptedBooks($request->input('date'), $request->input('tramo'));
            case 'assignTable':
                return $this->assignTable($request->input('bookid'), $request->input('tableid'), $request->input('date'), $request->input('tramo'));
            default:
                return view('books');
        }
    }

    //* BACKEND BUSQUEDA EN HISTORIAL *//
    public function history(Request $request)
    {
        switch ($request->input('action')) {
            case 'getallbook':
                return $this->getAllBooks();
            case 'getbooks':
                $status = $request->input('status') ? $request->input('status') : 'all';
                return $this->getBooks($request->input('event'), $request->input('date'), $status);
            default:
                return view('history');
        }
    }

    public function getBooks($time, $date, $status)
    {

        if ($time === 'all' && $status != 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.date', '=', $date)
                ->where('books.status', '=', $status)
                ->get();
        } else if (!$date) {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.time', '=', $time)
                ->where('books.status', '=', $status)
                ->get();
        } else if ($status == 'all' && $time != 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.time', '=', $time)
                ->where('books.date', '=', $date)
                ->get();
        } else if ($status === 'all' && $time === 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.date', '=', $date)
                ->get();
        } else {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp')
                ->where('books.time', '=', $time)
                ->where('books.date', '=', $date)
                ->where('books.status', '=', $status)
                ->get();
        }

        return response()->json($books);
    }


    public function getAllBooks()
    {
        $books = DB::table('books')->get();
        return response()->json($books);
    }

    public function cancelBook($id)
    {
        $book = Book::find($id);

        if (Auth::user()->id == $book->user_id || Auth::user()->role == 'admin') {
            $book->status = 'cancelled';
            $book->save();
            return response()->json($book);
        } else {
            // TODO section en el front para mostrar el mensaje
            toastr('La reserva que desea cancelar no ha sido creada por usted', 'error', 'Ops, ¡Error!');
            return back();
        }
    }

    public function acceptBook($id)
    {
        $book = Book::find($id);

        if (Auth::user()->role == 'admin') {
            $book->status = 'accepted';
            $book->save();
            return response()->json($book);
        } else {
            toastr('No tienes permisos para realizar esta acción', 'error', 'Ops, ¡Error!');
            return back();
        }
    }

    public function getAcceptedBooks($date, $tramo)
    {
        if ($tramo) {
            $books = DB::table('books')->where('date', $date)->where('time', $tramo)->where('status', 'accepted')->get();
            return $books != '' ? response()->json($books) : '';
        }
    }

    public function assignTable($bookid, $tableid, $date, $tramo)
    {


        if (!$bookid) {
            $book = DB::table('books')->where('table_id', $tableid)->where('date', $date)->where('time', $tramo)->exists();

            if ($book) {
                Book::where('table_id', $tableid)->where('date', $date)->where('time', $tramo)->update(['table_id' => NULL]);
                return response()->json(['success' => 'deleted']);
            }
        } else {
            $book = DB::table('books')->where('table_id', $tableid)->where('date', $date)->where('time', $tramo)->exists();

            if (!$book) {
                Book::where('id', $bookid)->update(['table_id' => $tableid]);
                return response()->json(['success' => 'assigned']);
            } else {
                return response()->json(['success' => 'failed']);
            }
        }
        return response()->json(['success' => 'noChanges']);
    }
}
