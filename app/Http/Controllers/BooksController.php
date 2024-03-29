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
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' => ['required', 'string', 'min:2', 'max:255'],
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

        $nummesa = '';

        if ($request->type === 'vip') {
            $table = Table::where('id', $request->table_id)->first();
            $nummesa = $table->nummesa;
            $event = Event::where('id', $request->event_id)->first();
            $minbottles = 0;
            switch ($table->type) {
                case 'escenario':
                case 'altaescenario':
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

            if ($request->bottles) {
                foreach ($request->bottles as $value) {
                    if (!preg_match('/^-?\d+$/', $value)) {
                        toastr('No se han registrado correctamente las botellas', 'error');
                        return back()->with('errors', 'No se han registrado correctamente las botellas');
                    }
                }
            }
            if ((!$request->bottles || count($request->bottles) < $minbottles) && $minbottles != 0) {
                toastr('No se ha registrado el mínimo de botellas (' . $minbottles . ')', 'error');
                return back()->with('errors', 'No se ha registrado el mínimo de botellas (' . $minbottles . ')');
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
            $newBook->observaciones = $request->observaciones;
            $newBook->table_id = $request->table_id;
            $newBook->nummesa = $nummesa;
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
    public function edit(Request $request)
    {

        // Validación
        $validator = Validator::make($request->all(), [
            'id' => ['required', 'int', 'min:1'],
            'user_id' => ['required', 'int', 'min:1'],
            'event_id' => ['required', 'int', 'min:1'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'surname' => ['required', 'string', 'min:2', 'max:255'],
            'type' => Rule::in(['pista', 'vip']),
            'diners' => ['int', 'min:1'],
        ]);

        if ($validator->fails()) {
            toastr('Algunos de los datos introducidos no es válido.', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Comprobación si es VIP: Si existe otra reserva con esa mesa en el mismo evento
        if ($request->type === 'vip' && !empty($request->table_id)) {
            $existingBooking = Book::where('table_id', $request->table_id)->where('status', '!=', 'cancelled')->where('event_id', $request->event_id)->where('id', '!=', $request->id)->first();

            if ($existingBooking) {
                toastr('La mesa VIP ya está asignada a una reserva existente.', 'error');
                return back()->with('errors', 'La mesa VIP ya está asignada a una reserva existente.');
            }
        }

        // Comprobación si es VIP: Existe la mesa
        if (!empty($request->table_id)) {
            if (!Table::where('id', $request->table_id)->exists()) {
                return back()->with('errors', 'La mesa no se encuentra disponible.');
            }
        }

        if ($request->type === 'vip' && $request->bottles) {
            $table = Table::where('id', $request->table_id)->first();
            $event = Event::where('id', $request->event_id)->first();
            $minbottlesMap = [
                'escenario' => $event->min_vip_esc,
                'mesa' => $event->min_vip_mesa,
                'mesaalta' => $event->min_vip_mesaalta,
            ];

            $minbottles = $minbottlesMap[$table->type] ?? 0;

            foreach ($request->bottles as $value) {
                if (!preg_match('/^-?\d+$/', $value)) {
                    toastr('No se han registrado correctamente las botellas', 'error');
                    return back()->with('errors', 'No se han registrado correctamente las botellas');
                }
            }

            if (empty($request->bottles) || count($request->bottles) < $minbottles) {
                toastr('No se han registrado correctamente las botellas o no se ha registrado el mínimo de botellas (' . $minbottles . ')', 'error');
                return back()->with('errors', 'No se han registrado correctamente las botellas o no se ha registrado el mínimo de botellas (' . $minbottles . ')');
            }
        }

        if (Book::where('event_id', $request->event_id)
            ->where('name', $request->name)
            ->where('surname', $request->surname)
            ->where('id', '!=', $request->id)
            ->exists()
        ) {
            toastr('Ya existe una reserva con esos datos', 'error');
            return back()->with('errors', 'Ya existe una reserva con esos datos');
        }


        $errors = $request->has('errors');
        if (!$errors) {
            $booking = Book::find($request->id);
            if (!$booking) {
                toastr('La reserva que intentas editar no existe.', 'error');
                return back()->with('errors', 'La reserva que intentas editar no existe.');
            }
            // Realizar las actualizaciones en la reserva existente
            $booking->event_id = $request->event_id;
            $booking->name = $request->name;
            $booking->surname = $request->surname;
            $booking->diners = $request->diners;
            $booking->type = $request->type;
            $booking->observaciones = $request->observaciones;
            $booking->user_id = $request->user_id;


            // Guardar la reserva actualizada
            $booking->save();


            try {
                $booking->bottles()->attach($request->bottles);
            } catch (\Exception $e) {
                // Manejar el error, por ejemplo, registrar el mensaje de error
                Log::error($e->getMessage());
            }
            // $newBook->save();
            toastr('Se ha actualizado la reserva de ' . $booking->name, "success", '¡Listo!');
            return back();
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
                return $this->getBooks($request->input('event'), $request->input('rrpp'), $status);
            case 'cancelbook':
                return $this->cancelBook($request->input('id'));
            case 'destroybook':
                return $this->destroyBook($request->input('id'));
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
                return $this->getBooks($request->input('event'), $request->input('rrpp'), $status);
            default:
                return view('history');
        }
    }

    public function getBooks($event, $rrpp, $status)
    {
        if ($event != 'none' && $rrpp == 'all' && $status != 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp', 'users.role as role')
                ->where('books.event_id', '=', $event)
                ->where('books.status', '=', $status)
                ->orderBy('books.name', 'asc')
                ->addSelect(DB::raw('(SELECT GROUP_CONCAT(CONCAT(b.type, " ", b.name, " - ", b.price, "€ ") SEPARATOR "<br> ") FROM book_bottle bb JOIN bottles b ON bb.bottle_id = b.id WHERE bb.book_id = books.id) AS bottles_info'))
                ->get();
        } else if ($event != 'none' && $rrpp != 'all' && $status != 'all') {
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp', 'users.role as role')
                ->where('books.event_id', '=', $event)
                ->where('books.user_id', '=', $rrpp)
                ->where('books.status', '=', $status)
                ->orderBy('books.name', 'asc')
                ->addSelect(DB::raw('(SELECT GROUP_CONCAT(CONCAT(b.type, " ", b.name, " - ", b.price, "€ ") SEPARATOR "<br> ") FROM book_bottle bb JOIN bottles b ON bb.bottle_id = b.id WHERE bb.book_id = books.id) AS bottles_info'))
                ->get();
        } else if ($event != 'none' && $rrpp == 'all' && $status == 'all') { // Pertenece a History Exclusivamente
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp', 'users.role as role')
                ->where('books.event_id', '=', $event)
                ->orderBy('books.name', 'asc')
                ->addSelect(DB::raw('(SELECT GROUP_CONCAT(CONCAT(b.type, " ", b.name, " - ", b.price, "€ ") SEPARATOR "<br> ") FROM book_bottle bb JOIN bottles b ON bb.bottle_id = b.id WHERE bb.book_id = books.id) AS bottles_info'))
                ->get();
        } else if ($event != 'none' && $rrpp != 'all' && $status == 'all') { // Pertenece a History Exclusivamente
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp', 'users.role as role')
                ->where('books.event_id', '=', $event)
                ->where('books.user_id', '=', $rrpp)
                ->orderBy('books.name', 'asc')
                ->addSelect(DB::raw('(SELECT GROUP_CONCAT(CONCAT(b.type, " ", b.name, " - ", b.price, "€ ") SEPARATOR "<br> ") FROM book_bottle bb JOIN bottles b ON bb.bottle_id = b.id WHERE bb.book_id = books.id) AS bottles_info'))
                ->get();
        } else {
            $fechaActual = now()->subHours(7)->toDateString();
            $books = DB::table('books')
                ->join('users', 'books.user_id', '=', 'users.id')
                ->select('books.*', 'users.name as rrpp', 'users.role as role')
                ->where('books.event_id', '=', function ($query) use ($fechaActual) {
                    $query->select('id')
                        ->from('events')
                        ->where('eliminado', '=', '0')
                        ->where('date', '>=', $fechaActual)
                        ->orderBy('date', 'asc')
                        ->limit(1);
                })
                ->where('books.status', '=', $status)
                ->orderBy('books.name', 'asc')
                ->addSelect(DB::raw('(SELECT GROUP_CONCAT(CONCAT(b.type, " ", b.name, " - ", b.price, "€ ") SEPARATOR "<br> ") FROM book_bottle bb JOIN bottles b ON bb.bottle_id = b.id WHERE bb.book_id = books.id) AS bottles_info'))
                ->get();
        }

        return response()->json($books);
    }
    // public function getBooks($time, $date, $status)
    // {

    //     if ($time === 'all' && $status != 'all') {
    //         $books = DB::table('books')
    //             ->join('users', 'books.user_id', '=', 'users.id')
    //             ->select('books.*', 'users.name as rrpp')
    //             ->where('books.date', '=', $date)
    //             ->where('books.status', '=', $status)
    //             ->get();
    //     } else if (!$date) {
    //         $books = DB::table('books')
    //             ->join('users', 'books.user_id', '=', 'users.id')
    //             ->select('books.*', 'users.name as rrpp')
    //             ->where('books.time', '=', $time)
    //             ->where('books.status', '=', $status)
    //             ->get();
    //     } else if ($status == 'all' && $time != 'all') {
    //         $books = DB::table('books')
    //             ->join('users', 'books.user_id', '=', 'users.id')
    //             ->select('books.*', 'users.name as rrpp')
    //             ->where('books.time', '=', $time)
    //             ->where('books.date', '=', $date)
    //             ->get();
    //     } else if ($status === 'all' && $time === 'all') {
    //         $books = DB::table('books')
    //             ->join('users', 'books.user_id', '=', 'users.id')
    //             ->select('books.*', 'users.name as rrpp')
    //             ->where('books.date', '=', $date)
    //             ->get();
    //     } else {
    //         $books = DB::table('books')
    //             ->join('users', 'books.user_id', '=', 'users.id')
    //             ->select('books.*', 'users.name as rrpp')
    //             ->where('books.time', '=', $time)
    //             ->where('books.date', '=', $date)
    //             ->where('books.status', '=', $status)
    //             ->get();
    //     }

    //     return response()->json($books);
    // }


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

    public function destroyBook($id)
    {
        try {
            $book = Book::find($id);

            if (Auth::user()->role == 'admin') {
                $book->delete();
                return back();
            } else {
                toastr('No tienes permisos para realizar esta acción', 'error', 'Ops, ¡Error!');
                return back();
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
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

    public function editBookDinners(Request $request)
    {
        $idReserva = $request->input('idReserva');
        $newValue = $request->input('newValue');

        // Realiza la actualización en la base de datos aquí
        if ($newValue >= 1 && is_int($newValue)) {
            Book::where('id', $idReserva)->update(['diners' => $newValue]);
            return response()->json();
        } else {
            toastr('El parámetro no es válido', 'error');
        }
    }
    public function getBook(Request $request)
    {
        $book = Book::with('bottles')->find($request->id);

        return view('editbook', ['book' => $book]);
    }
}
